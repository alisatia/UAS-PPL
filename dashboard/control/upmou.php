<?php
session_start();
require("../../iTbpResS.php");

$penulis = $_SESSION['id_user'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user= '$penulis'");
$dbuser = mysqli_fetch_array($result);
$email = $dbuser['email'];
$datapenulis = mysqli_query($conn, "SELECT * FROM penulis WHERE email= '$email'");
$dbpenulis = mysqli_fetch_array($datapenulis);
$idpenulis = $dbpenulis['id_penulis'];

$idBuku = $_POST['idBukunya'];
$dbBuku = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku WHERE id_buku= '$idBuku'"));
$judulBuku = "";

$file = $_FILES['file'];
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('docx', 'doc', 'pdf');

$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mou WHERE id_buku = '$idBuku'"));
if ($cek > 0) {
    // header("Location: index.php?status=review&in=y");
    echo "<script>window.location.href = '../?status=review&in=y'</script>";
    exit();
} else {
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    $fileDestination = '../../files/moubuku/'.$fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);
    $upload = mysqli_query($conn, "INSERT INTO mou (id_buku, file, penulis) VALUE ('$idBuku', '$fileNameNew', '$idpenulis')");
    mysqli_query($conn, "INSERT INTO riwayat_naskah (judul, status, id_buku, id_penulis) VALUE ('$judulBuku', 'MoU diunggah', '$idBuku', '$idPenulis') ");
    // header("Location: index.php?status=review&up=y");
    echo "<script>window.location.href = '../?status=review&up=y'</script>";
    exit();
}
?>