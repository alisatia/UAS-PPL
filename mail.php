<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();                                   
    $mail->Host       = 'mail.itbpress.id';                  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'eazypublish@itbpress.id';                   
    $mail->Password   = '1q2wED!@098,;';     
    $mail->Port       = 587;  
 
    $mail->setFrom('eazypublish@itbpress.id', 'EazyPublish');
    $mail->addAddress('ahmadalisatia999@gmail.com', 'Ali'); 
    $mail->addReplyTo('eazypublish@itbpress.id', 'EazyPublish');

    $mail->isHTML(true);  
    $mail->Subject = 'OTP dari Eazypublish';
    $mail->Body    = 'Hallo'; 
    
    if($mail->send())
    {
        echo 'Berhasil';
    }
    else{
        echo "Mailer Error: {$mail->ErrorInfo}";
    }

?>