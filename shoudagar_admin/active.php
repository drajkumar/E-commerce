<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('login.php');
}

 if($_REQUEST['status_id']){
  $product_id = escape($_REQUEST['status_id']);
   $status = escape($_REQUEST['aprub']);

    $user->update_all('product', 'product_id', $product_id, array(
     'status' => $status
	));

Session::flash('product_publish', 'Product Sucesses Publish');
Redirect::to('product_show.php');
 }elseif($_REQUEST['order_id']){
  $product_id = escape($_REQUEST['order_id']);
   $status = escape($_REQUEST['confrim']);

    $user->update_all('product_order', 'order_id', $product_id, array(
     'status' => $status
	));

Session::flash('confrim_order', 'Order Successfully Comfrim');
Redirect::to('order.php');
 }

?>