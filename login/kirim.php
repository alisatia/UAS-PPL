<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['submit']))
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                   
    $mail->Host       = 'mail.itbpress.id';                  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'eazypublish@itbpress.id';                   
    $mail->Password   = '1q2wED!@098,;';     
    $mail->Port       = 587;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->setFrom('eazypublish@itbpress.id', 'EazyPublish');
    $mail->addAddress($email, $uname); 
    $mail->addReplyTo('eazypublish@itbpress.id', 'EazyPublish');

    $mail->isHTML(true);  
    $mail->Subject = 'OTP dari Eazypublish';
    $mail->Body    = '<h1>Halo, '.$uname.'.</h1> <p>kode OTP Anda adalah '.'<h2>'.$random_number.'</h2>'.'Silahkan masukan kode OTP ke website eazypublish'.'</p> '; 
    
    if($mail->send())
    {
        echo 'Konfirmasi pembayaran telah berhasil';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    echo "kirim ulang gagal";
}
