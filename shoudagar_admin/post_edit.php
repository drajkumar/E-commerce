<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}
$post_id = escape($_GET['blog_id']); 


$max = 50 * 1024;
   $date = date('Y-m-d');
   $result = array();
   $destination = '../uploads/';
    if(isset($_POST['save']) ){
       $title    = escape($_POST['title']);
       $description = escape($_POST['description']);

       $send_id     = escape($_POST['sid']);
       $image_name  = escape($_POST['image_name']);

          $upload = new Upload($destination);
          $upload->upload();
          $picname = $upload->newname();

          if(isset($picname)){

          $user->update_all('blog', 'blog_id', $send_id, array(
           'title'   => $title,
           'description' => $description,
           'picture'  => $picname,
           'updateed_time' => $date

          ));

            Session::flash('post_edit', ' Post is Edit your database');
            Redirect::to('show_blog_post.php');

          }else{

             $user->update_all('blog', 'blog_id', $send_id, array(
           'title'   => $title,
           'description' => $description,
           'picture'  => $image_name,
           'updateed_time' => $date

          ));

       

            Session::flash('post_edit', ' Post is Edit your database');
            Redirect::to('show_blog_post.php');
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
 
              $data = $user->getData_one('blog', 'blog_id', $post_id);
              foreach ($data as $key => $value):

            ?>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">title :</label>
              <div class="controls">
                <input type="text" name="title" class="span11"
                 value="<?php echo $data[$key]['title'] ?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Description:</label>
              <div class="controls">
                <textarea class="span11" name="description" ><?php echo $data[$key]['description']  ?></textarea>
              </div>
            </div>

            


            

            <div class="control-group">
              <div class="controls">
                 <img src="../uploads/<?php  echo $data[$key]['picture'] ;?>" width="150" height="150">
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
                <input type="hidden" name ="sid"  value="<?php echo $data[$key]['blog_id']?>" class="span11"/>
                <input type="hidden" name ="image_name"  value="<?php echo $data[$key]['picture']?>" class="span11"/>
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