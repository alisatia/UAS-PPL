<?php

require('../../db.php');

function resetAngka($angka){
    $angka_asli = str_replace(',', '', $angka);
    $real = intval($angka_asli);
    return $real;
}

if(isset($_POST['update'])){
    $idBuku = $_POST['id'];
    $kode = $_POST['kode'];
    $hpp = $_POST['hpp'];
    $harga = $_POST['harga'];

    $hpp = resetAngka($hpp);
    $harga = resetAngka($harga);

    mysqli_query($conn, "UPDATE buku_done SET kode_buku = '$kode', hpp = '$hpp', harga = '$harga' WHERE id_buku = '$idBuku' ");
    header("Location: ../");
    exit();
} else {
    header("Location: ../");
}