<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}
$post_id = escape($_GET['post_id']); 


$max = 50 * 1024;
   $date = date('Y-m-d H:i:s');
   $result = array();
   $destination = '../uploads/';
    if(isset($_POST['save']) ){
       $productname    = escape($_POST['productname']);
       $productdescription = escape($_POST['product_description']);
       $newprice   = escape($_POST['new_price']);
       $oldprice   = escape($_POST['old_price']);
       $mainchatagori   = escape($_POST['mainchatagori']);
       $subchatagori = escape($_POST['subchatagori']);
       $product_code = escape($_POST['productcode']);
       $stok         = escape($_POST['stok']);
       $send_id     = escape($_POST['sid']);
       $image_name  = escape($_POST['image_name']);

          $upload = new Upload($destination);
          $upload->upload();
          $picname = $upload->newname();

          if(isset($picname)){

          $user->update_all('product', 'product_id', $send_id, array(
           'product_head_text'   => $productname,
           'product_description' => $productdescription,
           'new_price'           => $newprice,
           'old_price'           => $oldprice,
           'product_main_chata'  => $mainchatagori,
           'product_sub_chata'   => $subchatagori,
           'product_code'        => $product_code,
           'stok'                => $stok,
           'product_img'         => $picname

          ));

            Session::flash('product_edit', ' Product is Edit your database');
            Redirect::to('product_show.php');

          }else{

          $user->update_all('product', 'product_id', $send_id, array(
           'product_head_text'   => $productname,
           'product_description' => $productdescription,
           'new_price'           => $newprice,
           'old_price'           => $oldprice,
           'product_main_chata'  => $mainchatagori,
           'product_sub_chata'   => $subchatagori,
           'product_code'        => $product_code,
           'stok'                => $stok,
           'product_img'         => $image_name

          ));

            Session::flash('product_edit', ' Product is Edit your database');
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
    <h1>Product edit</h1>

  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Product edit</h5>
          </div>
          <div class="widget-content nopadding">

				</ul>



           <?php 
 
              $data = $user->getData_one('product', 'product_id', $post_id);
              foreach ($data as $key => $value):

            ?>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Product name :</label>
              <div class="controls">
                <input type="text" name="productname" class="span11"
                 value="<?php echo $data[$key]['product_head_text'] ?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Product Description:</label>
              <div class="controls">
                <textarea class="span11" name="product_description" ><?php echo $data[$key]['product_description']  ?></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">New Price:</label>
              <div class="controls">
                <input type="text" name="new_price"  value="<?php echo $data[$key]['new_price']  ?>" class="span11"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Old Price:</label>
              <div class="controls">
                <input type="text" name="old_price"  value="<?php echo $data[$key]['old_price']  ?>" class="span11"/>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Main Chatagori:</label>
              <div class="controls">
                <input type="text" name="mainchatagori"  value="<?php echo $data[$key]['product_main_chata']  ?>" class="span11"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Sub Chatagori:</label>
              <div class="controls">
                <input type="text" name="subchatagori"  value="<?php echo $data[$key]['product_sub_chata']  ?>" class="span11"/>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Product Code:</label>
              <div class="controls">
                <input type="text" name="productcode"  value="<?php echo $data[$key]['product_code']?>" class="span11"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Stok:</label>
              <div class="controls">
                <input type="text" name="stok"  value="<?php echo $data[$key]['stok']?>" class="span11"/>
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                 <img src="../uploads/<?php  echo $data[$key]['product_img'] ;?>" width="150" height="150">
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Image_File:</label>
              <div class="controls">
              <input type="file" class="span11" name ="filename" />
              <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max;?>">
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                <input type="hidden" name ="sid"  value="<?php echo $data[$key]['product_id']?>" class="span11"/>
                <input type="hidden" name ="image_name"  value="<?php echo $data[$key]['product_img']?>" class="span11"/>
              </div>
            </div>


            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="save" value="Save">
            </div>
          </form>
          <?php endforeach;?>
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