<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

require('../../db.php');

$idBuku = $_POST['idBuku'];
$buku = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$idBuku'"));
$idPenulis = $buku['id_penulis'];
$penulis = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM penulis WHERE id_penulis = '$idPenulis'"));
$email = $penulis['email'];

if(isset($_POST['submitBuku'])) {
    $submit = $_POST['submitBuku'];
    $judul = $buku['judul'];
    $penulis = $buku['penulis'];
    $penulisSemua = $buku['penulis_lainnya'];
    $kategori = $buku['kategori'];
    $isbn = $buku['isbn'];
    $eisbn = $buku['e_isbn'];
    $royalty = $buku['royalti'];
    $file = $buku['naskah'];
    $link = $buku['link'];

    header("Location: ../?0aSn=$submit&1aSn=$penulis&2aSn=$judul&3aSn=$penulisSemua&4aSn=$kategori&5aSn=$isbn&6aSn=$eisbn&7aSn=$file&8aSn=$link&9aSn=$royalty");
    exit();
}

if(isset($_POST['submitPenulis'])) {
    $submit = $_POST['submitPenulis'];
    $nama = $penulis['nama'];
    $phone = $penulis['phone'];
    $instansi = $penulis['instansi'];
    $jabatan = $penulis['jabatan'];
    $kontak = $penulis['kontak_lain'];
    $biografi = $penulis['biografi'];
    $foto = $penulis['file_foto'];

    // header("Location: ../?0aSn=$submit&7aSn=$biografi&1aSn=$nama&2aSn=$phone&3aSn=$instansi&4aSn=$jabatan&5aSn=$kontak&6aSn=$foto");
    header("Location: ../?0aSn=$submit&1aSn=$nama&2aSn=$phone&3aSn=$instansi&4aSn=$jabatan&5aSn=$kontak&6aSn=$foto");
    exit();
}

if(isset($_POST['submitProgres'])) {
    $submit = $_POST['submitProgres'];
    $judul = $buku['judul'];
    $penulis = $buku['penulis'];
    $penulisSemua = $buku['penulis_lainnya'];
    $kategori = $buku['kategori'];
    $isbn = $buku['isbn'];
    $eisbn = $buku['e_isbn'];
    $royalty = $buku['royalti'];
    $file = $buku['naskah'];
    $link = $buku['link'];
    $status = $buku['status'];

    header("Location: ../?sta=$status&0aSn=$submit&1aSn=$idBuku&2aSn=$idPenulis&3aSn=$judul&4aSn=$file&5aSn=$link");
    exit();
}

if(isset($_POST['submitBayar'])) {
    $judul = $buku['judul'];
    $penulis = $buku['penulis'];
    mysqli_query($conn, "UPDATE buku SET pembayaran = 'lunas' WHERE id_buku = '$idBuku'");
    mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'Pembayaran Berhasil', '$idBuku', '$idPenulis') ");
    header("Location: ../");
    exit();
}

