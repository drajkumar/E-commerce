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
  <div id="content-header">
    <div id="breadcrumb"> <a href="product_show.php" title="Go to Home" class="tip-bottom">
      <i class="icon-home"></i> Home</a>
 


     </div>
    <h1>All Post</h1>
      
          <?php  
           if(Session::exists('product_publish')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('product_publish') .'</p>           
              </div>';
             }elseif(Session::exists('post_edit')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('post_edit') .'</p>           
              </div>';
             }elseif(Session::exists('product_option')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('product_option') .'</p>           
              </div>';
             }elseif(Session::exists('product_images')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('product_images') .'</p>           
              </div>';
             }
           ?> 


  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        


        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>All Post</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th>No:</th>
                  <th>Title</th>
                  <th>Description</th>
                  
                  <th>Post img</th>
         
                  <th>Created time</th>
                  <th>Updated time</th>
                  
                  <th>Edit</th>
                  <th>View</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
               <?php
                   $x = 0;
                  $content = $user->get_all('blog', 'blog_id');
                   foreach ($content as $key => $value):
                   	$x++;
               ?>
                <tr class="gradeX">
                <td><?php echo $x;  ?></td>
                  <td><?php  echo $content[$key]['title'] ;?></td>
                  <td><?php  echo $content[$key]['description'] ;?></td>

                  <td><img src="../uploads/<?php  echo $content[$key]['picture'] ;?>" width="50" height="50"></td>

                  
                  <td><?php  echo $content[$key]['createed_time'] ;?></td>
                  <td><?php  echo $content[$key]['updateed_time'] ;?></td>
                 
                 

   
                  <td class="center"><a data-dismiss="modal" class="btn btn-warning" href="post_edit.php?blog_id=<?php  echo $content[$key]['blog_id'] ;?>">Edit</a> </td>
                  <td class="center"><a class="btn btn-info" href="post_details.php?blog_id=<?php  echo $content[$key]['blog_id'] ;?>">View Details</a></td>
                  <td class="center"> <a  post-id="<?php  echo $content[$key]['blog_id'] ;?>" class="btn btn-danger delete_post" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i>Delete</a>
 
                  </td>
                </tr>
                <?php endforeach;?>
                
              </tbody>
            </table>
          </div>
        </div>


 










        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Static table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd gradeX">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0</td>
                  <td class="center">X</td>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0</td>
                  <td class="center">X</td>
                  <td class="center">X</td>
                  <td class="center">X</td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>




      </div>
    </div>
  </div>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">

 $(document).ready(function(){
    
    $('.delete_post').click(function(e){
      
      e.preventDefault();
      
      var pid = $(this).attr('post-id');
      var parent = $(this).parent("td").parent("tr");
      
      bootbox.dialog({
        message: "Are you sure you want to Delete ?",
        title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
        buttons: {
        success: {
          label: "No",
          className: "btn-success",
          callback: function() {
           $('.bootbox').modal('hide');
          }
        },
        danger: {
          label: "Delete!",
          className: "btn-danger",
          callback: function() {
            
     
            /*
            using $.ajax();

            $.ajax({
              
              type: 'POST',
              url: 'remove_content.php',
              data: 'delete='+pid
              
            })
            /*
            .done(function(response){
              
              bootbox.alert(response);
              parent.fadeOut('slow');
              
            })
            .fail(function(){
              
              bootbox.alert('Something Went Wrog ....');
                            
            })
            */
            
            
            $.post('remove.php', { 'post':pid })
            .done(function(response){
              bootbox.alert(response);
              parent.fadeOut('slow');
            })
            .fail(function(){
              bootbox.alert('Something Went Wrog ....');
            })
                        
          }
        }
        }
      });
      
      
    });
    
  });
</script>

<?php
include_once 'tamplate/footer.php';

?>