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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Order</a> </div>
    <h1>Order</h1>
      
          <?php  
           if(Session::exists('confrim_order')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('confrim_order') .'</p>           
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
            <h5>Order item and Order user</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th>No:</th>
                  <th>User id</th>
                  <th>Product id</th>
                  <th>Product code</th>
                  <th>Quantity</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>Subtotal</th>
                  <th>Order time</th>
                  <th>Status</th>
                  <th>Confrim</th>
                  <th>View</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
               <?php
                   $x = 0;
                  $content = $user->get_all('product_order', 'user_phone_num');
                   foreach ($content as $key => $value):
                   	$x++;
               ?>
                <tr class="gradeX">
                <td><?php echo $x;  ?></td>
                  <td><?php  echo $content[$key]['user_phone_num'] ;?></td>
                  <td><?php  echo $content[$key]['product_id'] ;?></td>
                  <td><?php  echo $content[$key]['productcode'] ;?></td>
                  <td><?php  echo $content[$key]['quantity'];?></td>
                  <td><?php  echo $content[$key]['size'] ;?></td>
                  <td><?php  echo $content[$key]['color'] ;?></td>

                  <td> <?php echo $content[$key]['subtotal'] ;?></td>
                  <td class="center"><?php  echo $content[$key]['order_time'] ;?></td>

                  <td>
                    <?php 
                      if($content[$key]['status'] == 0){
                       echo 'Panding';
                      }else{
                       echo 'Confrim';
                      }
                     ?>
                    </td>

                      

                    
              
                 

   
                  <td class="center"><a class="btn btn-info" href="active.php?order_id=<?php  echo $content[$key]['order_id'] ;?>&confrim=1">Confrim</a></td>
                  <td class="center"><a class="btn btn-info" href="order_details.php?product_id=<?php  echo $content[$key]['product_id'] ;?>&user_id=<?php  echo $content[$key]['user_phone_num'] ;?>&quantity=<?php  echo $content[$key]['quantity'] ;?>">View Details</a></td>
                  <td class="center"> <a  order-id="<?php  echo $content[$key]['order_id'] ;?>" class="btn btn-danger delete_order" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i>Delete</a>
 
                  </td>
                </tr>
                <?php endforeach;?>
                
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
    
    $('.delete_order').click(function(e){
      
      e.preventDefault();
      
      var pid = $(this).attr('order-id');
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
            
            
            $.post('remove.php', { 'order':pid })
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