<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$cart = new Cart();

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
							        	),

							        'address' => array(
							          'required' => true,
							          'max'      => 200
							        	)
							        
							    	));

							     if($validation->passed()){
                                        $salt = Hash::salt();

								 	        $register = array(
								           'fullname'=> Input::get('name'),
								           'phone' => Input::get('phone'),
								           'email' => Input::get('email'),
								           'password' => Hash::make(Input::get('password'), $salt),
								           'salt'       => $salt,
								           'email_code' => '',
								           'address' => Input::get('address'),
								           'joined' => date('d:m:y'),
								           'status'        => 1
								            );

								           $user->create_all('register', $register);
										    Session::flash('registeruser', 'Account is successfuly created Please Login');
								            Redirect::to('register.php');
											  
											

							     }else{
							         $error_mess[] = $validation->errors();
							        							        
							     }
							  
							}

                }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoudagar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assest/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest/css/util.css">
	<link rel="stylesheet" type="text/css" href="assest/css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-3 p-b-30">
					
				</div>

				<div class="col-md-6 p-b-30">
					<?php
					if(Session::exists('registeruser')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('registeruser') .'</p>           
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
					<form  class="leave-comment" action="register.php" method="post">
						<h4 class="m-text26 p-b-36 p-t-15">
							Register  
						</h4>

						

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="Phone number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Password">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password_again" placeholder="Password again">
						</div>

						<textarea class="dis-block s-text7 size15 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="Address"></textarea>
						<input type="hidden" name="token" value="<?php echo Token::generete();?>">

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Register"><br>
							
                          
						</div>
                     <p> You have all ready account please<a style="font-size: 16px; " href="login.php"> Login</a></p>
					</form>
				</div>
			</div>
		</div>
	</section>
	</body>
	</html>