<?php
require_once '../../core/init.php';
require_once '../../functions/sanitize.php';
require_once '../../vendor/autoload.php';

$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}

  $post_id = escape($_GET['post_id']);

   $date = date('Y-m-d H:i:s');
  $destination = '../uploads/';
    $result = array();
    if(isset($_POST['save']) ){
       $headtext    = escape($_POST['headtext']);
       $othertext   = escape($_POST['othertext']);
       $description = escape($_POST['description']);
       $chatagori   = escape($_POST['chatagori']);
       $contentpart = escape($_POST['contentpart']);
       $send_id     = escape($_POST['sid']);
       $image_name  = escape($_POST['image_name']);
          $upload = new Upload($destination);
          $upload->upload();
          $picname = $upload->newname();

          if(isset($picname)){
           $user->update_all('content', $send_id, array(
           'admin_user_id'=> $user->data()->id,
           'head_name'    => $headtext,
           'other_info' => $othertext,
           'description' => $description,
           'chatagori' => $chatagori,
           'content_part' => $contentpart,
           'image' => $picname,
           'modefiy' => $date
            )
          );
 
            Session::flash('content_edit', ' Content is Edit your database');
            Redirect::to('content_view.php');
          }else{
            $user->update_all('content', $send_id, array(
           'admin_user_id'=> $user->data()->id,
           'head_name'    => $headtext,
           'other_info' => $othertext,
           'description' => $description,
           'chatagori' => $chatagori,
           'content_part' => $contentpart,
           'image' => $image_name,
           'modefiy' => $date
            )
          );
            Session::flash('content_edit', ' Content is Edit your database');
            Redirect::to('content_view.php');
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

  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Frontend Content edit</h5>
          </div>
          <div class="widget-content nopadding">

				</ul>



           <?php 
 
              $data = $user->getData_one('content', $post_id);
              foreach ($data as $key => $value):

            ?>
            <form class="form-horizontal" action="content_edit_view.php" method="post" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Head_text :</label>
              <div class="controls">
                <input type="text" name="headtext" class="span11"
                 value="<?php echo $data[$key]['head_name'] ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Other_text:</label>
              <div class="controls">
                <input type="text" name="othertext"  value="<?php echo $data[$key]['other_info']  ?>" class="span11"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Description:</label>
              <div class="controls">
                <textarea class="span11" name="description" ><?php echo $data[$key]['description']  ?></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Chatagori:</label>
              <div class="controls">
                <input type="text" name="chatagori"  value="<?php echo $data[$key]['chatagori']  ?>" class="span11"/>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Content_part:</label>
              <div class="controls">
                <input type="text" name="contentpart"  value="<?php echo $data[$key]['content_part']?>" class="span11"/>
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                 <img src="../uploads/<?php  echo $data[$key]['image'] ;?>" width="300" height="300">
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
                <input type="hidden" name ="sid"  value="<?php echo $data[$key]['id']?>" class="span11"/>
                <input type="hidden" name ="image_name"  value="<?php echo $data[$key]['image']?>" class="span11"/>
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