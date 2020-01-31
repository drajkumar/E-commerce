<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();

if(!$user->isLoggedInuser()){
  Redirect::to('login.php');
}
$r_id = $user->data()->register_id;
$error_mess = array();
      
                           if(Input::exists()){

							  if(Token::check(Input::get('token'))){
							     $validate = new Validation();
							     $validation =  $validate->check($_POST, array(
							        'password' => array(
							          'required' => true,
							          'max'      => 64,
							          'min'      => 8
							        	),

							        'password_again' => array(
							          'required' => true,
							          'matches'  => 'password',
							          'max'      => 64,
							          'min'      => 8
							        	)
							        
							    	));

							     if($validation->passed()){
                                      $salt = Hash::salt();

								 	        $edit = array(
								           'password' => Hash::make(Input::get('password'), $salt),
								           'salt'       => $salt
								            );

								         $user->update_all('register', 'register_id', $r_id, $edit);
										    Session::flash('changepass', 'Password is successfuly Changed ');
								            Redirect::to('change_password.php');
											  
											

							     }else{
							         $error_mess[] = $validation->errors();
							        							        
							     }
							  
							}

                }

?>
<?php require_once "header.php";  ?>

	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-3 p-b-30">
					
				</div>

				<div class="col-md-6 p-b-30">
					<?php
					if(Session::exists('changepass')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('changepass') .'</p>           
                        </div>';
                               }
                           //print_r($error_mess);
						$i = 1;

						foreach ($error_mess as $key => $value) {
							foreach ($value as $key1 => $value1) {
								echo $i.': '.$value1.'<br>';

								$i++;
							}
						}

						?>
					<form  class="leave-comment" action="" method="post">
						<h4 class="m-text26 p-b-36 p-t-15">
							Change password  
						</h4>

						 <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="New Password">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password_again" placeholder="Password again">
						</div>

                         <input type="hidden" name="token" value="<?php echo Token::generete();?>">

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Change"><br>
							
                          
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>

<?php  require_once "footer.php"; ?>