<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}
$packs_id = escape($_GET['packs_id']); 


$max = 50 * 1024;
   $date = date('Y-m-d H:i:s');
   $result = array();
   $destination = '../uploads/';
    if(isset($_POST['save']) ){
       $productname    = escape($_POST['title']);
       $productdescription = escape($_POST['description']);
       $newprice   = escape($_POST['new_price']);
       $oldprice   = escape($_POST['old_price']);
       $mainchatagori   = escape($_POST['chatagori']);

       $send_id     = escape($_POST['sid']);
       $image_name  = escape($_POST['image_name']);

          $upload = new Upload($destination);
          $upload->upload();
          $picname = $upload->newname();

          if(isset($picname)){

          $user->update_all('packs', 'packs_id', $send_id, array(
           'title'   => $productname,
           'description' => $productdescription,
           'picture'         => $picname,
           'category'  => $mainchatagori,
           'new_rate'           => $newprice,
           'old_rate'           => $oldprice,
          
         
           

          ));

            Session::flash('packs_edit', ' Product is Edit your database');
            Redirect::to('show_packes.php');

          }else{

           $user->update_all('packs', 'packs_id', $send_id, array(
           'title'   => $productname,
           'description' => $productdescription,
           'picture'         => $image_name,
           'category'  => $mainchatagori,
           'new_rate'           => $newprice,
           'old_rate'           => $oldprice,
          
         
           

          ));
            Session::flash('packs_edit', ' Product is Edit your database');
            Redirect::to('show_packes.php');
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
              $picture = '';
              
              
              $data = $user->getData_one('packs', 'packs_id', $packs_id);
              foreach ($data as $key => $value):
                $picture = $data[$key]['picture'];
                

            ?>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Title :</label>
              <div class="controls">
                <input type="text" name="title" class="span11"
                 value="<?php echo $data[$key]['title'] ?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> Description:</label>
              <div class="controls">
                <textarea class="span11" name="description" ><?php echo $data[$key]['description']  ?></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">New Rate:</label>
              <div class="controls">
                <input type="text" name="new_price"  value="<?php echo $data[$key]['new_rate']  ?>" class="span11"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Old Rate:</label>
              <div class="controls">
                <input type="text" name="old_price"  value="<?php echo $data[$key]['old_rate']  ?>" class="span11"/>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Chatagori:</label>
              <div class="controls">
                <?php
                   $array =  $data[$key]['category'];
                   $array1 =  array('eventmanagement', 'electronics');
                   array_unshift($array1, $array);
                   $result = array_unique($array1);
                ?>
                   <select type="text" name="chatagori">
                    <?php

                    foreach ($result as $key => $value) {
                        echo "<option value=".$value.">". ucfirst($value)."</option>";
                 
                          }

                          ?>
                  </select>
                
              </div>
            </div>

       


        

            <div class="control-group">
              <div class="controls">
                 <img src="../uploads/<?php  echo $picture ;?>" width="150" height="150">
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
                <input type="hidden" name ="sid"  value="<?php echo $packs_id;?>" class="span11"/>
                <input type="hidden" name ="image_name"  value="<?php echo $picture?>" class="span11"/>
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