<?php

$content = "<img src='http://yoenvio.synology.me/img/email_driver'>";

require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

try {
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
    ));
    $mail->isSMTP();
    $mail->Host = 'mail.yoenvio.com.mx';
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@yoenvio.com.mx';
    $mail->Password = '@Nila12240499';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('no-reply@yoenvio.com', 'Yoenvío');
    $mail->addAddress('nilablackdead@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Gracias por registrarte en Yoenvío';
    $mail->Body = $content;
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}