<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$cart = new Cart();
if(!$user->isLoggedInuser()){
  Redirect::to('login.php');
}
?>
<?php require_once "header.php";  ?>

<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th  class="column-1">Image</th>
							<th class="column-1">Product Name</th>
							<th class="column-1">Price</th>
							<th class="column-1">Size</th>
							<th class="column-1">Color</th>
							<th class="column-1 p-l-70">Quantity</th>
							<th class="column-1">Total</th>
							

						</tr>

						<?php    
                          $reg_id = $user->data()->register_id;
						   $carttotal = "";
                           $data = $user->getData_one_cul('product_order', 'register_id', $reg_id);
                           
                           if($data == 0){
                                  echo '<p style="font-size:15px; margin-left:20px;">Your cart is Empty</p>';
				                 //echo '';
				                 }else{
				                  $i = 0;
				                  foreach ($data as $key => $value) {
				                  $id = $data[$key]['product_id'];
				                  $q  = $data[$key]['quantity'];
				                  $size = $data[$key]['size'];
				                  $color = $data[$key]['color'];
				                  $subprice = $data[$key]['subtotal'];
				                  $procode = $data[$key]['productcode'];

				                  $items = $user ->getCartitem('product', 'product_id',$id);
				                  
				                  foreach ($items as $item => $val):

                        ?>

						<tr class="table-row">
							<td class="column-3">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img style="margin-left: 20px;" src="uploads/<?php echo escape($items[$item]['product_img']);?>" alt="IMG-PRODUCT">
								</div>

							</td>
							<td class="column-1">
								<?php echo escape($items[$item]['product_head_text'] )  ?>
							</td>
							<td class="column-1"><?php echo escape($items[$item]['new_price'] )  ?> Tk</td>
							
							<td class="column-1"><?php
                                        if(empty($size)){
                                          echo 'No size';
                                         }else{
                                          echo escape($size); 
                                          }
                                         ?></td>
							<td class="column-1"><?php
                                        
                                        if(empty($color)){
                                        echo 'No color';
                                        }else{
                                            
                                         echo $color;
                                        }

                                         ?></td>
							<td class="column-1">
								 
								 		
									
                    
                                     <p><?php echo escape($q);?></p>
                                      
                    
							</td>
							<td class="column-1">
							<?php 
								$suballprice = number_format($subprice, 2);
				                  echo $suballprice.' Tk';
				                  @$carttotal = $subprice + $carttotal;
				                 ?>
                              </td>
							
						</tr>
                         <?php  endforeach;   ?>
                              <?php
                              $i++;
                              } 
                                 }
                              ?>
						
					</table>
				</div>
			</div>

		

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h6 class="m-text20 p-b-24">
					 Totals:   <?php
                               if(empty($carttotal)){
                                 echo '0 Tk';
                               }else{
                                echo number_format($carttotal, 2).' '.'Tk';
                               }
               ?>

				</h6>
				
				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
				</div>

				<!--  -->
			

				<!--  -->
		

			
			</div>
		</div>
	</section>









<?php  require_once "footer.php"; ?>