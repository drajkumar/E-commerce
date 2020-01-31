<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$cart = new Cart();


  $id = $_POST['pid'];
 $q = $_POST['quantity'];

 if(isset($_POST['size'])){
   $size = $_POST['size'];
 }else{
 	$size = 'No Size';
 }

 if(isset($_POST['color'])){
    $color  = $_POST['color'];
 }else{
 	$color = 'No Color';
 }

 $procode = $_POST['procode'];
 $subprice = $_POST['subtotal'];
 $subtotal = $subprice * $q;
  $cart->addItem($id, $q, $size, $color, $subtotal, $procode);
  echo 'Item is added your cart';

 


 ?>