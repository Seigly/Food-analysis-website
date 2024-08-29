<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';

require 'phpmailer/src/PHPMailer.php';

require 'phpmailer/src/SMTP.php';


$email='sridhanalakshmi.s@ptuniv.edu.in';
$mail = new PHPMailer(true);
try {
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dhanamsri1975@gmail.com'; 
    $mail->Password = 'chggenowdduksmky'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    
    $mail->setFrom('dhanamsri1975@gmail.com', 'proven (complaint noted).');
    $mail->addAddress($email);

    
    $mail->isHTML(true);
    $mail->Subject = 'Test Mail';
    $mail->Body    = 'This is a test email sent from PHP script.';

    $mail->send();
    echo 'Message has been sent';
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


