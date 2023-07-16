<?php 
require("../db.php");
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['lupaPass'])){
	$email = $_POST['user'];
	if($email == ""){
		header("Location: sign.php?errorsignin=silahkan isi email");
	} else {
		$dbemail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' "));
		if(empty($dbemail)) {
			header("Location: sign.php?errorsignin=email tidak ditemukan");
		} else {
			$uname = $dbemail['username'];
			$idemail = $dbemail['id_user'];
			$mail = new PHPMailer(true);

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
			$mail->Subject = 'Ganti Password dari Eazypublish';
			$mail->Body    = '<h1>Halo, '.$uname.'.</h1> <p>Untuk mengganti password silakan masuk ke link: https://www.itbpress.id/eazypublish/login/lupa.php?fldsFOFNelfeFDLN='.$idemail; 
			
			if($mail->send())
			{
				echo 'berhasil';
			    header("Location: lupa.php");
			}
			else{
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
	exit();
}

if (isset($_POST['user']) && isset($_POST['pass'])) {

    //validasi data
	function validate($data){
      $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    //variabel data
	$email = validate($_POST['user']);
	$pass = validate($_POST['pass']);

    //jika form kosong
	if (empty($email OR $pass)) {
		header("Location: sign.php?errorsignin=silakan isi email dan password");
	    exit();
	}else if(empty($email)){
        header("Location: sign.php?errorsignin=silahkan isi email");
	    exit();
	}else if(empty($pass)){
        header("Location: sign.php?errorsignin=silahkan isi password&signinemail=$email");
	    exit();
	}else{
        
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
                session_start();
            	$_SESSION['id_user'] = $row['id_user'];
            	echo '<script>window.location.href = "../dashboard/";</script>';
            	echo "berhasil";
		        exit();
            }else{
				header("Location: sign.php?errorsignin=email atau password tidak sesuai&signinemail=$email");
				// echo "salah";
		        exit();
			}
		}else{
			header("Location: sign.php?errorsignin=email dan password tidak sesuai&signinemail=$email");
            // echo "gagal";
	        exit();
		}
	}
	
}else{
	header("Location: sign.php");
	exit();
}