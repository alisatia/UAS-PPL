<?php

require("../db.php");

$idbuku = $_POST['id'];
$qty = $_POST['qty'];
$total = $_POST['total'];
$kota = $_POST['kota'];
$media = $_POST['media'];
$bulan = $_POST['bulan'];

$dbid = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku_done WHERE id_buku = '$idbuku'"));
$judul = $dbid['judul'];
$idpenulis = $dbid['id_penulis'];

$minroy = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(qty) AS qty FROM penjualan WHERE id_buku = '$idbuku'"));
$totqty = $minroy['qty'];

if(($totqty + $qty) <= 100){
    $royalti = $total * (5/100);
} else {
    $royalti = $total * (10/100);
}

$add = mysqli_query($conn, "INSERT INTO penjualan (id_buku, judul, qty, total, kota, media, bulan, royalti, id_penulis, id_admin) VALUE ('$idbuku', '$judul', '$qty', '$total', '$kota', '$media', '$bulan', '$royalti', '$idpenulis', '1' ) ");

header("Location: index.php")
?>