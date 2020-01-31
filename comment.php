<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();

$blogid = $_POST['blogid'];
$comment = $_POST['comment'];
$name = $_POST['name'];
$email = $_POST['email'];
$website = $_POST['website'];

 $data = array(
	'blog_id'=> $blogid,
	'comment' => $comment,
    'name'    => $name,
	'email' => $email,
    'website' => $website,
	'created_at' => date('d:m:y')
		);
$user->create_all('comment', $data);

echo 'Comment seccessfully post';





?>