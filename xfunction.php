<?php

require('db.php');

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

class BarStatus{
    public $test;

    public function belum($test){
        if($test == 0){
            return "flex";
        } else {
            return "none";
        }
    }

    public function cek($test){
        if($test >= 15){
            return "flex";
        } else {
            return "none";
        }
    }

    public function meet($test){
        if($test >= 30){
            return "flex";
        } else {
            return "none";
        }
    }

    public function mou($test){
        if($test >= 45){
            return "flex";
        } else {
            return "none";
        }
    }

    public function proses($test){
        if($test >= 80){
            return "flex";
        } else {
            return "none";
        }
    }

    public function selesai($test){
        if($test == 100){
            return "flex";
        } else {
            return "none";
        }
    }

    public function gagal($test){
        if($test == -100){
            return "flex";
        } else {
            return "none";
        }
    }
}
?>