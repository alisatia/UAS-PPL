<?php

require('../iTbpResS.php');

function cekKertasSatu($test){
    switch($test) {
        case "A4 (297 x 210 mm)":
            return "21 cm";
            break;
        case "A5 (210 x 148 mm)":
            return "14,8 cm";
            break;
        case "B5 (250 x 176 mm)":
            return "17,6 cm";
            break;
        default: return "17,6 cm";
    }
}

function cekKertasDua($test){
    switch($test) {
        case "A4 (297 x 210 mm)":
            return "29,7 cm";
            break;
        case "A5 (210 x 148 mm)":
            return "21 cm";
            break;
        case "B5 (250 x 176 mm)":
            return "25 cm";
            break;
        default: return "25 cm";
    }
}

function cekKetebalan($test1, $test2, $test3){
    $total = ($test1 + $test2) / 2;
    if($test3 == "Softcover") {
        $ketebalan = ((106 * $total) + (450 * 2)) / 1000;
        $ketebalan = number_format($ketebalan, 2);
    } else {
        $ketebalan = ((106 * $total) + (900 * 2)) / 1000;
        $ketebalan = number_format($ketebalan, 2);
    }
    return $ketebalan;
}

function cekStatus($test){
    $switch = $test;
    switch($switch) {
        case "Confirm":
            return 15;
            break;
        case "Meet":
            return 30;
            break;
        case "MoU":
            return 45;
            break;
        case "Editing & Layouting":
            return 85;
            break;
        case "Pendaftaran ISBN":
            return 85;
            break;
        case "Produksi":
            return 85;
            break;
        case "Publish":
            return 100;
            break;
        case "Rejected":
            return -100;
            break;
        default:
            return 0;
    }
}

function semester($test1){
    if($test1 == 1){
        return "'"."Januari"."',"."'"."Februari"."',"."'"."Maret"."',"."'"."April"."',"."'"."Mei"."',"."'"."Juni"."',";
    } else {
        return "'"."Juli"."',"."'"."Agustus"."',"."'"."September"."',"."'"."Oktober"."',"."'"."November"."',"."'"."Desember"."',";
    }
}

function tahunSatu($test1, $test2){
    require('../conn.php');
    $id = $dbpenulis['id_penulis'];
    $koma = ",";

    if($test1 == 1) {
        $royJan = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 1"));
        if(empty($royJan['total'])){ $royJan = 0; } else { $royJan = $royJan['total']; };
        $royFeb = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 2"));
        if(empty($royFeb['total'])){ $royFeb = 0; } else { $royFeb = $royFeb['total']; };
        $royMar = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 3"));
        if(empty($royMar['total'])){ $royMar = 0; } else { $royMar= $royMar['total']; };
        $royApr = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 4"));
        if(empty($royApr['total'])){ $royApr = 0; } else { $royApr= $royApr['total']; };
        $royMei = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 5"));
        if(empty($royMei['total'])){ $royMei = 0; } else { $royMei= $royMei['total']; };
        $royJun = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 6"));
        if(empty($royJun['total'])){ $royJun = 0; } else { $royJun= $royJun['total']; };
    
        return $royJan.$koma.$royFeb.$koma.$royMar.$koma.$royApr.$koma.$royMei.$koma.$royJun;
    } else {
        $royJul = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 7"));
        if(empty($royJul['total'])){ $royJul = 0; } else { $royJul = $royJul['total']; };
        $royAgu = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 8"));
        if(empty($royAgu['total'])){ $royAgu = 0; } else { $royAgu = $royAgu['total']; };
        $roySep = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 9"));
        if(empty($roySep['total'])){ $roySep = 0; } else { $roySep= $roySep['total']; };
        $royOkt = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 10"));
        if(empty($royOkt['total'])){ $royOkt = 0; } else { $royOkt= $royOkt['total']; };
        $royNov = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 11"));
        if(empty($royNov['total'])){ $royNov = 0; } else { $royNov= $royNov['total']; };
        $royDes = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(royalti) AS total FROM penjualan WHERE id_penulis = '$id' AND YEAR(bulan) = '$test2' AND MONTH(bulan) = 12"));
        if(empty($royDes['total'])){ $royDes = 0; } else { $royDes= $royDes['total']; };

        return $royJul.$koma.$royAgu.$koma.$roySep.$koma.$royOkt.$koma.$royNov.$koma.$royDes;
    }
}

function pembulatan($uang){
    $ratusan = substr($uang, -3);
    if($ratusan<0)
    $akhir = $uang - $ratusan;
    else
    $akhir = $uang + (1000-$ratusan);
    echo number_format($akhir);
}

?>