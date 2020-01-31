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
      <?php   
         $cata = $user->get_product_cata();
         foreach ($cata as $key => $value): 
      ?>
       <a href="<?php echo $cata[$key]['main_catagori'] ?>.php" class="current"><?php  echo ucfirst($cata[$key]['main_catagori']) ?></a>
       <?php endforeach;?> 


     </div>
              <div id="breadcrumb"> <a title="Go to Home" class="tip-bottom">
      <i class="icon-home"></i> Sub catagori</a>
      <?php   
         $cata = $user->get_product_sub_cata_for_manu('woman');
         foreach ($cata as $key => $value): 
      ?>
       <a href="product_sub_cata.php?sub_cata=<?php echo $cata[$key]['sub_chatagori'];?>" class="current"><?php  echo ucfirst($cata[$key]['sub_chatagori']) ?></a>
       <?php endforeach;?> 


     </div>
    <h1>Woman product</h1>
      
          <?php  
           if(Session::exists('product_publish')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('product_publish') .'</p>           
              </div>';
             }elseif(Session::exists('product_edit')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('product_edit') .'</p>           
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
            <h5>Woman product</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th>No:</th>
                  <th>Product name</th>
                  <th>New price</th>
                  <th>Old price</th>
                  <th>Main cata</th>
                  <th>sub cata</th>
                  <th>product key</th>
                  <th>product img</th>
                  <th>Status</th>
                  <th>Publish</th>
                  <th>Add option</th>
                  
                  <th>Edit</th>
                  <th>View</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
               <?php
                   $x = 0;
                   $content = $user->getData_main_cata('product', 'product_main_chata', 'woman');
                   foreach ($content as $key => $value):
                   	$x++;
               ?>
                <tr class="gradeX">
                <td><?php echo $x;  ?></td>
                  <td><?php  echo $content[$key]['product_head_text'] ;?></td>
                  <td><?php  echo $content[$key]['new_price'] ;?></td>
                  <td><?php  echo $content[$key]['old_price'] ;?></td>
                  <td><?php  echo $content[$key]['product_main_chata'];?></td>
                  <td><?php  echo $content[$key]['product_sub_chata'] ;?></td>
                  <td><?php  echo $content[$key]['product_code'] ;?></td>

                  <td><img src="../uploads/<?php  echo $content[$key]['product_img'] ;?>" width="50" height="50"></td>

                  <td>
                    <?php 
                      if($content[$key]['status'] == 0){
                       echo 'Unpublish';
                      }else{
                       echo 'Publish';
                      }
                     ?>
                    </td>
                    <?php if($content[$key]['status'] == 0){?>
                  <td class="center"><a data-dismiss="modal" class="btn btn-primary" href="active.php?status_id=<?php  echo $content[$key]['product_id'] ;?>&aprub=1">Publish</a> </td>
                  <?php }elseif($content[$key]['status'] == 1){?>
                      <td class="center"><a data-dismiss="modal" class="btn btn-primary" href="active.php?status_id=<?php  echo $content[$key]['product_id'] ;?>&aprub=0">UnPublish</a> </td>

                      <?php } ?>
                  <td class="center"><a data-dismiss="modal" class="btn btn-success" href="product_option.php?post_id=<?php  echo $content[$key]['product_id'] ;?>">Add option</a> </td>
                 

   
                  <td class="center"><a data-dismiss="modal" class="btn btn-warning" href="product_edit.php?post_id=<?php  echo $content[$key]['product_id'] ;?>">Edit</a> </td>
                  <td class="center"><a class="btn btn-info" href="product_details.php?product_id=<?php  echo $content[$key]['product_id'] ;?>">View Details</a></td>
                  <td class="center"> <a  product-id="<?php  echo $content[$key]['product_id'] ;?>" class="btn btn-danger delete_product" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i>Delete</a>
 
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
    
    $('.delete_product').click(function(e){
      
      e.preventDefault();
      
      var pid = $(this).attr('product-id');
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
            
            
            $.post('remove.php', { 'product':pid })
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