if(isset($_POST['submitSelesai'])) {
    $submit = $_POST['submitSelesai'];
    $judul = $buku['judul'];
    $penulis = $buku['penulis'];
    switch ($submit){
        case "review":
            $update = mysqli_query($conn, "UPDATE buku SET status = 'Confirm' WHERE id_buku = '$idBuku'");
            $riwayat = mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'Confirm', '$idBuku', '$idPenulis') ");
            $cek = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM link WHERE id_buku = '$idBuku'"));
            if(empty($cek['id_meet'])) {
                $up = mysqli_query($conn, "INSERT INTO link (tanggal, jam, link, id_buku, id_penulis, mou_draft) VALUE (NULL, NULL, '', '$idBuku', '$idPenulis', 'kosong') ");
            }
            $pesan = "sudah kami konfirmasi";
            kirimEmail($email, $penulis, $pesan, $judul);
            header("Location: ../");
            exit();
        break;
        case "confirm":
            $update = mysqli_query($conn, "UPDATE buku SET status = 'Meet' WHERE id_buku = '$idBuku'");
            $riwayat = mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'Meet', '$idBuku', '$idPenulis') ");
            $pesan = "sangat bagus, untuk selanjutnya silakan masuk zoom yang sudah kami cantumkan pada fitur status";
            kirimEmail($email, $penulis, $pesan, $judul);
            header("Location: ../");
            exit();
        break;
        case "meet":
            $update = mysqli_query($conn, "UPDATE buku SET status = 'MoU' WHERE id_buku = '$idBuku'");
            $riwayat = mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'MoU', '$idBuku', '$idPenulis') ");
            $pesan = "tinggal Anda unggah MoU yang sudah ditanda tangani";
            kirimEmail($email, $penulis, $pesan, $judul);
            header("Location: ../");
            exit();
        break;
        case "mou":
            $update = mysqli_query($conn, "UPDATE buku SET status = 'Editing & Layouting' WHERE id_buku = '$idBuku'");
            $riwayat = mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'Editing & Layouting', '$idBuku', '$idPenulis') ");
            $pesan = "sedang kami kerjakan untuk diedit dan dilayout";
            kirimEmail($email, $penulis, $pesan, $judul);
            header("Location: ../");
            exit();
        break;
        case "edit":
            $update = mysqli_query($conn, "UPDATE buku SET status = 'Pendaftaran ISBN' WHERE id_buku = '$idBuku'");
            $riwayat = mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'Pendaftaran ISBN', '$idBuku', '$idPenulis') ");
            header("Location: ../");
            exit();
        break;
        case "isbn":
            $update = mysqli_query($conn, "UPDATE buku SET status = 'Produksi' WHERE id_buku = '$idBuku'");
            $riwayat = mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'Produksi', '$idBuku', '$idPenulis') ");
            $pesan = "sudah hampir selesai, sekarang naskah Anda sedang kami produksi,";
            kirimEmail($email, $penulis, $pesan, $judul);
            header("Location: ../");
            exit();
        break;
        case "produksi":
            $update = mysqli_query($conn, "UPDATE buku SET status = 'Publish' WHERE id_buku = '$idBuku'");
            $riwayat = mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'Terbit', '$idBuku', '$idPenulis') ");
            $done = mysqli_query($conn, "INSERT INTO buku_done (judul, penulis, mou, cover, harga, hpp, tahun, halaman, ukuran, bw, fc, status, id_buku, id_penulis) VALUE ('$judul', '$penulis', '', '', '', '', '', '', '', '', '', 'Publish', '$idBuku', '$idPenulis') ");
            $pesan = "sudah selesai,";
            kirimEmail($email, $penulis, $pesan, $judul);
            header("Location: ../");
            exit();
        break;
        default:
    }
}

if(isset($_POST['submitOkeMeet'])){
    $tanggal = $_POST['tanggalMeet'];
    $jam = $_POST['jamMeet'];
    $link = $_POST['linkMeet'];

    $file = $_FILES['fileMeet'];
    $fileName = $_FILES['fileMeet']['name'];
    $fileTmpName = $_FILES['fileMeet']['tmp_name'];
    $fileSize = $_FILES['fileMeet']['size'];
    $fileError = $_FILES['fileMeet']['error'];
    $fileType = $_FILES['fileMeet']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('docx', 'doc', "pdf");
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    $fileDestination = '../../files/mou/'.$fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);

    $update = mysqli_query($conn, "UPDATE link SET tanggal = '$tanggal', jam = '$jam', link = '$link', mou_draft = '$fileNameNew' WHERE id_buku = '$idBuku' ");
    header("Location: ../");
}

if(isset($_POST['submitOkeIsbn'])){
    $isbn = $_POST['isbnBuku'];
    $eisbn = $_POST['eisbnBuku'];

    $update = mysqli_query($conn, "UPDATE buku SET isbn = '$isbn', e_isbn = '$eisbn' WHERE id_buku = '$idBuku' ");
    header("Location: ../");
}


if(isset($_POST['submitTolak'])) {
    $submit = $_POST['submitTolak'];
    $judul = $buku['judul'];
    $penulis = $buku['penulis'];

    $update = mysqli_query($conn, "UPDATE buku SET status = 'Rejected' WHERE id_buku = '$idBuku'");
    $riwayat = mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judul', 'Naskah ditolak', '$idBuku', '$idPenulis') ");
    $pesan = "telah kami tolak dengan beberapa pertimbangan";
    kirimEmail($email, $penulis, $pesan, $judul);
    header("Location: ../");
}

function kirimEmail($email, $penulis, $pesan, $judul) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                   
    $mail->Host       = 'mail.itbpress.id';                  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'eazypublish@itbpress.id';                   
    $mail->Password   = '1q2wED!@098,;';     
    $mail->Port       = 587;  

    $mail->setFrom('eazypublish@itbpress.id', 'EazyPublish');
    $mail->addAddress($email, $penulis);
    $mail->addReplyTo('eazypublish@itbpress.id', 'EazyPublish');

    $mail->isHTML(true);  
    $mail->Subject = 'Update Naskah Eazypublish';
    $mail->Body    = 'Halo, Naskah Anda dengan judul: '.$judul.', '.$pesan.' silakan cek di https://itbpress.id/eazypublish/?status';
		
	if($mail->send())
	{
		echo 'Konfirmasi pembayaran telah berhasil';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>