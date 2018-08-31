<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/PHPMailer.php';
require  'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.exmail.qq.com';
    $mail->Port = 465;

    $mail->Username = '发信邮箱';
    $mail->Password = '发信邮箱密码';
    $mail->setFrom($mail->Username, '发件人名称');

    $mail->addAddress('收信邮箱');

    $mail->addAttachment('1.zip');//附件
    $mail->addAttachment('1.jpg');//图片

    $mail->isHTML(true);
    $mail->Subject = '邮件标题';
    $mail->Body = '<h1>邮件内容</h1>';
    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}