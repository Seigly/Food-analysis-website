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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #666;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Contact Me</h1>
        <p>Feel free to contact us and we will get back to you as soon as we can.</p>
        <form action="contact.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" required>
            <label for="message">Message:</label>
            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
            <input type="submit" value="Send">
        </form>
    </div>

</body>
</html>
