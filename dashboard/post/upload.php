<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('vendor/autoload.php');
require('../../conn.php');

$postpenulis = $_POST['uppns'];
$postkontak = $_POST['upknt'];
if($_POST['upjdl'] == ""){
    $postjudul = "Tidak ada Judul";
} else {
    $postjudul = $_POST['upjdl'];
}
if($_POST['upkate'] == "Lainnya"){
    $postkategori = $_POST['upoth'];
} else {
    $postkategori = $_POST['upkate'];
}

if(isset($_POST['upktn'])) {
    $postpenn = $_POST['upktn'];
    $posttambah = $postpenulis.", ".$postpenn;
} else {
    $posttambah = $postpenulis;
}

$postlink = $_POST['link'];

$file = $_FILES['file'];
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('docx', 'doc');

if(isset($_POST['cheisbn']) && $_POST['cheisbn'] == 'yes') {
    $eisbn = "yes";
} else {
    $eisbn = "no";
}
if(isset($_POST['chisbn']) && $_POST['chisbn'] == 'yes') {
    $isbn = "yes";
} else {
    $isbn = "no";
}
if(isset($_POST['chroyalti']) && $_POST['chroyalti'] == 'yes') {
    $royalti = "yes";
} else {
    $royalti = "no";
}

$fileNameNew = uniqid('', true).".".$fileActualExt;
$fileDestination = '../../files/naskah/'.$fileNameNew;
move_uploaded_file($fileTmpName, $fileDestination);

$upload = mysqli_query($conn, "INSERT INTO buku (judul, kategori, penulis, naskah, sinopsis, isbn, e_isbn, royalti, status, penulis_lainnya, link, id_penulis) VALUE ('$postjudul', '$postkategori', '$postpenulis', '$fileNameNew', '', '$isbn', '$eisbn', '$royalti', 'Review', '$posttambah', '$postlink', '$idpenulis')");
$upupdate = mysqli_query($conn, "UPDATE penulis SET nama = '$postpenulis', phone = '$postkontak' WHERE email = '$email'");

$idBuku = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku WHERE id_penulis = '$idpenulis' ORDER BY id_buku DESC LIMIT 1"));
$idBukunya = $idBuku['id_buku'];

mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$postjudul', 'Naskah diunggah', '$idBukunya', '$idpenulis') ");
mysqli_query($conn, "INSERT INTO link (tanggal, jam, link, id_buku, id_penulis, mou_draft) VALUE (NULL, NULL, '', '$idBukunya', '$idpenulis', 'kosong') ");

function kirimEmail($test1, $test2) {
    // $email = "rinalestari2012@gmail.com";
    $email = 'ahmadalisatia999@gmail.com';
    $name = 'Rina';

    $mail = new PHPMailer(true);

    $mail->isSMTP();                                   
    $mail->Host       = 'mail.itbpress.id';                  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'eazypublish@itbpress.id';                   
    $mail->Password   = '1q2wED!@098,;';     
    $mail->Port       = 587;  

    $mail->setFrom('eazypublish@itbpress.id', 'EazyPublish');
    $mail->addAddress($email, $name); 
    $mail->addReplyTo('eazypublish@itbpress.id', 'EazyPublish');

    $mail->isHTML(true);  
    $mail->Subject = 'Naskah Baru Eazypublish';
    $mail->Body    = 'Ada nasah baru: '.$test1.', dari '.$test2.' cek link berikut: https://itbpress.id/eazypublish/HdrtRarh2zXC5cXugtSZ/'; 
    if($mail->send()) {
        echo 'Berhasil';
        echo "<script> window.location.href = '../?status=review' </script>";
        exit();
    }
    else {
        echo "Mailer Error: {$mail->ErrorInfo}";
        echo "<script> window.location.href = '../?status=review' </script>";
        exit();
    }
	
}

kirimEmail($postjudul, $postpenulis);

// header("Location: index.php?status=review");

?>