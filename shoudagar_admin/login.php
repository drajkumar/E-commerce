<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Shoudagar Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
         <div class="control-group normal_text"> <h3>Shoudagar Admin Login</h3></div>

                     <?php

                        if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
                                $username = trim($_REQUEST['username']);
                                  $password = trim($_REQUEST['password']);

                                   if(empty($username) && empty($password)){
                                     echo 'Please enter a username and password';
                                   }else{
                                    $user = new User();
                                       $login = $user->login(Input::get('username'), Input::get('password'));
                                         if($login){
                                           Redirect::to('index.php');
                                         }else{
                                           echo '<h4 style="color:#FF4040; margin-left:40px;">Invalid Username and Password </h4>';
                                         }

                                   }

                                }




                     ?>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="username" placeholder="Username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" required/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">

                    <span class="pull-right">
                    <input type="submit" name="login" value="Login" class="btn btn-success" />
                    </span>
                </div>
            </form>
 
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
