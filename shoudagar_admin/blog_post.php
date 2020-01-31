<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}

   $max = 50 * 1024;
   $date = date('Y-m-d');
   $result = array();
   $destination = '../uploads/';
    if(isset($_POST['save']) ){
       $title    = escape($_POST['title']);
       $description = escape($_POST['description']);

       if(empty($title)){
          $result[] ='Title field is empty';
       }elseif(empty($description)){
          $result[] = ' Description field is empty';
       }else{
          $upload = new Upload($destination);
          $upload->upload();
          $picname = $upload->newname();
            
            $data = array(
        
           'title'=> $title,
           'description' => $description,
           'picture'    => $picname,
           'createed_time' => $date,
           'updateed_time' => ''
            );
          $insert = $user->create_all('blog', $data);
           if($insert == true){
             $result = $upload->getMessage();
           Session::flash('post_add', ' Post is Store your database');
           Redirect::to('blog_post.php');

          }else{
           Session::flash('post_add_error', ' Post is not Store your database');
           Redirect::to('blog_post.php');
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
    <h1>Blog Post Add</h1>
             <?php  
           if(Session::exists('post_add')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('post_add') .'</p>           
              </div>';
             }elseif(Session::exists('post_add_error')){
              echo '<div class="alert alert-error alert-block">
               <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 style="margin-left:60px"  class="alert-heading">Error!</h4>'.
              '<p style="font-size:15px; color:#FF4040; margin-left:60px">'.
               Session::flash('post_add_error') .'</p></div>';
             } 
           ?> 



  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Blog Post Add</h5>
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
              <label class="control-label">Title :</label>
              <div class="controls">
                <input type="text" name="title" class="span11"
                 value="<?php if(isset($title)){
                	echo $title;}  ?>" placeholder="Title" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Description:</label>
              <div class="controls">
                <textarea class="span11" name="description" rows="12" ><?php if(isset($description)){
                	echo $description;}  ?></textarea>
              </div>
            </div>



            <div class="control-group">
              <label class="control-label">Picture:</label>
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