<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';


$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}

    if(isset($_POST['save']) ){
       $chatagori   = escape($_POST['chatagori']);
       $subchatagori   = escape($_POST['subchatagori']);
       $id = escape($_POST['id']);

         if(isset($id)){
             $user->update_all('product_catagori', 'chata_id', $id, array(
           'main_catagori' => $chatagori,
           'sub_chatagori' => $subchatagori
            )
          );


      	    Session::flash('chatagori', ' Chatagori is Edit your database');
            Redirect::to('chatagori_add.php');
         }else{
         	Session::flash('chatagori_error', ' Chatagori is not Edit your database');
            Redirect::to('chatagori_add.php');
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
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
    <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add your chatagori</h5>
          </div>
          <div class="widget-content nopadding">
            <?php 
              $chata_id = escape($_REQUEST['chata_id']);
              $data = $user->getData_one('product_catagori', 'chata_id', $chata_id);
              foreach ($data as $key => $value):

            ?>
       <form class="form-horizontal" method="post" action="chatagori_edit_view.php" id="basic_validate" novalidate="novalidate">

              <div class="control-group">
                <label class="control-label">Chatagori Name:</label>
                <div class="controls">
                  <input type="text" name="chatagori" value="<?php echo $data[$key]['main_catagori']; ?>"/>
                   <input type="text" name="subchatagori" value="<?php echo $data[$key]['sub_chatagori']; ?>"/>
                  <input type="hidden" name="id" value="<?php echo $data[$key]['chata_id']; ?>"/>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" name="save" value="Add_chatagori" class="btn btn-success">
              </div>
              <?php endforeach ?>
            </form>
          </div>
        </div>
      </div>
    </div>

</div>












<?php
include_once 'tamplate/footer.php';

?>