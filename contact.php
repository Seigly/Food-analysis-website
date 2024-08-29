<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';

require 'phpmailer/src/PHPMailer.php';

require 'phpmailer/src/SMTP.php';

$sub=$_POST['subject'];
$email=$_POST['email'];
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
    $mail->Subject = $sub;
    $mail->Body    = 'Your complaint has been noted.We will get to you soon.';

    $mail->send();
    ?>

    <script>
        alert("complaint sent");
         window.location.href = 'prove.php';
    </script>
    <?php
} 
catch (Exception $e) {
    ?>

    <script>
        alert("Problem occured.submit the query again");
        window.location.href = 'exp1.php';
    </script>
    <?php
}


?>