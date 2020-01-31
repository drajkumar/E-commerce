<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}
 
  if(!empty($_REQUEST['product'])){
  	 $pid = $_REQUEST['product'];

  	$remove = $user->remove('product', 'product_id', $pid);
       $user->remove('product_gelary', 'product_id', $pid);
       $user->remove('product_option', 'option_product_id', $pid);
  	if($remove){
     echo "Product Deleted Successfully ...";
  	}
  }elseif(!empty($_REQUEST['chata'])){
     $pid1 = $_REQUEST['chata'];
     $remove1 = $user->remove('product_catagori', 'chata_id', $pid1);
     if($remove1){
       echo "Chatagori Deleted Successfully ...";
     }
  }elseif(!empty($_REQUEST['chata'])){
     $pid1 = $_REQUEST['chata'];
     $remove1 = $user->remove('product_catagori', 'chata_id', $pid1);
     if($remove1){
       echo "Chatagori Deleted Successfully ...";
     }
  }elseif(!empty($_REQUEST['user'])){
     $uid = $_REQUEST['user'];
     $remove2 = $user->remove('register', 'register_id', $uid);
     if($remove2){
       echo "Register User Deleted Successfully ...";
     }
  }elseif(!empty($_REQUEST['order'])){
     $rid = $_REQUEST['order'];
     $remove3 = $user->remove('product_order', 'order_id', $rid);
     if($remove3){
       echo "Order item Deleted Successfully ...";
     }
  }elseif(!empty($_REQUEST['post'])){
     $rid = $_REQUEST['post'];
     $remove4 = $user->remove('blog', 'blog_id', $rid);
     if($remove4){
       echo "Post Deleted Successfully ...";
     }
  }elseif(!empty($_REQUEST['packes'])){
     $rid = $_REQUEST['packes'];
     $remove5 = $user->remove('packs', 'packs_id', $rid);
     if($remove5){
       echo "Packes Deleted Successfully ...";
     }
  }elseif(!empty($_REQUEST['service'])){
     $rid = $_REQUEST['service'];
     $remove6 = $user->remove('service', 'service_id', $rid);
     if($remove6){
       echo "Service Deleted Successfully ...";
     }
  }elseif(!empty($_REQUEST['comment'])){
     $rid = $_REQUEST['comment'];
     $remove7 = $user->remove('comment', 'comment_id', $rid);
     if($remove7){
       echo "Comment Deleted Successfully ...";
     }
  }elseif(!empty($_REQUEST['message'])){
     $rid = $_REQUEST['message'];
     $remove8 = $user->remove('contactus', 'id', $rid);
     if($remove8){
       echo "Message Deleted Successfully ...";
     }
  }

?>
