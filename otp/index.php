<?php

session_start(); 
require("../db.php");

$sqlx = mysqli_query($conn, "SELECT * FROM otp");
$cekx = mysqli_num_rows($sqlx);
if($cekx == 0){
    header("Location: ../sign.php");
	exit();
}
    $id = $_GET['id'];
    $text = $_GET['otp'];

    $cek = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM otp WHERE id_otp = '$id'"));
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
        $sqls = "INSERT INTO penulis (email, nama, phone, instansi, jabatan, no_ktp, file_ktp, file_npwp, rekening, kontak_lain, biografi, file_foto) VALUES ('$email', '', '', '', '', '', '', '', '', '', '', '')";
        $results = mysqli_query($conn, $sqls);

        $cekemail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'"));
        $ids = $cekemail['id_user'];

        mysqli_query($conn, "DELETE FROM otp WHERE email = '$email'" );

        $_SESSION['id_user'] = $ids;
        header("Location: ../dashboard/");
        exit();

    } else {
        header("Location: ../otp.php?id=$id&error=sans");
        exit();
    }

?>