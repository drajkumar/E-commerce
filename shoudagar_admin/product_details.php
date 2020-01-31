<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}
 

?>

<?php

include_once  'tamplate/header.php';
include_once 'tamplate/sidebar.php';


?>

<div id="content">
<?php

      $product_id = escape($_REQUEST['product_id']);
       $data = $user->getData_one('product', 'product_id', $product_id);
          foreach ($data as $key => $value):
?>
  <div id="content-header">
   <div id="breadcrumb"></div><h1>Product view</h1>
    </div>
     <div class="container-fluid"><hr>
    <div class="row-fluid">
     <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Product View</h5>
          </div>
          <div class="widget-content">

           
          <p>Product Name:&nbsp; <?php echo $data[$key]["product_head_text"];?></p>
          <p>Product New price:&nbsp;<?php echo $data[$key]["new_price"];?></p>
          <p>Product Old price:&nbsp; <?php echo $data[$key]['old_price'];?></p>
          <p>Product Description:&nbsp;<?php echo $data[$key]['product_description'];?></p>
          <p>Product main chatagori:&nbsp;<?php echo $data[$key]['product_main_chata'];?></p>
          <p>Product sub chatagori:&nbsp;<?php echo $data[$key]['product_sub_chata'];?></p>
          <p>Product code:&nbsp;<?php echo $data[$key]['product_code'];?></p>
          <p>Product stok:&nbsp;<?php echo $data[$key]['stok'];?></p>
          <p>Product Status:&nbsp;
           <?php
           if($data[$key]['status'] == 1){
             echo 'Publish';
           }else{
            echo 'Unpublish';
           }

           ?> 
           </p>
          


         <img src="../uploads/<?php echo  $data[$key]['product_img']?>" width="300" height="300">
         </div></div></div></div></div>
          <?php endforeach; ?>

</div>







<?php
include_once 'tamplate/footer.php';

?>