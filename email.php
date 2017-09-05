<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$msg = $_POST["msg"];
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'laainediimer@gmail.com';                 // SMTP username
    $mail->Password = '';                           // SMTP password   
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('leonarmaier@gmail.com','leonardo');   // Add a recipient
    $mail->addAddress('laainediimer@gmail.com','laine');               // Name is optional

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $msg;
    $mail->AltBody = $msg;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}