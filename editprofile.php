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
							        'name' => array(
							           'required' =>true,
							           'max'      => 100 
							        	),
							        'phone' => array(
							          'required' => true,
							          'max'      => 30 
							          
							        	),
							        'email' => array(
							          'required' => true
							        	),
							        
							        'address' => array(
							          'required' => true,
							          'max'      => 200
							        	)
							        
							    	));

							     if($validation->passed()){
                                      

								 	        $edit = array(
								           'fullname'=> Input::get('name'),
								           'phone' => Input::get('phone'),
								           'email' => Input::get('email'),
								           'address' => Input::get('address')
								            );

								         $user->update_all('register', 'register_id', $r_id, $edit);
										    Session::flash('edituser', 'Profile is successfuly Edited ');
								            Redirect::to('editprofile.php');
											  
											

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
					if(Session::exists('edituser')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('edituser') .'</p>           
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
							Edit profile  
						</h4>

						

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" value="<?php echo $user->data()->fullname; ?>">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" value="<?php echo $user->data()->phone; ?>">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" value="<?php echo $user->data()->email; ?>">
						</div>

					

						<textarea class="dis-block s-text7 size15 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="Address"><?php echo $user->data()->address; ?></textarea>
						<input type="hidden" name="token" value="<?php echo Token::generete();?>">

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Edit Profile"><br>
							
                          
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>

<?php  require_once "footer.php"; ?>