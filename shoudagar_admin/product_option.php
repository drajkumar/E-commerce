<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}

$post_id = escape($_GET['post_id']);
$result = array();
 if(isset($_POST['save']) ){
       $optionname    = escape($_POST['optionname']);
       $optionvalue   = escape($_POST['optionvalue']);

       if(empty($optionname)){
          $result[] ='Product option name field is empty';
       }elseif(empty($optionvalue )){
          $result[] = 'product option value field is empty';
       }else{

            
            $data = array(
           'option_product_id'	=> $post_id,
           'option_name'=> $optionname ,
           'option_value' => $optionvalue

            );
          $insert = $user->create_all('product_option', $data);
           if($insert == true){
           Session::flash('product_option', ' Product option is Store your database');
           Redirect::to('product_show.php');

          }else{
           Session::flash('product_option_error', ' Product option is not Store your database');
           Redirect::to('product_option.php');
          }
          


       }

}

?>

<?php

include_once  'tamplate/header.php';
include_once 'tamplate/sidebar.php';


?>


 <div id="content">
  <div id="content-header">
    <div id="breadcrumb">  </div>
    <h1>Product option add</h1>




  </div>

  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
          <a href="product_gelary.php?pro_id=<?php echo $post_id?>" style="font-size: 20px; margin-left: 50px;">Add gelary images</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Product option add</h5>

          </div>
          <div class="widget-content nopadding">
			<?php if ($result) { ?>
				  
				<?php  foreach ($result as $message) {
				    echo '<p style="font-size:17px; color:#FF4040; margin-left:60px">'.$message.'</p>';
				}?>
				</ul>
				<?php } ?>



            <form class="form-horizontal" action="" method="post">
            <div class="control-group">
              <label class="control-label">Product option name :</label>
              <div class="controls">
                <input type="text" name="optionname" class="span11"
                 value="<?php if(isset($optionname)){
                	echo $optionname;}  ?>" placeholder="Product option name" />
              </div>
            </div>







            <div class="control-group">
              <label class="control-label">Product option value:</label>
              <div class="controls">
                <input type="text" name="optionvalue"  value="<?php if(isset($optionvalue)){
                	echo $optionvalue;}  ?>" class="span11" placeholder="Product option value" />
              </div>
            </div>



            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="save" value="Save">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>


<?php
include_once 'tamplate/footer.php';

?>