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
   <?php
    // sengle menu view
    // pass id form manu_view page
   //  this id name manu id
     if(isset($_REQUEST['manu_id'])){
     	$manu_id = escape($_REQUEST['manu_id']);
     	 $data = $user->getData_one('menus', $manu_id);
          foreach ($data as $key => $value){

               echo '<div id="content-header">';
    echo '<div id="breadcrumb"></div><h1>Manu view</h1>'; 
    echo '</div>';
    echo '  <div class="container-fluid"><hr>
    <div class="row-fluid">
     <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Manu View</h5>
          </div>
          <div class="widget-content">';

           
          echo'<h1>'. $data[$key]["menu_name"].'</h1>';
          echo'<h2>'. $data[$key]["menu_url"].'</h2>';
          echo'<p>'. $data[$key]['chatagori'].'</p>';
           echo'<p>'. $data[$key]['time'].'</p>';

         echo '</div></div></div></div></div>';
          }




     }elseif(isset($_REQUEST['cont_id'])){
      $cont_id = escape($_REQUEST['cont_id']);
       $data = $user->getData_one('content', $cont_id);
          foreach ($data as $key => $value){

               echo '<div id="content-header">';
    echo '<div id="breadcrumb"></div><h1>Content view</h1>'; 
    echo '</div>';
    echo '  <div class="container-fluid"><hr>
    <div class="row-fluid">
     <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Content View</h5>
          </div>
          <div class="widget-content">';

           
          echo'<h1>'. $data[$key]["head_name"].'</h1>';
          echo'<h2>'. $data[$key]["other_info"].'</h2>';
          echo'<p>'. $data[$key]['description'].'</p>';
          echo'<p>'.$data[$key]['chatagori'].'</p>';
          echo'<p>'. $data[$key]['content_part'].'</p>';
          echo'<p>'. $data[$key]['time'].'</p>';
         echo '<img src="../uploads/'. $data[$key]['image'].'" width="300" height="300">';
         echo '</div></div></div></div></div>';
          }


     }elseif (isset($_REQUEST['pro_id'])) {
     	$pro_id = escape($_REQUEST['pro_id']);
     	$data = $user->getData_one('projects', $pro_id);
     	foreach ($data as $key => $value){

    echo '<div id="content-header">';
    echo '<div id="breadcrumb"></div><h1>Project view</h1>'; 
    echo '</div>';
    echo '  <div class="container-fluid"><hr>
    <div class="row-fluid">
     <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Project View</h5>
          </div>
          <div class="widget-content">';

           
          echo'<h1>'. $data[$key]["project_name"].'</h1>';
          echo'<h2>'. $data[$key]["project_url"].'</h2>';
          echo'<p>'. $data[$key]['description'].'</p>';
          echo'<p>'.$data[$key]['chatagori'].'</p>';
         echo '<img src="../uploads/'. $data[$key]['image'].'" width="300" height="300">';
         echo'<p>'. $data[$key]['time'].'</p>';
         echo '</div></div></div></div></div>';
          }
     }elseif(isset($_REQUEST['mess_id'])){
        $mess_id = escape($_REQUEST['mess_id']);
      $data = $user->getData_one('contact', $mess_id);
      foreach ($data as $key => $value){
            echo '<div id="content-header">';
    echo '<div id="breadcrumb"></div><h1>Message view</h1>'; 
    echo '</div>';
    echo '  <div class="container-fluid"><hr>
    <div class="row-fluid">
     <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Message View</h5>
          </div>
          <div class="widget-content">';
          echo'<h1>'. $data[$key]["name"].'</h1>';
          echo'<h2>'. $data[$key]["email"].'</h2>';
          echo'<p>'. $data[$key]['subject'].'</p>';
          echo'<p>'.$data[$key]['message'].'</p>';


          echo '</div></div></div></div></div>';
     }
   }elseif(isset($_REQUEST['packs_id'])){
        $mess_id = escape($_REQUEST['packs_id']);
      $data = $user->getData_one('packs','packs_id', $mess_id);
      foreach ($data as $key => $value){
            echo '<div id="content-header">';
    echo '<div id="breadcrumb"></div><h1>Message view</h1>'; 
    echo '</div>';
    echo '  <div class="container-fluid"><hr>
    <div class="row-fluid">
     <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Message View</h5>
          </div>
          <div class="widget-content">';
          echo'<h1>'. $data[$key]["title"].'</h1>';
          echo'<h2>'. $data[$key]["description"].'</h2>';
          echo'<p>'. $data[$key]['new_rate'].'</p>';
          echo'<p>'.$data[$key]['old_rate'].'</p>';
          echo'<p>'. $data[$key]['category'].'</p>';
          echo'<p>'.$data[$key]['created_at'].'</p>';
          echo '<img src="../uploads/'. $data[$key]['picture'].'" width="300" height="300">';
          echo '</div></div></div></div></div>';
     }
   }elseif(isset($_REQUEST['service_id'])){
        $mess_id = escape($_REQUEST['service_id']);
      $data = $user->getData_one('service','service_id', $mess_id);
      foreach ($data as $key => $value){
            echo '<div id="content-header">';
    echo '<div id="breadcrumb"></div><h1>Message view</h1>'; 
    echo '</div>';
    echo '  <div class="container-fluid"><hr>
    <div class="row-fluid">
     <div class="span2"></div>
      <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Message View</h5>
          </div>
          <div class="widget-content">';
          echo'<h1>'. $data[$key]["title"].'</h1>';
          echo'<h2>'. $data[$key]["description"].'</h2>';
          echo'<p>'. $data[$key]['new_rate'].'</p>';
          echo'<p>'.$data[$key]['old_rate'].'</p>';
          echo'<p>'. $data[$key]['category'].'</p>';
          echo'<p>'.$data[$key]['created_at'].'</p>';
          echo '<img src="../uploads/'. $data[$key]['picture'].'" width="300" height="300">';
          echo '</div></div></div></div></div>';
     }
   }

   ?>

</div>







<?php
include_once 'tamplate/footer.php';

?>