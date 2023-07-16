<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

session_start(); 
require("../db.php");

if (isset($_POST['user']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['re_password'])) {

    //masukan data
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    //variabel
	$random_number = rand(1000, 9999); // Generates a random number between 1000 and 9999
	$uname = validate($_POST['user']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$email = validate($_POST['email']);
	$user_data = 'user='. $uname. '&email='. $email;
	
    //jika password kosong
	if (empty($uname && $email && $pass)) {
		header("Location: sign.php?errorsignup=Silahkan Lengkapi Form&$user_data ");
	    exit();
	}else if($pass !== $re_pass){
        header("Location: sign.php?errorsignup=password tidak sama&$user_data");
	    exit();
	}else {
        
        //ambil data dari database
	    $sql = "SELECT * FROM user WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

        //jika password ada yang sama
		if (mysqli_num_rows($result) > 0) {
			header("Location: sign.php?errorsignup=email $email  sudah digunakan&$user_data");
	        exit();
		}else {

            //input ke database
            $sql2 = "INSERT INTO otp ( username, email, password, user, otp) VALUES('$uname', '$email', '$pass', 'user', '$random_number')";
            $result2 = mysqli_query($conn, $sql2);
			// $sql3 = "INSERT INTO penulis (email, nama, phone, instansi, jabatan, no_ktp, file_ktp, file_npwp, rekening, kontak_lain, biografi, file_foto) VALUES ('$email', '', '', '', '', '', '', '', '', '', '', '')";
			// $result3 = mysqli_query($conn, $sql3);
			$ceko = "SELECT * FROM otp WHERE email='$email' ORDER BY id_otp DESC LIMIT 1";
			$resceko = mysqli_query($conn, $ceko);
			$idid = mysqli_fetch_array($resceko);
			$idotp = $idid['id_otp'];
            if ($result2) {
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
				$mail->Subject = 'OTP dari Eazypublish';
				$mail->Body    = '<h1>Halo, '.$uname.'.</h1> <p>kode OTP Anda adalah '.'<h2>'.$random_number.'</h2>'.'Silahkan masukan kode OTP ke website eazypublish'.'</p> Atau bisa klik link di bawah</p>'.'<p style="font-style: italic;"> https://www.itbpress.id/eazypublish/otp/index.php?id='.$idotp.'&otp='.$random_number.'</p>'; 

				// $jun = mysqli_fetch_array(mysqli_query($conn, "SELECT bulan, SUM(total) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis' AND bulan = 'Juni' GROUP BY bulan"));

                    if($mail->send())
                    {
                        echo 'Berhasil';
                        header("Location: otp.php?id=$idotp");
                    }
                    else{
                        echo "Mailer Error: {$mail->ErrorInfo}";
                    }
	            exit();
            }else {
	           	header("Location: sign.php?errorsignup=errorsignup&$user_data");
		        exit();
            }
		}
	}
	
}else{
	header("Location: sign.php");
	exit();
}