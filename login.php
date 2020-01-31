<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
if($user->isLoggedInuser()){
  Redirect::to('order.php');
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
                    if(Input::exists()){
					    if(Token::check(Input::get('token'))){
					    $validate = new Validation();
					    $validation = $validate->check($_POST, array(
					      'email'=> array('required' => true),
					      'password' => array('required' => true)
					    	));

					      if($validation->passed()){
					         $user = new Register_user();
					 
					         $login = $user->login(Input::get('email'), Input::get('password'));
					         if($login){
					           Redirect::to('order.php');
					         }else{
					           echo '<h5 style="color:#FF4040; margin-left:40px;">Invalid Username and Password </h5>';
					         }
					      }else{
					      	 foreach($validation->errors() as $error){
					           echo $error . '<br>';
					      	 }
					      }
					  }
					  
					}

				  ?>
					<form class="leave-comment" action="login.php" method="post">
						<h4 class="m-text26 p-b-36 p-t-15">
							Login
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Password">
						</div>

						

						

						<div class="w-size25">
							<input type="hidden" name="token" value="<?php echo Token::generete();?>">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Login"><br>
							<a href="forgotpassword.php">Forgot Password</a>
                          
						</div><br>
                      <p>You have no account please <a href="register.php">Register</a></p>
					</form>
				</div>
			</div>
		</div>
	</section>
	</body>
	</html>