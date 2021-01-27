<?php
$configs = include('config.php');

$errorMSG = '';

if (empty($_POST['name'])) {
	$errorMSG = 'Name is required ';
} else {
	$name = $_POST['name'];
}
if (empty($_POST['email'])) {
	$errorMSG .= 'Email is required ';
} else {
	$email = $_POST['email'];
}
if (empty($_POST['tel'])) {
	$errorMSG .= 'Phone number is required ';
} else {
	$tel = $_POST['tel'];
}
$EmailTo = $configs['emailto'];
$Subject = $configs['subject'];
$Body .= 'Name: ' . $name . '\n';
$Body .= 'Email: ' . $email . '\n';
$Body .= 'Phone: ' . $tel . '\n';

$success = mail($EmailTo, $Subject, $Body, 'From:'.$email);

if ($success && $errorMSG == ''){
	echo 'success';
}else{
	if($errorMSG == ''){
		echo $configs['error'];
	} else {
		echo $errorMSG;
	}
}
