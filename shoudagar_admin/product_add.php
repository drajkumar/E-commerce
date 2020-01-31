<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}

   $max = 50 * 1024;
   $date = date('Y-m-d H:i:s');
   $result = array();
   $destination = '../uploads/';
    if(isset($_POST['save']) ){
       $productname    = escape($_POST['productname']);
       $newprice   = escape($_POST['newprice']);
       $productdescription = escape($_POST['productdescription']);
       $chatagori   = escape($_POST['chatagori']);
       $subchatagori = escape($_POST['subchatagori']);
       $product_code = escape($_POST['product_code']);
       $stok         = escape($_POST['stok']);
       if(empty($productname)){
          $result[] ='Product field is empty';
       }elseif(empty($productdescription)){
          $result[] = 'product Description field is empty';
       }elseif(empty($newprice)){
          $result[] = 'Price field is empty';
       }elseif(empty($chatagori)){
          $result[] = 'main Chatagori field is empty';
       }elseif(empty($subchatagori)){
          $result[] = 'Sub chatagori field is empty';
        }elseif(empty($product_code)){
        	 $result[] = 'Product key  field is empty';
        }elseif(empty($stok)){
           $result[] = 'Product Stok  field is empty';
        }else{
          $upload = new Upload($destination);
          $upload->upload();
          $picname = $upload->newname();
            
            $data = array(
           'product_uq_id'	=> uniqid(),
           'product_head_text'=> $productname,
           'product_description' => $productdescription,
           'new_price' => $newprice,
           'old_price' => 0,
           'product_main_chata' => $chatagori,
           'product_sub_chata' =>  $subchatagori,
           'product_code'   => $product_code,
           'stok'           => $stok,
           'product_img'    => $picname,
           'status'        => 0,
           'add_time' => $date
            );
          $insert = $user->create_all('product', $data);
           if($insert == true){
             $result = $upload->getMessage();
           Session::flash('product_add', ' Product is Store your database');
           Redirect::to('product_add.php');

          }else{
           Session::flash('product_add_error', ' Product is not Store your database');
           Redirect::to('product_add.php');
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
    <h1>Content Add</h1>
             <?php  
           if(Session::exists('product_add')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('product_add') .'</p>           
              </div>';
             }elseif(Session::exists('product_add_error')){
              echo '<div class="alert alert-error alert-block">
               <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 style="margin-left:60px"  class="alert-heading">Error!</h4>'.
              '<p style="font-size:15px; color:#FF4040; margin-left:60px">'.
               Session::flash('product_add_error') .'</p></div>';
             } 
           ?> 



  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Frontend Content add</h5>
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
              <label class="control-label">Product name :</label>
              <div class="controls">
                <input type="text" name="productname" class="span11"
                 value="<?php if(isset($productname)){
                	echo $productname;}  ?>" placeholder="Product name" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Product Description:</label>
              <div class="controls">
                <textarea class="span11" name="productdescription" ><?php if(isset($productdescription)){
                	echo $productdescription;}  ?></textarea>
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">New price:</label>
              <div class="controls">
                <input type="number" name="newprice"  value="<?php if(isset($newprice )){
                	echo $newprice ;}  ?>" class="span11" placeholder="Product price" />
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Main chatagori:</label>
              <div class="controls">
                   <select type="text" name="chatagori">
                   <option value="">Select</option>
                       <?php $chatagori = $user->get_product_cata(); foreach ($chatagori as $key => $value): ?>
                      <option value="<?php echo $chatagori[$key]['main_catagori']; ?>"><?php echo $chatagori[$key]['main_catagori'];   ?></option>
                       <?php endforeach; ?>
                  </select>
             
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Sub chatagori:</label>
              <div class="controls">
                   <select type="text" name="subchatagori">
                   <option value="">Select</option>
                       <?php $chatagori = $user->get_product_sub_cata(); foreach ($chatagori as $key => $value): ?>
                      <option value="<?php echo $chatagori[$key]['sub_chatagori']; ?>"><?php echo $chatagori[$key]['sub_chatagori'];   ?></option>
                       <?php endforeach; ?>
                  </select>
             
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Product code:</label>
              <div class="controls">
                <input type="text" name="product_code"  value="<?php if(isset($product_code)){
                	echo $product_code;}  ?>" class="span11" placeholder="product_code" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Stok:</label>
              <div class="controls">
                <input type="number" name="stok"  value="<?php if(isset($stok )){
                  echo $stok ;}  ?>" class="span11" placeholder="Stok" />
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Product Img:</label>
              <div class="controls">
              <input type="file" class="span11" name ="filename" />
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