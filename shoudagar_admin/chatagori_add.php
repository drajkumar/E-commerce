
<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';




$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}

        if(isset($_POST['submit']) ){
             $error = array();
            $chatagori = $_POST['chatagori'];
            $subchatagori = $_POST['subchatagori'];
           if(empty($chatagori)){
                $error[] = 'Chatagori is empty';
             }elseif(empty($subchatagori)){
                $error[] = 'Sub Chatagori is empty';
             }else{
              if(isset($chatagori)){ 

                 $user->chatagori_create(array(

                 'main_catagori' => $chatagori,
                 'sub_chatagori' => $subchatagori
                  ));

                 Session::flash('home', 'Chatagori is Store your database');
                 Redirect::to('chatagori_add.php');
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
    <h1>Add your chatagori</h1>
          <?php  
           if(Session::exists('chatagori')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('chatagori') .'</p>           
              </div>';
             }elseif(Session::exists('chatagori_error')){
              echo '<div class="alert alert-error alert-block">
               <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 style="margin-left:60px"  class="alert-heading">Error!</h4>'.
              '<p style="font-size:15px; color:#FF4040; margin-left:60px">'.
               Session::flash('chatagori_error') .'</p>           
              </div>';
             }
           ?> 

  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add your chatagori</h5>
          </div>
          <div class="widget-content nopadding">
         <?php
         if(isset($error)){
            foreach ($error as $value) {
              echo '<p style="font-size:17px; color:#FF4040; margin-left:60px">'.$value.'</p>';
            }
         }
          if(Session::exists('home')){
          echo '<p style="font-size:17px; color:green; margin-left:60px">'. Session::flash('home') .'</p>';
           }       
?>

       <form class="form-horizontal" method="post" action="chatagori_add.php" id="basic_validate" novalidate="novalidate">
              <div class="control-group">
                <label class="control-label">Main Chatagori Name:</label>
                <div class="controls">
                  <input type="text" name="chatagori" id="required">
                </div>
                <label class="control-label">Sub Chatagori Name:</label>
                <div class="controls">
                  <input type="text" name="subchatagori" id="required">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" name="submit" value="Add_chatagori" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>

       <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>View_chatagori</h5>
          </div>
          <div class="widget-content">
          	
          	<div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th>No:</th>
                  <th>Main Chatagori</th>
                  <th>Sub Chatagori</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
               <?php
                   $x = 0;
                  $content = $user->get_all('product_catagori', 'chata_id');
                   foreach ($content as $key => $value):
                   	$x++;
               ?>
                <tr class="gradeX">
                <td><?php echo $x;  ?></td>
                  <td><?php  echo $content[$key]['main_catagori'] ;?></td>
                  <td><?php  echo $content[$key]['sub_chatagori'] ;?></td>

                  <td class="center"><a data-dismiss="modal" class="btn btn-primary" href="chatagori_edit_view.php?chata_id=<?php  echo $content[$key]['chata_id'] ;?>">Edit</a> </td>
                  <td class="center"> <a  chata-id="<?php  echo $content[$key]['chata_id'] ;?>" class="btn btn-danger delete_chatagori" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i>Delete</a>
 
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

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Documentation</h5>
          </div>
            <div class="widget-content nopadding">
             <h3>Post type Chatagori name </h3>
              <p>This is your post type chatagori fields.Add a chatagori like home, blog aboutus etc. </p>
          </div>
          <div class="widget-content nopadding">

          </div>
        </div>
      </div>
  
    </div>
  </div>
</div>


<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="bootbox.min.js"></script>
<script type="text/javascript">

 $(document).ready(function(){
    
    $('.delete_chatagori').click(function(e){
      
      e.preventDefault();
      
      var pid = $(this).attr('chata-id');
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
            
            
            $.post('remove.php', { 'chata':pid })
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

