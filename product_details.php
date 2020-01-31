<?php 
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$cart = new Cart();
$proid = Input::get('proid');
$mainc = Input::get('mainc');
$subc  = Input::get('subc');



if (empty($mainc) or empty($subc) or empty($proid)) {
 Redirect::to('Error.php');
}

// main catagorie validate

$main_cata_arr = array();
$main_cata = $user->get_main_cata();

foreach ($main_cata as $key => $value) {
	$main_cata_arr[] = $main_cata[$key]['main_catagori'];
}

if(in_array($mainc, $main_cata_arr, true)){
  echo '';
}else{
	Redirect::to('Error.php');
}

// main catagorie validate
$sub_cata_arr = array();
$sub = $user->get_product_sub_cata_font($mainc);
foreach ($sub as $key => $value) {
	$sub_cata_arr[] = $sub[$key]['sub_chatagori'];
}

if(in_array($subc, $sub_cata_arr,true)){
  echo '';
}else{
	Redirect::to('Error.php');
}


// product validate
$product_id = array();
$product = $user->get_all('product');
foreach ($product as $key => $value) {
	$product_id[] = $product[$key]['product_uq_id'];
}



if(in_array($proid, $product_id, true)){
  echo '';
}else{
	Redirect::to('Error.php');
}
$pid = '';
 $product_code = '';
 $price = '';
 $stock = '';
 $description = '';
 $mainchata = '';
 $subchata = '';
?>

<?php require_once "header.php";  ?>
	<!-- Product Detail -->

	<?php      
     $data = $user->getData_one_cul('product', 'product_uq_id', $proid);
     foreach($data as $key => $value):
     	$pid .= $data[$key]['product_id'];
     	$product_code .= $data[$key]['product_code'];
     	$price .= $data[$key]['new_price'];
     	$stock .= $data[$key]['stok'];
     	$description .= $data[$key]['product_description'];
     	$mainchata .= $data[$key]['product_main_chata'];
     	$subchata .= $data[$key]['product_sub_chata'];

	?>
	<div id="contpro" class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					

					<div class="slick3">
						
							<div class="wrap-pic-w">
								<img src="uploads/<?php echo $data[$key]['product_img'] ?>" alt="IMG-PRODUCT">
							</div>
					

				

					
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<p style="color: red;" id="errormes"></p>
				<h4 id="rest" class="alert alert-success alert-block">
					
				</h4>
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $data[$key]['product_head_text'] ?>
				</h4>

				
				<span class="m-text17">
					TK: <?php echo $data[$key]['new_price'] ?>
				</span>
					<span class="block2-oldprice m-text7 p-r-5">
					  <?php 
						if($data[$key]['old_price'] == 0){
                            echo '';
						}else{
						echo 'Tk:'. $data[$key]['old_price'];
						 } 

						 ?>
				</span>


				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Size
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							
							<select class="selection-2" id="size" name="size">
								
								<?php

							$option = $user->getProduct_option($pid, 'size');
							if(count($option) <=0 ){
                             echo '<option class="gsize" value='.escape('nosize').'>'.escape('No Size').'</option>';
							}else{
								echo '<option>Choose an Size</option>';
							  foreach ($option as $key => $value) {
								echo '<option class="gsize" value='.escape($option[$key]['option_value']).'>'.escape($option[$key]['option_value']).'</option>';
							  }
							}
							

							?>
								
						
							</select>
						</div>
					</div>

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" id="color" name="color">
								
									<?php

							$option = $user->getProduct_option($pid, 'color');
							if(count($option) <=0 ){
                             echo '<option class="gcolor" value='.escape('nocolor').'>'.escape('No Color').'</option>';
							}else{
								echo '<option>Choose an Color</option>';
							  foreach ($option as $key => $value) {
								echo '<option class="gcolor" value='.escape($option[$key]['option_value']).'>'.escape($option[$key]['option_value']).'</option>';
							  }
							}
							

							?>
							</select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" id="quantity" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								    <input type="hidden" id="subtotal" name="subtotal" value="<?php echo escape($price);?>">

                                    <input type="hidden" id="pid" name="pro_id" value="<?php echo escape($pid);?>">
                                    <input type="hidden" id="procode" name="pro_code" value="<?php echo escape($product_code);?>">
								<button type="submit" id="addtocart" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									
								
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<p>Code: <span class="s-text8 m-r-35"><?php echo $product_code;?></span></p>
					<?php

                    if($stock == 0){
                         echo '<span style="color: red;">Stock: Out Of Stock</span><br>';
                      }else{
                      echo '<p>Stock:<span style="color: green; class="s-text8 m-r-35"> Available</span></p><br>';
                     }
                ?>

					<p>Categories:<span class="s-text8"> <?php echo ucfirst($mainchata);?>, <?php echo ucfirst($subchata); ?></span></p>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $description ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

		
			</div>
		</div>
	</div>
<?php   endforeach ?>

	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

				<?php 
				$subdata = $user->get_Related_Products('product', 'product_main_chata', 'product_sub_chata', $mainc, $subc, $proid);

                 foreach ($subdata as $key => $value):

			   ?>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="uploads/<?php  echo $subdata[$key]['product_img']  ?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
											<a href='product_details.php?proid=<?php echo $subdata[$key]["product_uq_id"]; ?>&mainc=<?php echo $subdata[$key]["product_main_chata"]; ?>&subc=<?php echo $subdata[$key]["product_sub_chata"]; ?>&token=<?php echo Token::generete();?>' class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											View Detail
										</a>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $subdata[$key]['product_head_text'] ?>
								</a>

								<span class="m-text17">
									TK: <?php echo $subdata[$key]['new_price'] ?>
								</span>
									<span class="block2-oldprice m-text7 p-r-5">
									  <?php 
										if($subdata[$key]['old_price'] == 0){
				                            echo '';
										}else{
										echo 'Tk:'. $subdata[$key]['old_price'];
										 } 

										 ?>
								</span>
							</div>
						</div>
					</div>
                   <?php  endforeach; ?>

				

					

					

				

					
				</div>
			</div>

		</div>
	</section>


<?php  require_once "footer.php"; ?>