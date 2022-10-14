<?php
#!! IMPORTANT: 
#!! this file is just an example, it doesn't incorporate any security checks and 
#!! is not recommended to be used in production environment as it is. Be sure to 
#!! revise it and customize to your needs.
# die("Make sure that you enable some form of authentication before removing this line.");

require_once("handler-php/PluploadHandler.php");

$inspection_id = $_GET["id"];
$inspection_type = $_GET["type"];
$upload_type = $_GET["upload"];

$ph = new PluploadHandler(array(
	'target_dir' => 'uploads/' . $inspection_id . '/' . $inspection_type . '/' . $upload_type . '/',
	'allow_extensions' => 'jpg,jpeg,png,mp4'
));

$ph->sendNoCacheHeaders();
$ph->sendCORSHeaders();

// var_dump($ph->handleUpload());

if ($result = $ph->handleUpload()) {
	die(json_encode(array(
		'OK' => 1,
		'info' => $result
	)));
} else {
	die(json_encode(array(
		'OK' => 0,
		'error' => array(
			'code' => $ph->getErrorCode(),
			'message' => $ph->getErrorMessage()
		)
	)));
}