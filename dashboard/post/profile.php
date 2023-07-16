<?php
session_start();
if( isset($_SESSION["id_user"]) ) {
    $id_user = $_SESSION['id_user'];
}else {
    $id_user = "anonim";
}
require('../../conn.php');

if(isset($_POST['profileId'])){
    $profileId = $_POST['profileId'];
    $profilePenulis = $_POST['profilePenulis'];
    $profileKontak = $_POST['profileKontak'];
    $profileInstansi = $_POST['profileInstansi'];
    $profileJabatan = $_POST['profileJabatan'];
    $profileKontakLain = $_POST['profileKontakLain'];
    $profileBiografi = $_POST['profileBiografi'];

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('png', 'jpg', 'jpeg');

    $fileNameNew = uniqid('', true).".".$fileActualExt;
    $fileDestination = '../../files/'.$fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);

    if(empty($fileName)) {
        mysqli_query($conn, "UPDATE penulis SET nama = '$profilePenulis', phone = '$profileKontak', instansi = '$profileInstansi', jabatan = '$profileJabatan', kontak_lain = '$profileKontakLain', biografi = '$profileBiografi' WHERE id_penulis = '$profileId'");
    } else {
        mysqli_query($conn, "UPDATE penulis SET nama = '$profilePenulis', phone = '$profileKontak', instansi = '$profileInstansi', jabatan = '$profileJabatan', kontak_lain = '$profileKontakLain', biografi = '$profileBiografi', file_foto = '$fileNameNew' WHERE id_penulis = '$profileId'");
    }

    // header("Location: index.php?profile=true");
    echo "<script>window.location.href = '../?profile=true'</script>";
    exit();
}

?>