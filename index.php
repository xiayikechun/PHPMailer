<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$MailArray["Host"]=$_REQUEST['host'];
$MailArray["Fxyx"]=$_REQUEST['fxyx'];
$MailArray["Fxyxmm"]=$_REQUEST['fxyxmm'];
$MailArray["Fxrmc"]=$_REQUEST['fxrmc'];
$MailArray["Sxyx"]=$_REQUEST['sxyx'];
$MailArray["Yjzt"]=$_REQUEST['yjzt'];
$MailArray["Yjnr"]=$_REQUEST['yjnr'];


require 'PHPMailer/PHPMailer.php';
require  'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = $MailArray["Host"];
    $mail->Port = 465;

    $mail->Username = $MailArray["Fxyx"];
    $mail->Password = $MailArray["Fxyxmm"];
    $mail->setFrom($mail->Username, $MailArray["Fxrmc"]);

    $mail->addAddress($MailArray["Sxyx"]);

    $mail->addAttachment('1.zip');//附件
    $mail->addAttachment('1.jpg');//图片

    $mail->isHTML(true);
    $mail->Subject = $MailArray["Yjzt"];
    $mail->Body = $MailArray["Yjnr"];
    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}