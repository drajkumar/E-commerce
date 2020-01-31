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

      $product_id = escape($_REQUEST['blog_id']);
       $data = $user->getData_one('blog', 'blog_id', $product_id);
          foreach ($data as $key => $value):
?>
  <div id="content-header">
   <div id="breadcrumb"></div><h1>Post view</h1>
    </div>
     <div class="container-fluid"><hr>
    <div class="row-fluid">
     <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Post View</h5>
          </div>
          <div class="widget-content">

           
          <p>Product Name:&nbsp; <?php echo $data[$key]["title"];?></p>

          <p>Product Description:&nbsp;<?php echo $data[$key]['description'];?></p>
          <p>Posted time:&nbsp;<?php echo $data[$key]['createed_time'];?></p>
          <p>update_time:&nbsp;<?php echo $data[$key]['updateed_time'];?></p>


         <img src="../uploads/<?php echo  $data[$key]['picture']?>" width="300" height="300">
         </div></div></div></div></div>
          <?php endforeach; ?>

</div>







<?php
include_once 'tamplate/footer.php';

?>