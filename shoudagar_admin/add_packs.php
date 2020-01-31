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
      
       if(empty($productname)){
          $result[] ='Product field is empty';
       }elseif(empty($productdescription)){
          $result[] = 'product Description field is empty';
       }elseif(empty($newprice)){
          $result[] = 'Price field is empty';
       }elseif(empty($chatagori)){
          $result[] = 'main Chatagori field is empty';
       }else{
          $upload = new Upload($destination);
          $upload->upload();
          $picname = $upload->newname();
            
            $data = array(
           'packs_uq_id'	=> uniqid(),
           'title'=> $productname,
           'description' => $productdescription,
           'picture' => $picname,
           'new_rate' =>  $newprice,
           'old_rate' => 0,
           'category' => $chatagori,
           'created_at' => $date
            );
          $insert = $user->create_all('packs', $data);
           if($insert == true){
             $result = $upload->getMessage();
           Session::flash('packs_add', ' Packs is Store your database');
           Redirect::to('add_packs.php');

          }else{
           Session::flash('packs_add_error', ' Packs is not Store your database');
           Redirect::to('add_packs.php');
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
           if(Session::exists('packs_add')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('packs_add') .'</p>           
              </div>';
             }elseif(Session::exists('packs_add_error')){
              echo '<div class="alert alert-error alert-block">
               <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 style="margin-left:60px"  class="alert-heading">Error!</h4>'.
              '<p style="font-size:15px; color:#FF4040; margin-left:60px">'.
               Session::flash('packs_add_error') .'</p></div>';
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
              <label class="control-label">Packs name :</label>
              <div class="controls">
                <input type="text" name="productname" class="span11"
                 value="<?php if(isset($productname)){
                	echo $productname;}  ?>" placeholder="Packs name" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Packs Description:</label>
              <div class="controls">
                <textarea class="span11" name="productdescription" ><?php if(isset($productdescription)){
                	echo $productdescription;}  ?></textarea>
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">New rate:</label>
              <div class="controls">
                <input type="number" name="newprice"  value="<?php if(isset($newprice )){
                	echo $newprice ;}  ?>" class="span11" placeholder="Packs price" />
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Main chatagori:</label>
              <div class="controls">
                   <select type="text" name="chatagori">
                   <option value="">Select</option>
                       
                      <option value="eventmanagement">Eventmanagement</option>
                      <option value="electronics">Electronics</option>
                       
                  </select>
             
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Packs Img:</label>
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