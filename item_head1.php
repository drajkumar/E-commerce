

<?php
                 require_once 'core/init.php';
                  require_once 'functions/sanitize.php';
                  require_once 'vendor/autoload.php';
                  $user = new Register_user();
                  $cart = new Cart();
 $carttotal = "";
                 $data = $cart->getItem();
                 if(!isset($data)){
                      echo '<p style="font-size:15px; margin-left:20px;">Your cart is Empty</p>';
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

<li class="header-cart-item">
                  <div class="header-cart-item-img">
                    <img src="uploads/<?php echo escape($items[$item]['product_img']);?>" alt="IMG">
                  </div>

                  <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                      <?php echo escape($items[$item]['product_head_text'] )  ?>
                    </a>

                    <span class="header-cart-item-info">
                      <?php echo $q;  ?> x  <?php echo escape($items[$item]['new_price'] )  ?>Taka
                    </span>
                  </div>
                </li>
           
                <?php
                $suballprice = number_format($subprice, 2);
                 // echo'Taka: '. $suballprice;
                  @$carttotal = $subprice + $carttotal;

                  ?>
                <?php  endforeach;   ?>
                              <?php
                              $i++;
                              } 
                                 }
                              ?>
<div class="header-cart-total">
                Total: <?php
                               if(empty($carttotal)){
                                 echo '0 Taka';
                               }else{
                                echo number_format($carttotal, 2).' '.'Taka';
                               }
               ?>
              </div>

       