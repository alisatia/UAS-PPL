<?php

require('../../db.php');

if(isset($_POST['simpan'])){  
    $buku = $_POST['produk'];
    $harga = $_POST['hargaBuku'];
    $diskon = $_POST['percentinput'];

    preg_match("/\[(.*?)\]/", $buku, $match);
    $kode = $match[1];
    $dbbuku = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku_done WHERE kode_buku = '$kode'"));

    $idBuku = $dbbuku['id_buku'];
    $judul = $dbbuku['judul'];
    $qty = $_POST['qtyBaru'];
    $total = $_POST['totalBaru'];
    $kota = $_POST['kota'];
    $media = $_POST['media'];
    $tanggal = $_POST['tanggal'];

    $minimalRoyalti = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(qty) AS qty FROM penjualan WHERE id_buku = '$idBuku'"));
    $totalQty = $minimalRoyalti['qty'];

    if(($totalQty + $qty) <= 100){
        $royalti = ($harga * $qty) * (5/100);
    } else {
        $royalti = ($harga * $qty) * (10/100);
    }

    $konsumen = $_POST['konsumen'];
    $idPenulis = $dbbuku['id_penulis'];
    $idAdmin = 1;

    mysqli_query($conn, "INSERT INTO `penjualan`(`id_buku`, `kode_buku`, `judul`, `harga`, `qty`, `total`, `kota`, `media`, `bulan`, `royalti`, `konsumen`, `diskon`, `id_penulis`, `id_admin`) VALUES ('$idBuku', '$kode', '$judul', '$harga', '$qty', '$total', '$kota', '$media', '$tanggal', '$royalti', '$konsumen', '$diskon', '$idPenulis', '$idAdmin')");
     
    header("Location: ../");
    exit();
} else {
    header("Location: ../");
}