<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$cart = new Cart();
if(!$user->isLoggedInuser()){
  Redirect::to('login.php');
}
$error_mess = array();
$reg_id = $user->data()->register_id;
$reg_phone = $user->data()->phone;


                             if(Input::exists()){
							  if(Token::check(Input::get('token'))){
                                 $validate = new Validation();
							     $validation =  $validate->check($_POST, array(
                                     'paymanttype' => array(
							           'required' =>true
							        	)
							     ));

							       if($validation->passed()){
							  	  $data = $cart->getItem();
							  	  foreach ($data as $key => $value) {
							  	  	   $order = array(
								           'register_id'=> $reg_id,
								           'user_phone_num' => $reg_phone,
								           'product_id' => $data[$key]['item_id'],
								           'productcode' => $data[$key]['procode'],
								           'quantity'       => $data[$key]['quantity'],
								           'size' => $data[$key]['size'],
								           'color' => $data[$key]['color'],
								           'subtotal' => $data[$key]['subtotal'],
								           'paymant_type' => Input::get('paymanttype'),
								           'paymant_code' => '',
								           'paymant_status' => 0,
								           'order_time' => date('d:m:y'),
								           'status'        => 0
								            );

								           $user->create_all('product_order', $order);
							  	  	
							  	  }

							  	    if(Input::get('paymanttype') == 1){
							  	    	unset($_SESSION['cart_array']);
                                     Redirect::to('order_details.php');
							  	    }else{
                                    Redirect::to('bkash.php');
							  	    }
										    //Session::flash('registeruser', 'Account is successfuly created Please Login');
								            //Redirect::to('register.php');
											  
								 }else{
							         $error_mess[] = $validation->errors();
							         
							        							        
							     }	

							  
							}

                }







if(isset($_POST['item_adjust']) && $_POST['item_adjust'] !="" && isset($_POST['price'])){
   if(isset($_POST['sizead'])){
 $size = $_POST['sizead'];
 }else{
  $size = 'No size';
 }
  if(isset($_POST['colorad'])){
 $color  = $_POST['colorad'];
 }else{
  $color  = 'No Color';
 }

  $procode = $_POST['procodead'];
  $item_adjust = $_POST['item_adjust'];
  $quantity = $_POST['quantity'];
  $adjustprice = $_POST['price'];
  $newsub = $adjustprice * $quantity;
   $cart->updateQuantity($item_adjust, $quantity, $size, $color,  $newsub, $procode);
   Session::flash('updatecart', 'Item is Updated your cart ');
   Redirect::to('cart.php');
   unset($procode);
   unset($item_adjust);
   unset($adjustprice);
   unset($adjustprice);
   unset($newsub);
 }




?>

<?php require_once "header.php";  ?>

<?php

if(isset($error_mess)){
foreach ($error_mess as $key => $value) {
	foreach ($value as $key1 => $value1) {
      echo '<div class="alert alert-warning alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px" class="alert-heading">Warning!</h4> '.
                       '<p style="font-size:15px; color:#666; margin-left:60px">'.
                         $value1 .'</p>           
                        </div>';


		
	}
  }
}
?>


	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head"><?php
							if(Session::exists('updatecart')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('updatecart') .'</p>           
                        </div>';
                               }elseif(Session::exists('emptycart')){
                        echo '<div class="alert alert-warning alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px" class="alert-heading">Warning!</h4> '.
                       '<p style="font-size:15px; color:#666; margin-left:60px">'.
                         Session::flash('emptycart') .'</p>            
                        </div>';
                               }
							?>
							<th  class="column-1">Image</th>
							<th class="column-1">Product Name</th>
							<th class="column-1">Price</th>
							<th class="column-1">Size</th>
							<th class="column-1">Color</th>
							<th class="column-1 p-l-70">Quantity</th>
							<th class="column-1">Total</th>
							

						</tr>

						<?php    

						   $carttotal = "";
                           $data = $cart->getItem();
                           
                           if(empty($data)){
                                  echo '<p style="font-size:15px; margin-left:20px;">You don\'t select any Product</p>';
				                 //echo '';
				                 }else{
				                  $i = 0;
				                  foreach ($data as $key => $value) {
				                  $id = $data[$key]['item_id'];
				                  $q  = $data[$key]['quantity'];
				                  $size = $data[$key]['size'];
				                  $color = $data[$key]['color'];
				                  $subprice = $data[$key]['subtotal'];
				                  $procode = $data[$key]['procode'];

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
								 <form action="order.php" method="post">
								 		<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>
                    
                                      <input class="size8 m-text18 t-center num-product" type="number" name="quantity" value="<?php echo escape($q);?>" required="true">
                                      <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
                    

                    
				                     <input type="hidden" name="item_adjust" value="<?php echo escape($items[$item]['product_id'])   ?>"/>
				                     <input type="hidden" name="price" value="<?php echo escape($items[$item]['new_price'] )?>"/>
				                     <input type="hidden" name="sizead" value="<?php echo escape($size )?>"/>
				                     <input type="hidden" name="colorad" value="<?php echo escape($color)?>"/>
				              
				                     <input type="hidden" name="procodead" value="<?php echo escape($procode)?>"/>

                               
							

									

									
								</div>
								 <input style="width: 100px; height: 30px; margin-left: 18px; margin-top: 10px;" type="submit" name="submit" value="Change"/>
								 </form>
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
		                  <?php 
                          $data = $cart->getItem();
                           
                           if(empty($data)){
                            echo '';
                           }else{




                           	?>
				<div class="size15 trans-0-4">

					
		            <form action="" method="post">
		            	<span class="s-text19">
							Paymant type
						</span>
						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
		            	<select class="selection-2" name="paymanttype">
								<option value="">Select Paymant type</option>
								<option value="1">Case On Delivery</option>
								<option value="2">Bkash</option>
								
							</select>
						</div><br>
		            	<input type="hidden" name="token" value="<?php echo Token::generete();?>">
					  <input style="height: 50px;" type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" value="Order now">
							
					</form>		
				</div>

				<?php   } ?>
			</div>
		</div>
	</section>









<?php  require_once "footer.php"; ?>