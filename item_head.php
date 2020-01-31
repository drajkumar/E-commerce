
								<?php
								   require_once 'core/init.php';
									require_once 'functions/sanitize.php';
									require_once 'vendor/autoload.php';
									$user = new Register_user();
									$cart = new Cart();

                                    $id = array();
                                    $subprice = array();

								     $carttotal = "";
					                 $data = $cart->getItem();
					                 if(!isset($data)){
					                     echo '<p style="font-size:15px; margin-left:20px;">Your cart is Empty</p>';
					                 //echo '';
					                 }else{
					                  $i = 0;
					                  foreach ($data as $key => $value) {
					                  $id[] = $data[$key]['item_id'];
					                  $q  = $data[$key]['quantity'];
					                  $size = $data[$key]['size'];
					                  $color = $data[$key]['color'];
					                  $subprice[] = $data[$key]['subtotal'];
					                  $procode = $data[$key]['procode'];

					                  


					                  
					            
                             
                                  } 
                                   //print_r($subprice);
                                 
                                  $placeholders = str_repeat ('?, ',  count ($id) - 1) . '?';
                                  $items = $user ->getCartitemWithAjax($id, $placeholders);
                                 


                                      
					                  echo json_encode($items);

                                 }
                              ?>
							
			