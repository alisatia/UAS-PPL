<?php
//database
require("db.php");

// koneksi ke database
// database user
$penulis = $_SESSION['id_user'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user= '$penulis'");
$dbuser = mysqli_fetch_array($result);

// databse penulis
$email = $dbuser['email'];
$datapenulis = mysqli_query($conn, "SELECT * FROM penulis WHERE email= '$email'");
$dbpenulis = mysqli_fetch_array($datapenulis);

// database buku
$idpenulis = $dbpenulis['id_penulis'];
$dbnbuku = mysqli_query($conn, "SELECT * FROM buku WHERE id_penulis = '$idpenulis'");
$dbstatus = mysqli_query($conn, "SELECT * FROM buku WHERE id_penulis = '$idpenulis' ORDER BY id_buku DESC");
$dbprogres = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku WHERE id_penulis = '$idpenulis' ORDER BY id_buku DESC LIMIT 1"));
$lasto = mysqli_query($conn, "SELECT * FROM buku WHERE id_penulis = '$idpenulis' ORDER BY id_buku DESC LIMIT 2 ");
$barStatus = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku WHERE id_penulis = '$idpenulis' ORDER BY id_buku DESC LIMIT 1"));
$riviu = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS riviu FROM buku WHERE id_penulis = '$idpenulis' AND status = 'Review'"));
$proses = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS riviu FROM buku WHERE id_penulis = '$idpenulis' AND NOT status = 'Review' AND NOT status = 'Publish' AND NOT status = 'Rejected'"));
$selesai = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS riviu FROM buku WHERE id_penulis = '$idpenulis' AND status = 'Publish'"));
$tolak = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS riviu FROM buku WHERE id_penulis = '$idpenulis' AND status = 'Rejected'"));
$serah = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS riviu FROM buku WHERE id_penulis = '$idpenulis'"));
$katekate = mysqli_query($conn, "SELECT * FROM buku WHERE id_penulis = '$idpenulis' AND status = 'Publish' ORDER BY created ASC");

//database riwayat naskah
$dbstatuss = mysqli_query($conn, "SELECT * FROM riwayat_naskah WHERE id_penulis = '$idpenulis' GROUP BY id_buku ORDER BY id_buku DESC");

//database buku done
$dbbukudone = mysqli_query($conn, "SELECT * FROM buku_done WHERE id_penulis = '$idpenulis' LIMIT 10");

//database kategori
$kate = mysqli_query($conn, "SELECT * FROM kategori ORDER BY kategori ASC");

//database hpp
$cover = mysqli_query($conn, "SELECT * FROM pilihan WHERE kategori = 'cover'");
$isi = mysqli_query($conn, "SELECT * FROM pilihan WHERE kategori = 'isi'");

//database grafik

//kota
$kota = mysqli_query($conn, "SELECT kota, SUM(qty) AS qty FROM `penjualan` WHERE id_penulis = '$idpenulis' GROUP BY kota ORDER BY qty DESC LIMIT 5");
$kotas = mysqli_query($conn, "SELECT kota, SUM(qty) AS qty FROM `penjualan` WHERE id_penulis = '$idpenulis' GROUP BY kota ORDER BY qty DESC LIMIT 5");

//buku
$jual = mysqli_query($conn, "SELECT id_buku, judul, SUM(qty) AS qty FROM `penjualan` WHERE id_penulis = '$idpenulis' GROUP BY id_buku ORDER BY qty DESC LIMIT 5");
$juals = mysqli_query($conn, "SELECT id_buku, judul, SUM(qty) AS qty FROM `penjualan` WHERE id_penulis = '$idpenulis' GROUP BY id_buku ORDER BY qty DESC LIMIT 5");

//online
$online = mysqli_query($conn, "SELECT media, SUM(total) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis' GROUP BY media ASC");

//royalti
$jan = mysqli_fetch_array(mysqli_query($conn, "SELECT bulan, SUM(royalti) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis' AND bulan = 'Januari' GROUP BY bulan"));
$feb = mysqli_fetch_array(mysqli_query($conn, "SELECT bulan, SUM(royalti) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis' AND bulan = 'Februari' GROUP BY bulan"));
$mar = mysqli_fetch_array(mysqli_query($conn, "SELECT bulan, SUM(royalti) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis' AND bulan = 'Maret' GROUP BY bulan"));
$apr = mysqli_fetch_array(mysqli_query($conn, "SELECT bulan, SUM(royalti) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis' AND bulan = 'April' GROUP BY bulan"));
$mei = mysqli_fetch_array(mysqli_query($conn, "SELECT bulan, SUM(royalti) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis' AND bulan = 'Mei' GROUP BY bulan"));
$jun = mysqli_fetch_array(mysqli_query($conn, "SELECT bulan, SUM(royalti) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis' AND bulan = 'Juni' GROUP BY bulan"));

$totRoyaltis = mysqli_fetch_array(mysqli_query($conn, "SELECT bulan, SUM(royalti) AS total FROM `penjualan` WHERE id_penulis = '$idpenulis'"));

//link
$meetvalue = mysqli_query($conn, "SELECT * FROM link WHERE id_penulis = '$idpenulis' GROUP BY id_buku DESC");
$disini = mysqli_query($conn, "SELECT * FROM link WHERE id_penulis = '$idpenulis' GROUP BY id_buku DESC");

//confirm
$dbConfirm = mysqli_query($conn, "SELECT * FROM buku WHERE id_penulis = '$idpenulis' ORDER BY id_buku DESC ");

// $jan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `testing` WHERE YEAR(tanggal) = '2023' AND MONTH(tanggal) = 5"));
?>
