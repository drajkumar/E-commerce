<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$user = new User();

   $date = date('Y-m-d H:i:s');
    if(isset($_POST['save']) ){
       $username    = escape($_POST['username']);
       $password   = escape($_POST['password']);

       if(empty($username)){
          $result[] ='Username field is empty';
       }elseif(empty($password)){
          $result[] = 'Password field is empty';
        }
       	if(isset($username)){
       	  $salt = Hash::salt();


            
           $user->create_all('admin_users',array(
           'username'   => $username,
           'password'   => Hash::make($password, $salt),
           'salt'       => $salt,
           'joined'       => $date
            ));
  

           Session::flash('account', ' Your admin account hasbeen Created');
           Redirect::to('register_admin.php');
          }else{
           Session::flash('account_error', ' Your admin account hasbeen Not Created');
           Redirect::to('register_admin.php');
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
           if(Session::exists('account')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('account') .'</p>           
              </div>';
             }elseif(Session::exists('account_error')){
              echo '<div class="alert alert-error alert-block">
               <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 style="margin-left:60px"  class="alert-heading">Error!</h4>'.
              '<p style="font-size:15px; color:#FF4040; margin-left:60px">'.
               Session::flash('account_error') .'</p></div>';
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
			<?php if (isset($result)) { ?>
				  
				<?php  foreach ($result as $message) {
				    echo '<p style="font-size:17px; color:#FF4040; margin-left:60px">'.$message.'</p>';
				}?>
				</ul>
				<?php } ?>



            <form class="form-horizontal" action="" method="post">
            <div class="control-group">
              <label class="control-label">Username:</label>
              <div class="controls">
                <input type="text" name="username" class="span11"
                 value="<?php if(isset($username)){
                	echo $username;}  ?>" placeholder="Username" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password:</label>
              <div class="controls">
                <input type="password" name="password"  class="span11" placeholder="Password" />
              </div>
            </div>


            <div class="form-actions">
              <input type="hidden" name="token" value="<?php echo Token::generete(); ?>"/>
              <input type="submit" class="btn btn-success" name="save" value="Create_account">
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