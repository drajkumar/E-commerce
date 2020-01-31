<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$cart = new Cart();
session_destroy();

?>
<?php require_once "header.php";  ?>
	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(assest/images/1.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(assest/images/2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(assest/images/3.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>
				<div class="item-slick1 item3-slick1" style="background-image: url(assest/images/4.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="assest/images/men.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="men.php" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Men
							</a>
						</div>
					</div>

			
				</div>


			<div class="col-sm-6 col-md-4 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="assest/images/women.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="women.php" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Women
							</a>
						</div>
					</div>

			
				</div>

			<div class="col-sm-6 col-md-4 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="assest/images/foods.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="foods.php" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Foods
							</a>
						</div>
					</div>

			
				</div>



			<div class="col-sm-6 col-md-4 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="assest/images/elictronics.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="electronics.php" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Elictronics
							</a>
						</div>
					</div>

			
				</div>




				<div class="col-sm-6 col-md-4 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="assest/images/books.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="books.php" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Books
							</a>
						</div>
					</div>

			
				</div>



								<div class="col-sm-6 col-md-4 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="assest/images/event.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="eventmanagement.php" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Event
							</a>
						</div>
					</div>

			
				</div>



			


			</div>
		</div>
	</section>

	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Featured Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                  <?php    
                  $fupro = $user->get_all('product');
                  foreach ($fupro as $key => $value):
                

                  ?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="uploads/<?php echo $fupro[$key]['product_img'];?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>




									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<!-- Button -->
										<a href='product_details.php?proid=<?php echo $fupro[$key]["product_uq_id"]; ?>&mainc=<?php echo $fupro[$key]["product_main_chata"]; ?>&subc=<?php echo $fupro[$key]["product_sub_chata"]; ?>&token=<?php echo Token::generete();?>' class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											View Detail
										</a>
									</div>

								</div>
								
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $fupro[$key]['product_head_text'];?>
								</a>

								<a class="block2-name dis-block s-text3 p-b-5">
									Product Code: <?php echo $fupro[$key]['product_code'];?>
								</a>

							

								<span class="block2-price m-text6 p-r-5">
									Tk: <?php echo $fupro[$key]['new_price'];?>
								</span>
							</div>
						</div>
					</div>

					<?php endforeach;  ?>
					

					

					

					

					

			

				</div>
			</div>

		</div>
	</section>


			<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					New Products
				</h3>
			</div>

			<!-- Slide2 -->
			
				<div class="slick2">
					<?php
					 $newpro = $user->getProduct_item();  
                     foreach($newpro as $key => $value):
                     	
					 ?>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="uploads/<?php echo $newpro[$key]['product_img'];?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
											<a href='product_details.php?proid=<?php echo $newpro[$key]["product_uq_id"]; ?>&mainc=<?php echo $newpro[$key]["product_main_chata"]; ?>&subc=<?php echo $newpro[$key]["product_sub_chata"]; ?>&token=<?php echo Token::generete();?>' class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											View Detail
										</a>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $newpro[$key]['product_head_text'];?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									Tk: <?php echo $newpro[$key]['new_price'];?>
								</span>
							</div>
						</div>
					</div>

					
               <?php endforeach; ?>

					


					

					

					
         


				






                </div>
					
			

		</div>
	</section>





	<!-- Banner2 -->
	
	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Our Blog
				</h3>
			</div>

			<div class="row">
				<?php    
                 $post = $user->getblogPost_limit();

                 foreach ($post as $key => $value):
               

				?>
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog_detail.php?blogid=<?php echo $post[$key]['blog_id']; ?>&title=<?php echo urlencode($post[$key]['title']);?>&token=<?php echo Token::generete();?>" class="block3-img dis-block hov-img-zoom">
							<img src="uploads/<?php echo $post[$key]['picture'];?>" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog_detail.php?blogid=<?php echo $post[$key]['blog_id']; ?>&title=<?php echo urlencode($post[$key]['title']);?>&token=<?php echo Token::generete();?>" class="m-text11">
									<?php echo $post[$key]['title'];?>
								</a>
							</h4>

							
							<span class="s-text6">on</span> <span class="s-text7"><?php echo $post[$key]['createed_time'];?></span>

							<p class="s-text8 p-t-16">
								<?php 
									 $description = $post[$key]['description'];
                                      $rest = substr($description, 0, 200);
									echo $rest; 


									?>
							</p>
						</div>
					</div>
				</div>
			<?php  endforeach ?>

				

				
			</div>
		</div>
	</section>

	<!-- Instagram -->

	

	<!-- Footer -->
	<?php  require_once "footer.php"; ?>