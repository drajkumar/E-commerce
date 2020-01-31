<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$cart = new Cart();


 $data = $cart->getItem();
 $count = @count($data);
  if($count == 0){
    echo '0';
	}else{
		$allq = 0;
     foreach ($data as $key => $value) {
	 $allq += $value['quantity'];
	//return $subq;
  }
  if($allq == 0){
   echo '';
  }else{
  	echo $allq;
  }
}




 //$count = @count($data);



?>