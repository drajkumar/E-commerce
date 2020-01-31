<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}

$pro_id = Input::get('pro_id');

   $max = 50 * 1024;
   $date = date('Y-m-d H:i:s');
   $result = array();
   $destination = '../uploads/';
    if(isset($_POST['save']) ){


          $upload = new Upload($destination);
          $upload->upload();
          $picname = $upload->getname();

          foreach ($picname as $key => $value) {
          	     $data = array(
                   'product_id'	=> $pro_id,
                   'product_images' => $value
               );


          $insert = $user->create_all('product_gelary', $data);
           
           
          }
            

          
           if($insert == true){
             $result = $upload->getMessage();
          Session::flash('product_images', ' Product images is Store your database');
           Redirect::to('product_show.php');
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
    <h1>Product images add</h1>

  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Product images add</h5>
          </div>
          <div class="widget-content nopadding">
			<?php if ($result) { ?>
				  
				<?php  foreach ($result as $message) {
				    echo '<p style="font-size:17px; color:#FF4040; margin-left:60px">'.$message.'</p>';
				}?>
				</ul>
				<?php } ?>



            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
           



            <div class="control-group">
              <label class="control-label">Product Img:</label>
              <div class="controls">
              <input type="file" class="span11" name="filename[]" multiple/>
              <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max;?>">
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

      <div class="row-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Documenttation</h5>
      </div>
      <div class="widget-content">
        <div class="control-group">

        </div>
      </div>
    </div>
  </div>
  </div>
</div>




<?php
include_once 'tamplate/footer.php';

?>