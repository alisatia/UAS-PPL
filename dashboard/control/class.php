<?php 

require('../iTbpResS.php');

// class untuk bar status di dashboard
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