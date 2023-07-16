<?php

use PHPMailer\PHPMailer\PHPMailer;
require '../../db.php';
require '../vendor/autoload.php';

// pengajuan pergantian jadwal meeting dari penulis ==> dikirim ke email penerbit
if(isset($_POST['ajukan'])){
    $idBuku = $_POST['idbuku'];
    $tanggal = $_POST['tglpengajuan'];
    $jam = $_POST['jampengajuan'];
    
    $buku = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = $idBuku"));
    $judulBuku = $buku['judul'];
    $idPenulis = $buku['id_penulis'];
    
    $penulis = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM penulis WHERE id_penulis = $idPenulis"));
    $namaPenulis = $penulis['nama'];
    
    
    function kirimEmail($test1, $test2, $test3, $test4) {
        // $email = "goro4545@gmail.com";
        $email = "ahmadalisatia999@gmail.com";
        $name = "Anggoro";
        
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
        $mail->Subject = 'OTP dari Eazypublish';
        $mail->Body    = 'Pengajuan perpindahan jadwal meeting buku <strong>'.$test1.'</strong>, penulis: <strong>'.$test2.'</strong>. Perpindahan ke tanggal: <strong>'. $test3 .'</strong>, jam: <strong>' . $test4 .'</strong>. Silahkan ubah jadwal di https://itbpress.id/eazypublish/HdrtRarh2zXC5cXugtSZ/'; 
        
        if($mail->send())
        {
            echo 'berhasil';
        }
        else{
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    
    kirimEmail($judulBuku, $namaPenulis, $tanggal, $jam);
    mysqli_query($conn,"INSERT INTO riwayat_naskah (`judul`, `status`, `id_buku`, `id_penulis`) VALUES ('$judulBuku','Pengajuan sudah terkirim','$idBuku','$idPenulis')");
    header("Location: ../?status&pengajuan");
}

?>