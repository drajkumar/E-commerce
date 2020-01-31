
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
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
				
					<p>Call Now: +8801821-201-801, +8801615-602-603</p>
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						<p>shoudagar.bd@gmail.com</p>
					</span>

				
				</div>
			</div>

			<div class="wrap_header">
					
				<a href="index.php" class="logo">
					<img src="assest/images/logo.jpeg"s alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">


							<li>
								<a href="aboutus.php">About Us</a>
								<ul class="sub_menu">
								
										<li><a href="">Who We Are</a></li>
										<li><a href="">Our History</a></li>
										<li><a href="">Mission</a></li>
										<li><a href="">Vision</a></li>
										<li><a href="">Terms & Conditions</a></li>
										<li><a href="">Warrenty Policy</a></li>
										<li><a href="">FAQ</a></li>
										<li><a href="blog.php">Blog</a></li>
								
					
								</ul>
							</li>

							<li>
								<a href="men.php">Men</a>
								<ul class="sub_menu">
									
									<?php  

									$sub_menu = $user->get_product_sub_cata_font('men');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=men&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
					
								</ul>
							</li>

							<li>
								<a href="women.php">Women</a>
								<ul class="sub_menu">
									<?php  

									$sub_menu = $user->get_product_sub_cata_font('women');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=women&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
					
								</ul>
							</li>

							<li>
								<a href="electronics.php">Web Desing & Development</a>
								<ul class="sub_menu">
									<?php  

									$sub_menu = $user->get_product_sub_cata_font('development');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=electronics&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
					
								</ul>
							</li>

							<li>
								<a href="electronics.php">Electronics</a>
								<ul class="sub_menu">
									<?php  

									$sub_menu = $user->get_product_sub_cata_font('electronics');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=electronics&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
					              <li><a href="electronicservice.php">Service</a></li>
					              <li><a href="electronicpackges.php">Packges</a></li>
								</ul>
							</li>

							<li>
								<a href="foods.php">Foods</a>
								<ul class="sub_menu">
									<?php  

									$sub_menu = $user->get_product_sub_cata_font('foods');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=foods&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
					
								</ul>
							</li>

							<li>
								<a href="books.php">Books</a>
								<ul class="sub_menu">
									<?php  

									$sub_menu = $user->get_product_sub_cata_font('books');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=books&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
					
								</ul>
							</li>

							<li>
								<a href="eventmanagement.php">Event Management</a>
								<ul class="sub_menu">
								
								
										<li><a href="eventservices.php">Service</a></li>
										<li><a href="eventpackges.php">Packges</a></li>
							
					
								</ul>
							</li>


						


							<li>
								<a href="contact.php">Contact Us</a>
							</li>
								
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
                    <nav class="menu">
						<ul class="main_menu">
                  	<li>
								<a href="profile.php">User</a>
								<ul class="sub_menu">

										<li><a href="register.php">Register</a></li>
										<li><a href="login.php">Login</a></li>
										<?php 
								   if($user->isLoggedInuser()){

								   	?>
                                      	<li><a href="profile.php">Profile</a></li>
										<li><a href="order_details.php">View order</a></li>
										<li><a href="change_password.php">Change password</a></li>
										<li><a href="logout.php">logout</a></li>
										<?php
                                         }else{
                                           echo '';
                                         }
									
										?>
								
					
								</ul>
							</li>
                         </ul>
					</nav>
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="assest/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span id="count_item" class="header-icons-noti">
							
					
						</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul id="output" class="header-cart-wrapitem">
								
						
								
							</ul>

							

				<div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    View Cart
                  </a>
                </div>

                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="checkout.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Check Out
                  </a>
                </div>
              </div>

						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="assest/images/logo.jpeg" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
				

					<span class="linedivide2"></span>

					<div class="header-wrapicon2 ">
						<img src="assest/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown ajax" alt="ICON">
						<span id="count_item1" class="header-icons-noti">
							
					
						</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul id="output1" class="header-cart-wrapitem">

								

							
							</ul>

							

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="checkout.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
					
					<p >Call Now: +8801821-201-801, +8801615-602-603, +8801615-603-604</p>
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								<p>shoudagar.bd@gmail.com</p>
							</span>


						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>



					<li class="item-menu-mobile">
						<a href="aboutus.php">About Us</a>
						<ul class="sub-menu">
							<li><a href="">Who We Are</a></li>
							<li><a href="">Our History</a></li>
							<li><a href="">Mission</a></li>
							<li><a href="">Vision</a></li>
							<li><a href="">Terms & Conditions</a></li>
							<li><a href="">Warrenty Policy</a></li>
							<li><a href="">FAQ</a></li>
							<li><a href="blog.php">Blog</a></li>
                        </ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>
				    <li class="item-menu-mobile">
						<a href="men.php">Men</a>
						<ul class="sub-menu">
						   <?php  
							$sub_menu = $user->get_product_sub_cata_font('men');
							foreach ($sub_menu as $key => $value):
							?>
							<li><a href="products.php?mainc=men&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
						  <?php 
						    endforeach;

						  ?>
				            
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="women.php">Women</a>
						<ul class="sub-menu">
							<?php  

									$sub_menu = $user->get_product_sub_cata_font('women');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=women&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
				            
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

			

					<li class="item-menu-mobile">
						<a href="electronics">Electronics</a>
						<ul class="sub-menu">
							<?php
									$sub_menu = $user->get_product_sub_cata_font('electronics');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=electronics&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
				            	
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					

					<li class="item-menu-mobile">
						<a href="about.html">Foods</a>
						<ul class="sub-menu">
								<?php  

									$sub_menu = $user->get_product_sub_cata_font('foods');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=foods&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
				            	
						</ul>
							<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">Books</a>
						<ul class="sub-menu">
							<?php  

									$sub_menu = $user->get_product_sub_cata_font('books');

									foreach ($sub_menu as $key => $value):
										?>
										<li><a href="products.php?mainc=books&subc=<?php echo $sub_menu[$key]['sub_chatagori']?>"><?php echo ucfirst($sub_menu[$key]['sub_chatagori'])?></a></li>
								 <?php 
									endforeach;

									?>
				            	
						</ul>
							<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="eventmanagement.php">Event Management</a>

					</li>


					<li class="item-menu-mobile">
						<a href="faq.php">FAQ</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php">Contact Us</a>
					</li>

					<li class="item-menu-mobile">
						<a href="profile.php">User</a>
						<ul class="sub-menu">
								<li><a href="register.php">Register</a></li>
										<li><a href="login.php">login</a></li>
										<?php 
								   if($user->isLoggedInuser()){

								   	?>
                                      	<li><a href="profile.php">Profile</a></li>
										<li><a href="order_details.php">View order</a></li>
										<li><a href="change_password.php">Change password</a></li>
										<li><a href="logout.php">logout</a></li>
										<?php
                                         }else{
                                           echo '';
                                         }
									
										?>
				            	
						</ul>
							<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>
				</ul>
			</nav>
		</div>
	</header>