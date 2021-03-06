<?php 
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$cart = new Cart();
?>
<?php require_once "header.php";  ?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(assest/images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							<?php
                             $subcata = $user->get_product_sub_cata_font('women');

                             foreach ($subcata as $key => $value):
                             

							?>
							<li class="p-t-4">
								<a href="products.php?mainc=women&subc=<?php echo $subcata[$key]['sub_chatagori'] ?>" class="s-text13 active1">
									<?php echo ucfirst($subcata[$key]['sub_chatagori']); ?>
								</a>
							</li>
                             <?php  endforeach;   ?>
							
						</ul>

						



						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: Tk<span id="value-lower"> 300</span> - <span id="value-upper">500</span>
								</div>
							</div>
						</div>

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
	

					<!-- Product -->
					<div class="row">
						<?php
                         $product = $user->getchat_product('product', '	product_main_chata', 'women');
                         
                          foreach ($product as $key => $value):
                         

						?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="uploads/<?php echo $product[$key]['product_img'];?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href='product_details.php?proid=<?php echo $product[$key]["product_uq_id"]; ?>&mainc=<?php echo $product[$key]["product_main_chata"]; ?>&subc=<?php echo $product[$key]["product_sub_chata"]; ?>&token=<?php echo Token::generete();?>' class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											View Detail
										</a>										
									</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $product[$key]['product_head_text'];?>
									</a>
									<a class="block2-name dis-block s-text3 p-b-5">
									Product Code: <?php echo $product[$key]['product_code'];?>
								</a>



									<span class="block2-oldprice m-text7 p-r-5">
									  <?php 
										 if($product[$key]['old_price'] == 0){
                                          echo '';
										 }else{
										 	echo 'Tk:'. $product[$key]['old_price'];
										 } 

										?>
									</span>

									<span class="block2-newprice m-text8 p-r-5">
										 Tk: <?php echo $product[$key]['new_price'];?>
									</span>
								</div>
							</div>
						</div>
					   <?php endforeach;?>


					</div>

					<!-- Pagination -->
					<!---
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				-->
				</div>
			</div>
		</div>
	</section>


	<?php  require_once "footer.php"; ?>