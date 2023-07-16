<?php

session_start(); 
require("../db.php");

$sqlx = mysqli_query($conn, "SELECT * FROM otp");
$cekx = mysqli_num_rows($sqlx);
if($cekx == 0){
    header("Location: sign.php");
	exit();
}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $text1 = $_POST['test1'];
    $text2 = $_POST['test2'];
    $text3 = $_POST['test3'];
    $text4 = $_POST['test4'];
    $text = $text1.$text2.$text3.$text4;

    $cek = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `otp` WHERE id_otp = '$id' "));
    $otp = $cek['otp'];

    if($otp == $text){
        
        $name = $cek['username'];
        $email = $cek['email'];
        $pass = $cek['password'];
        
        $sqli = "SELECT * FROM user WHERE email='$email' ";
		$resulti = mysqli_query($conn, $sqli);

		if (mysqli_num_rows($resulti) > 0) {
			header("Location: sign.php?signinemail=$email");
	        exit();
		}

        $sql = "INSERT INTO user ( username, email, password, user) VALUES('$name', '$email', '$pass', 'user')";
        $result = mysqli_query($conn, $sql);
        $sqls = "INSERT INTO penulis (email, nama, phone, instansi, jabatan, no_ktp, file_ktp, file_npwp, rekening, kontak_lain, biografi, file_foto) VALUES ('$email', '', '', '', '', '', '', '', '', '', '', 'noimage.png')";
        $results = mysqli_query($conn, $sqls);

        $cekemail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'"));
        $ids = $cekemail['id_user'];

        mysqli_query($conn, "DELETE FROM otp WHERE email = '$email'" );

        $_SESSION['id_user'] = $ids;
        header("Location: ../dashboard/");
        exit();

    } else {
        header("Location: otp.php?id=$id&error=sans");
        exit();
    }

}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

    $id = $_GET['id'];

    $mail = new PHPMailer(true);

    $isi = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM otp WHERE id_otp='$id'"));
    $email = $isi['email'];
    $uname = $isi['username'];
    $random_number = $isi['otp'];

    $mail->isSMTP();                                   
    $mail->Host       = 'mail.itbpress.id';                  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'eazypublish@itbpress.id';                   
    $mail->Password   = '1q2wED!@098,;';     
    $mail->Port       = 587;  
 
    $mail->setFrom('eazypublish@itbpress.id', 'EazyPublish');
    $mail->addAddress($email, $uname); 
    $mail->addReplyTo('eazypublish@itbpress.id', 'EazyPublish');

    $mail->isHTML(true);  
    $mail->Subject = 'OTP dari Eazypublish';
    $mail->Body    = '<h1>Halo, '.$uname.'.</h1> <p>kode OTP Anda adalah '.'<h2>'.$random_number.'</h2>'.'Silahkan masukan kode OTP ke website eazypublish'.'</p> Atau bisa klik link di bawah</p>'.'<p style="font-style: italic;"> https://www.itbpress.id/eazypublish/otp/index.php?id='.$id.'&otp='.$random_number.'</p>'; 
    
    if($mail->send())
    {
        echo 'Konfirmasi pembayaran telah berhasil';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    header("Location: otp.php?id=$id&sans=error");

?>