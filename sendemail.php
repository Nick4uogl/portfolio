<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->IsHTML(true);

$mail->setFrom($_POST['mail']);
$mail->addAddress('kolianpylupc@gmail.com');
$mail->Subject = 'Message to your portfolio';
$mail->Body = $_POST['text'];

if(trim(!empty($_POST['name']))) {
    $body.='<p><strong>Name: </strong> '.$_POST['name'].'</p>';
}

if(trim(!empty($_POST['email']))) {
    $body.='<p><strong>E-mail: </strong> '.$_POST['email'].'</p>';
}

if(trim(!empty($_POST['text']))) {
    $body.='<p><strong>Message: </strong> '.$_POST['text'].'</p>';
}

if(!mail->send()) {
    $message = 'Error';
} else {
    $message = 'Data sent';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>

