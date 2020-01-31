<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$error_mess = array();
      
                           if(Input::exists()){

							  if(Token::check(Input::get('token'))){
							     $validate = new Validation();
							     $validation =  $validate->check($_POST, array(
							        'name' => array(
							           'required' =>true,
							           'max'      => 100 
							        	),
							        'phonenumber' => array(
							          'required' => true,
							          'max'      => 30 
							          
							        	),
							        'email' => array(
							          'required' => true
							        	),
							      

							        'message' => array(
							          'required' => true,
							          'max'      => 1000
							        	)
							        
							    	));

							     if($validation->passed()){
                                       

								 	        $register = array(
								           'name'=> Input::get('name'),
								           'phone' => Input::get('phonenumber'),
								           'email' => Input::get('email'),
								           
								           'message' => Input::get('message'),
								           'send_time' => date('d:m:y H:i:s'),
								           
								            );

								           $user->create_all('contactus', $register);
										    Session::flash('contactstatus', 'Message is successfuly Send');
								            Redirect::to('contact.php');
											  
											

							     }else{
							         $error_mess[] = $validation->errors();
							        							        
							     }
							  
							}

                }




?>
<?php require_once "header.php";  ?>


<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(assest/images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="assest/images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<?php
					if(Session::exists('contactstatus')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('contactstatus') .'</p>           
                        </div>';
                               }
                           //print_r($error_mess);
						$i = 1;

						foreach ($error_mess as $key => $value) {
							foreach ($value as $key1 => $value1) {
								echo '<p style="color:red">'.$i.': '.$value1.'</p><br>';

								$i++;
							}
						}

						?>
					<form class="leave-comment" action="" method="post">
						<h4 class="m-text26 p-b-36 p-t-15">
							Send us your message
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phonenumber" placeholder="Phone Number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

						<div class="w-size25">
								<input type="hidden" name="token" value="<?php echo Token::generete();?>">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Send">
							
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php  require_once "footer.php"; ?>