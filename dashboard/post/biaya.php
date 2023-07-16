<?php
session_start();
if( isset($_SESSION["id_user"]) ) {
    $id_user = $_SESSION['id_user'];
}else {
    $id_user = "anonim";
}
require('../../conn.php');

if($_POST['jdlbuku'] == "") {
    header("Location: ../?judul=Buku ITB Press");
    exit();
} else if($_POST['qtybuku'] <= 0){
    $jadolth = $_POST['jdlbuku'];
    header("Location: ../?judul=$jadolth&qty=0");
    exit();     
} else if($_POST['fcbuku'] < 0){
    $jadolth = $_POST['jdlbuku'];
    $qttty = $_POST['qtybuku'];
    header("Location: ../?judul=$jadolth&qty=$qttty&fc=0");
    exit();     
} else if ($_POST['bwbuku'] < 0){
    $jadolth = $_POST['jdlbuku'];
    $qttty = $_POST['qtybuku'];
    $ffcc = $_POST['fcbuku'];
    header("Location: ../?judul=$jadolth&qty=$qttty&fc=$ffcc&bw=0");
    exit();
}

function rupiah($angka){
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;
}

$judul = $_POST['jdlbuku'];
if($judul == "") {
    $judul = "Buku Contoh";
} else {
    $judul = $_POST['jdlbuku'];
}
    $qty = $_POST['qtybuku'];
    $qty = 5;
    $dbw = $_POST['bwbuku'];
    $dfc= $_POST['fcbuku'];
    $dbwfc = $dbw + $dfc;
    if($dbwfc <= 0) {
        $bw = 15;
        $fc = 5;
    } else {
        $bw = $dbw;
        $fc = $dfc;
    }
    if(empty($_POST['isibuku'])){
        $isi = "HVS 80";
    } else {
        $isi = $_POST['isibuku'];
    }
    if(empty($_POST['ukrnbuku'])){
        $ukuran = "B5";
    } else{
        $ukuran = $_POST['ukrnbuku'];
    }
    if(empty($_POST['cvrbuku'])){
        $cover = "AP 310 gr";
    } else {
        $cover = $_POST['cvrbuku'];
    }
    $jeniscover = $_POST['jnscvr'];
    $laminasi = $_POST['lmnsi'];
    if(empty($_POST['fnsng'])){
        $finishing = "finishing1";
        $ori = "finishing1";
    } else {
        $finishing = $_POST['fnsng'];
        $ori = $_POST['fnsng'];
    }
    $uv = $_POST['uv'];
    if($uv == "Ya"){
        $uv = 350000;
    } else {
        $uv = 0;
    }
    if(empty($_POST['spajak'])){
        $pajak = "sebelum";
    } else {
        $pajak = $_POST['spajak'];
    }
    if($pajak == "sebelum") {
        $pajak = 0;
        $pajakk = "Sebelum Pajak";
    } else {
        $pajak = 0.11;
        $pajakk = "Sesudah Pajak";
    }

    echo "judul: ".$judul;
    echo " | qty: ".$qty;
    echo " | bw: ".$bw;
    echo " | fc: ".$fc;
    echo " | isi: ".$isi;
    echo " | ukuran: ".$ukuran;
    echo " | cover: ".$cover;
    echo " | jenis cover: ".$jeniscover;
    echo " | laminasi: ".$laminasi;
    echo " | finishing: ".$finishing;
    echo " | finishing2: ".$ori;
    echo " | uv: ".$uv;
    echo " | pajak: ".$pajakk."<br>";

    //biaya bahan isi
    $pilihan = mysqli_fetch_array(mysqli_query($conn, "SELECT  $ukuran FROM pilihan WHERE nama = '$isi' "));
    $id = $pilihan["$ukuran"];
    $bahan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where id_bahan = '$id' "));
    if($ukuran == "A3") {
            if($isi == "Kertas BC Putih 160 gr" || $isi == "Bookpaper 90 gr") {
                $biayabahanisi = $bahan['harga'] / 500 / 4;
            } else {
                $biayabahanisi = $bahan['harga'] / 500 / 8;
            }
        }
        if ($ukuran == "A4") {
            if($isi == "Kertas BC Putih 160 gr") {
                $biayabahanisi = $bahan['harga'] / 500 / 8;
            } else {
                $biayabahanisi = $bahan['harga'] / 500 / 16;
            }
        }
        if ($ukuran == "B5") {
            if($isi == "AP 100 ( Kunsdruk)" || $isi == "AP 310 ( Kunsdruk)") {
                $biayabahanisi = $bahan['harga'] / 500 / 20;
            } else if($isi == "Kertas BC Putih 160 gr" || $isi == "Bookpaper 90 gr") {
                $biayabahanisi = $bahan['harga'] / 500 / 16;
            } else {
                $biayabahanisi = $bahan['harga'] / 500 / 32;
            }
        }
        if ($ukuran == "A5") {
            $biayabahanisi = $bahan['harga'] / 500 / 32;
        }
        $tbbi = $biayabahanisi * ($bw + $fc) * (105/100) * $qty;

        //Biaya cover
        $pilihan = mysqli_fetch_array(mysqli_query($conn, "SELECT  $ukuran FROM pilihan WHERE nama = '$cover' "));
        $id = $pilihan["$ukuran"];
        $bahan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where id_bahan = '$id' "));
        $biayacover = $bahan['harga'] /500 / 4;
        $tbc= $biayacover * $qty * (105/100);

        //Biaya hardcover
        $bahan1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where jenis = 'Karton Abu' "));
        $bahan2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where jenis = 'Sheetblad' "));
        if($ukuran == "A4") {
            $bahan11 = $bahan1['harga'] /30 / 8;
        } elseif ($ukuran == "B5") {
            $bahan11 = $bahan1['harga'] /30 / 10;
        } elseif ($ukuran == "A5") {
            $bahan11 = $bahan1['harga'] /30 / 16;
        } else {
            $bahan11 = $bahan1['harga'] /30 / 3;
        }
        if($ukuran == "A4") {
            $bahan22 = $bahan2['harga'] / 500 / 2;
        } elseif ($ukuran == "B5") {
            $bahan22 = $bahan2['harga'] / 500 / 3;
        }elseif ($ukuran == "A5") {
            $bahan22 = $bahan2['harga'] / 500 / 4;
        } else {
            $bahan22 = $bahan2['harga'] / 500;
        }
        $biayahardcover = ($bahan11 + $bahan22) * 2;
        if($jeniscover == "Hardcover") {
            $tbhc = $biayahardcover * $qty;
        }
        if($jeniscover == "Softcover") {
            $tbhc = 0;
        }
        
        //Laminasi
        $bahan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where jenis = 'Laminasi' "));
        if($ukuran == "A4" || $ukuran == "B5") {
            $biayalaminasi = $bahan['harga'] / 100;
        } elseif ($ukuran == "A5") {
            $biayalaminasi = $bahan['harga'] / 150;
        } else {
            $biayalaminasi = $bahan['harga'] / 50;
        }
        if($biayalaminasi)
        if($laminasi == "TIDAK") {
            $tbl = 0;
        } else {
            if($qty >= 300) {
                $tbl = 48 * 32 * 0.5 * $qty * (105/100);
            } else {
                $tbl = $biayalaminasi * $qty * (105/100);
            }
        }
        $totalbahanbaku = $tbbi + $tbc + $tbhc + $tbl + $uv;

        //tinta
        $tintabw = 75;
        $tintafc = 850;
        $tintacover = 850;
        if($ukuran == "A3") {
            $ttb = ($bw / 1) * $qty * (105/100) * $tintabw;
            $ttf = ($fc / 1) * $qty * (105/100) * $tintafc;
            $ttc = ($qty / 1) * (105/100) * $tintacover;
        } elseif ($ukuran == "A4") {
            $ttb = ($bw / 2) * $qty * (105/100) * $tintabw;
            $ttf = ($fc / 2) * $qty * (105/100) * $tintafc;
            $ttc = ($qty / 1) * (105/100) * $tintacover;
        } elseif ($ukuran == "B5") {
            $ttb = ($bw / 2) * $qty * (105/100) * $tintabw;
            $ttf = ($fc / 2) * $qty * (105/100) * $tintafc;
            $ttc = ($qty / 1) * (105/100) * $tintacover;
        } else {
            $ttb = ($bw / 4) * $qty * (105/100) * $tintabw;
            $ttf = ($fc / 4) * $qty * (105/100) * $tintafc;
            $ttc = ($qty / 2) * (105/100) * $tintacover;
        }
        $totaltinta = $ttb + $ttf + $ttc;

        //publishing
        $editing = "basic";
        $layouting = "basic";
        $pubcover = "ya";
        $pennaskah = "ya";
        $setting = "ya";
        if($editing == "basic"){
            $hediting = 11000;
            $editing = $hediting * ($fc + $bw);
        } elseif ($editing == "advance") {
            $hediting = 20000;
            $editing = $editing  * ($fc + $bw);
        } else {
            $editing = 0;
        }
        if($layouting == "basic"){
            $hlayouting = 11000;
            $layouting = $hlayouting * ($fc + $bw);
        } elseif ($layouting == "advance") {
            $hlayouting = 20000;
            $layouting = $hlayouting * ($fc + $bw);
        } else {
            $layouting = 0;
        }
        if($pubcover == "ya"){
            $pubcover = 550000;
        } else  {
            $pubcover = 0;
        }
        if($pennaskah == "ya"){
            $pennaskah = 110000;
        } else  {
            $pennaskah = 0;
        }
        if($setting == "ya"){
            $setting = 110000;
        } else  {
            $setting = 0;
        }
        $penerbitan = $editing + $layouting + $pubcover + $pennaskah + $setting;

        //penerbitan
        $sqlpnr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Penerbitan' "));
        if($ukuran == "A3") {
            $biayapenerbitan = $sqlpnr['gaji'] / 8400 / 60 / 2;
        } elseif ($ukuran == "A5") {
            $biayapenerbitan = $sqlpnr['gaji'] / 8400 / 60 / 8;
        } else {
            $biayapenerbitan = $sqlpnr['gaji'] / 8400 / 60 / 4;
        }
        $tbp = ($fc + $bw) * ($biayapenerbitan * $qty) + ($qty * $biayapenerbitan);

        //cetak
        if($ukuran == "A3") {
            $biayacetak = ($bw * $qty) / 25 + ($fc * $qty) /12  + ($qty / 12);
        } elseif ($ukuran == "A4" || $ukuran == "B5"){
            $biayacetak = ($bw * $qty) / 50 + ($fc * $qty) /25  + ($qty / 12);
        } else {
            $biayacetak = ($bw * $qty) / 100 + ($fc * $qty) /50  + ($qty / 24);
        }
        $tbctsql = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Proses print2' "));
        $tbctone = ($tbctsql['gaji'] / 140 / 60)  * $tbctsql['waktu'];
        $tbct = $tbctone * $biayacetak;

        //btkl = penyelesaian
        $btkl1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Potong jadi' "));
        $btkl2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Potong setengah jadi' "));
        $btkl3 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Susun / sisip' "));
        $btkl4 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Rel cover ( manual)' "));
        $btkl5 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Proses Binding' "));
        $btkl6 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Sortir' "));
        $btkl7 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Wrapping' "));
        $btkl8 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Packing2' "));
        $btkl9 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Lipat' "));
        $btkli1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Jahit' "));
        $btkli2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Press hasil jahit' "));
        $btkli3 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Pengeleman karton (manual)& proses hardcover' "));
        $btkli4 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Hekter' "));

        $btkl11 = (($btkl1['gaji'] / 140 / 60) * $btkl1['waktu']) / 60;
        $btkl22 = (($btkl2['gaji'] / 140 / 60) * $btkl2['waktu']) / 60;
        $btkl33 = (($btkl3['gaji'] / 140 / 60) * $btkl3['waktu']) / 60;
        $btkl44 = (($btkl4['gaji'] / 140 / 60) * $btkl4['waktu']) / 60;
        $btkl55 = (($btkl5['gaji'] / 140 / 60) * $btkl5['waktu']) / 60;
        $btkl66 = (($btkl6['gaji'] / 140 / 60) * $btkl6['waktu']) / 60;
        $btkl77 = (($btkl7['gaji'] / 140 / 60) * $btkl7['waktu']) / 60;
        $btkl88 = (($btkl8['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
        $btkl99 = (($btkl9['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
        $btklj1 = (($btkli1['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
        $btklj2 = (($btkli2['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
        $btklj3 = (($btkli3['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
        $btklj4 = (($btkli4['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;

        if($finishing == "finishing1") {
            $biayafinishing = $btkl11 + $btkl22 + $btkl33 + $btkl44 + $btkl55 + $btkl66 + $btkl77 + $btkl88;
        } elseif ($finishing == "finishing2") {
            $biayafinishing = $btkl11 + $btkl22 + $btkl33 + $btkl44 + $btkl55 + $btkl66 + $btkl77 + $btkl88 +$btkl99 + $btklj1 + $btklj2;
        } elseif($finishing == "finishing3") {
            $biayafinishing = $btkl11 + $btkl22 + $btkl33 + $btkl44 + $btkl55 + $btkl66 + $btkl77 + $btkl88 +$btkl99 + $btklj1 + $btklj2 + $btklj3;
        } else {
            $biayafinishing = $btkl11 + $btkl22 + $btkl33  + $btkl66 + $btkl77 + $btkl88 +$btkl99 + $btklj4;
        }
        $tbf = (($fc + $bw) * ($qty * $biayafinishing)) + ($qty * $biayafinishing);
        $totalbtkl = $tbp + $tbct + $tbf;

        //bop
        if($ukuran == "A3"){
            $bop = 145.751246507937;
        } elseif  ($ukuran == "A5") {
            $bop = 36.4378116269841;
        }  else {
            $bop = 72.8756232539683;
        }
        $totalbop = (($fc + $bw) * ($qty *  $bop)) + ($qty * $bop);

        // total
        $hpptotal = $totalbahanbaku + $totaltinta + $penerbitan + $totalbtkl + $totalbop;
        $hppeks = $hpptotal / $qty;
        $hargajual = ($hppeks * 1.5 *$pajak) + ($hppeks * 1.5);
        $hargatotal = $hargajual * $qty;
        $hargahppeks1 = (int)$hppeks;
        $hargajual1 = (int)$hargajual;
        $hargatotal1 = (int)$hargatotal;

        echo "<br>";
        echo "biaya bahan isi : ",  rupiah($biayabahanisi), " | ", rupiah($tbbi);
        echo "<br>";
        echo "biaya cover : ", rupiah($biayacover), " | ", rupiah($tbc);
        echo "<br>";
        echo "biaya hardcover : ", "", " | ", rupiah($tbhc);
        echo "<br>";
        echo "biaya laminasi : ", rupiah($biayalaminasi), " | ", rupiah($tbl);
        echo "<br>";
        echo "Bahan baku kertas & Laminasi	 : ", rupiah($totalbahanbaku);
        echo "<br>";
        echo "<br>";
        echo "biaya tinta bw	 : ", rupiah($tintabw), " | ", rupiah($ttb);
        echo "<br>";
        echo "biaya tinta fc	 : ", rupiah($tintafc), " | ", rupiah($ttf);
        echo "<br>";
        echo "biaya tinta cover	 : ", rupiah($tintacover), " | ", rupiah($ttc);
        echo "<br>";
        echo "tinta	 : ", rupiah($totaltinta);
        echo "<br>";
        echo "<br>";
        echo "cover	 : ", rupiah($hediting), " | ", rupiah($editing);
        echo "<br>";
        echo "layouting	 : ", rupiah($hlayouting), " | ", rupiah($layouting);
        echo "<br>";
        echo "cover	 : ", "", " | ", rupiah($pubcover);
        echo "<br>";
        echo "penanganan naskah	 : ", "", " | ", rupiah($pennaskah);
        echo "<br>";
        echo "setting	 : ", "", " | ", rupiah($setting);
        echo "<br>";
        echo "penerbitan	 : ", rupiah($penerbitan);
        echo "<br>";
        echo "<br>";
        echo "Prepress	 : ", rupiah($biayapenerbitan), " | ", rupiah($tbp);
        echo "<br>";
        echo "Cetak	 : ", rupiah($biayacetak), " | ", rupiah($tbct);
        echo "<br>";
        echo "penyelesaian	 : ", rupiah($biayafinishing), " | ", rupiah($tbf);
        echo "<br>";
        echo "btkl	 : ", rupiah($totalbtkl);
        echo "<br>";
        echo "<br>";
        echo "btkl	 : ", rupiah($bop), " | ", rupiah($totalbop);
        echo "<br>";
        echo "btkl	 : ", rupiah($totalbop);

        echo "<br>";
        echo "<br>";
        echo "harga hpp eks : ", rupiah($hargahppeks1);
        echo "<br>";
        echo "harga jual satuan : ", rupiah($hargajual1);
        echo "<br>";
        echo "harga total : ", rupiah($hargatotal1);
        echo "<br>";
        echo "<br>";

        //dsdsdsd
        echo "dsds----------------".$qty;

        $qty = $_POST['qtybuku'];
        if($qty >= 6){
            $qty = $qty - 5;
            echo "qty: ".$qty;

            //biaya bahan isi
            $pilihan = mysqli_fetch_array(mysqli_query($conn, "SELECT  $ukuran FROM pilihan WHERE nama = '$isi' "));
            $id = $pilihan["$ukuran"];
            $bahan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where id_bahan = '$id' "));
            if($ukuran == "A3") {
                if($isi == "Kertas BC Putih 160 gr" || $isi == "Bookpaper 90 gr") {
                    $biayabahanisi = $bahan['harga'] / 500 / 4;
                } else {
                    $biayabahanisi = $bahan['harga'] / 500 / 8;
                }
            }
            if ($ukuran == "A4") {
                if($isi == "Kertas BC Putih 160 gr") {
                    $biayabahanisi = $bahan['harga'] / 500 / 8;
                } else {
                    $biayabahanisi = $bahan['harga'] / 500 / 16;
                }
            }
            if ($ukuran == "B5") {
                if($isi == "AP 100 ( Kunsdruk)" || $isi == "AP 310 ( Kunsdruk)") {
                    $biayabahanisi = $bahan['harga'] / 500 / 20;
                } else if($isi == "Kertas BC Putih 160 gr" || $isi == "Bookpaper 90 gr") {
                    $biayabahanisi = $bahan['harga'] / 500 / 16;
                } else {
                    $biayabahanisi = $bahan['harga'] / 500 / 32;
                }
            }
            if ($ukuran == "A5") {
                $biayabahanisi = $bahan['harga'] / 500 / 32;
            }
            $tbbi = $biayabahanisi * ($bw + $fc) * (105/100) * $qty;

            //Biaya cover
            $pilihan = mysqli_fetch_array(mysqli_query($conn, "SELECT  $ukuran FROM pilihan WHERE nama = '$cover' "));
            $id = $pilihan["$ukuran"];
            $bahan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where id_bahan = '$id' "));
            $biayacover = $bahan['harga'] /500 / 4;
            $tbc= $biayacover * $qty * (105/100);

            //Biaya hardcover
            $bahan1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where jenis = 'Karton Abu' "));
            $bahan2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where jenis = 'Sheetblad' "));
            if($ukuran == "A4") {
                $bahan11 = $bahan1['harga'] /30 / 8;
            } elseif ($ukuran == "B5") {
                $bahan11 = $bahan1['harga'] /30 / 10;
            } elseif ($ukuran == "A5") {
                $bahan11 = $bahan1['harga'] /30 / 16;
            } else {
                $bahan11 = $bahan1['harga'] /30 / 3;
            }
            if($ukuran == "A4") {
                $bahan22 = $bahan2['harga'] / 500 / 2;
            } elseif ($ukuran == "B5") {
                $bahan22 = $bahan2['harga'] / 500 / 3;
            }elseif ($ukuran == "A5") {
                $bahan22 = $bahan2['harga'] / 500 / 4;
            } else {
                $bahan22 = $bahan2['harga'] / 500;
            }
            $biayahardcover = ($bahan11 + $bahan22) * 2;
            if($jeniscover == "Hardcover") {
                $tbhc = $biayahardcover * $qty;
            }
            if($jeniscover == "Softcover") {
                $tbhc = 0;
            }
            
            //Laminasi
            $bahan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan where jenis = 'Laminasi' "));
            if($ukuran == "A4" || $ukuran == "B5") {
                $biayalaminasi = $bahan['harga'] / 100;
            } elseif ($ukuran == "A5") {
                $biayalaminasi = $bahan['harga'] / 150;
            } else {
                $biayalaminasi = $bahan['harga'] / 50;
            }
            if($biayalaminasi)
            if($laminasi == "TIDAK") {
                $tbl = 0;
            } else {
                if($qty >= 300) {
                    $tbl = 48 * 32 * 0.5 * $qty * (105/100);
                } else {
                    $tbl = $biayalaminasi * $qty * (105/100);
                }
            }
            $totalbahanbaku = $tbbi + $tbc + $tbhc + $tbl + $uv;

            //tinta
            $tintabw = 75;
            $tintafc = 850;
            $tintacover = 850;
            if($ukuran == "A3") {
                $ttb = ($bw / 1) * $qty * (105/100) * $tintabw;
                $ttf = ($fc / 1) * $qty * (105/100) * $tintafc;
                $ttc = ($qty / 1) * (105/100) * $tintacover;
            } elseif ($ukuran == "A4") {
                $ttb = ($bw / 2) * $qty * (105/100) * $tintabw;
                $ttf = ($fc / 2) * $qty * (105/100) * $tintafc;
                $ttc = ($qty / 1) * (105/100) * $tintacover;
            } elseif ($ukuran == "B5") {
                $ttb = ($bw / 2) * $qty * (105/100) * $tintabw;
                $ttf = ($fc / 2) * $qty * (105/100) * $tintafc;
                $ttc = ($qty / 1) * (105/100) * $tintacover;
            } else {
                $ttb = ($bw / 4) * $qty * (105/100) * $tintabw;
                $ttf = ($fc / 4) * $qty * (105/100) * $tintafc;
                $ttc = ($qty / 2) * (105/100) * $tintacover;
            }
            $totaltinta = $ttb + $ttf + $ttc;

            //publishing
            $editing = "basic";
            $layouting = "basic";
            $pubcover = "ya";
            $pennaskah = "ya";
            $setting = "ya";
            if($editing == "basic"){
                $hediting = 0;
                $editing = $hediting * ($fc + $bw);
            } elseif ($editing == "advance") {
                $hediting = 0;
                $editing = $editing  * ($fc + $bw);
            } else {
                $editing = 0;
            }
            if($layouting == "basic"){
                $hlayouting = 0;
                $layouting = $hlayouting * ($fc + $bw);
            } elseif ($layouting == "advance") {
                $hlayouting = 0;
                $layouting = $hlayouting * ($fc + $bw);
            } else {
                $layouting = 0;
            }
            if($pubcover == "ya"){
                $pubcover = 0;
            } else  {
                $pubcover = 0;
            }
            if($pennaskah == "ya"){
                $pennaskah = 0;
            } else  {
                $pennaskah = 0;
            }
            if($setting == "ya"){
                $setting = 0;
            } else  {
                $setting = 0;
            }
            $penerbitan = $editing + $layouting + $pubcover + $pennaskah + $setting;

            //penerbitan
            $sqlpnr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Penerbitan' "));
            if($ukuran == "A3") {
                $biayapenerbitan = $sqlpnr['gaji'] / 8400 / 60 / 2;
            } elseif ($ukuran == "A5") {
                $biayapenerbitan = $sqlpnr['gaji'] / 8400 / 60 / 8;
            } else {
                $biayapenerbitan = $sqlpnr['gaji'] / 8400 / 60 / 4;
            }
            $tbp = ($fc + $bw) * ($biayapenerbitan * $qty) + ($qty * $biayapenerbitan);

            //cetak
            if($ukuran == "A3") {
                $biayacetak = ($bw * $qty) / 25 + ($fc * $qty) /12  + ($qty / 12);
            } elseif ($ukuran == "A4" || $ukuran == "B5"){
                $biayacetak = ($bw * $qty) / 50 + ($fc * $qty) /25  + ($qty / 12);
            } else {
                $biayacetak = ($bw * $qty) / 100 + ($fc * $qty) /50  + ($qty / 24);
            }
            $tbctsql = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Proses print2' "));
            $tbctone = ($tbctsql['gaji'] / 140 / 60)  * $tbctsql['waktu'];
            $tbct = $tbctone * $biayacetak;

            //btkl = penyelesaian
            $btkl1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Potong jadi' "));
            $btkl2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Potong setengah jadi' "));
            $btkl3 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Susun / sisip' "));
            $btkl4 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Rel cover ( manual)' "));
            $btkl5 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Proses Binding' "));
            $btkl6 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Sortir' "));
            $btkl7 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Wrapping' "));
            $btkl8 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Packing2' "));
            $btkl9 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Lipat' "));
            $btkli1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Jahit' "));
            $btkli2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Press hasil jahit' "));
            $btkli3 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Pengeleman karton (manual)& proses hardcover' "));
            $btkli4 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM btkl where alur = 'Hekter' "));

            $btkl11 = (($btkl1['gaji'] / 140 / 60) * $btkl1['waktu']) / 60;
            $btkl22 = (($btkl2['gaji'] / 140 / 60) * $btkl2['waktu']) / 60;
            $btkl33 = (($btkl3['gaji'] / 140 / 60) * $btkl3['waktu']) / 60;
            $btkl44 = (($btkl4['gaji'] / 140 / 60) * $btkl4['waktu']) / 60;
            $btkl55 = (($btkl5['gaji'] / 140 / 60) * $btkl5['waktu']) / 60;
            $btkl66 = (($btkl6['gaji'] / 140 / 60) * $btkl6['waktu']) / 60;
            $btkl77 = (($btkl7['gaji'] / 140 / 60) * $btkl7['waktu']) / 60;
            $btkl88 = (($btkl8['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
            $btkl99 = (($btkl9['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
            $btklj1 = (($btkli1['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
            $btklj2 = (($btkli2['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
            $btklj3 = (($btkli3['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;
            $btklj4 = (($btkli4['gaji'] / 140 / 60) * $btkl8['waktu']) / 60;

            if($finishing == "finishing1") {
                $biayafinishing = $btkl11 + $btkl22 + $btkl33 + $btkl44 + $btkl55 + $btkl66 + $btkl77 + $btkl88;
            } elseif ($finishing == "finishing2") {
                $biayafinishing = $btkl11 + $btkl22 + $btkl33 + $btkl44 + $btkl55 + $btkl66 + $btkl77 + $btkl88 +$btkl99 + $btklj1 + $btklj2;
            } elseif($finishing == "finishing3") {
                $biayafinishing = $btkl11 + $btkl22 + $btkl33 + $btkl44 + $btkl55 + $btkl66 + $btkl77 + $btkl88 +$btkl99 + $btklj1 + $btklj2 + $btklj3;
            } else {
                $biayafinishing = $btkl11 + $btkl22 + $btkl33  + $btkl66 + $btkl77 + $btkl88 +$btkl99 + $btklj4;
            }
            $tbf = (($fc + $bw) * ($qty * $biayafinishing)) + ($qty * $biayafinishing);
            $totalbtkl = $tbp + $tbct + $tbf;

            //bop
            if($ukuran == "A3"){
                $bop = 145.751246507937;
            } elseif  ($ukuran == "A5") {
                $bop = 36.4378116269841;
            }  else {
                $bop = 72.8756232539683;
            }
            $totalbop = (($fc + $bw) * ($qty *  $bop)) + ($qty * $bop);

            // total
            $hpptotal = $totalbahanbaku + $totaltinta + $penerbitan + $totalbtkl + $totalbop;
            $hppeks = $hpptotal / $qty;
            $hargajual = ($hppeks * 1.5 *$pajak) + ($hppeks * 1.5);
            $hargatotal = $hargajual * $qty;
            $hargahppeks2 = (int)$hppeks;
            $hargajual2 = (int)$hargajual;
            $hargatotal2 = (int)$hargatotal;

            echo "<br>";
            echo "<br>";
            echo "biaya bahan isi : ",  rupiah($biayabahanisi), " | ", rupiah($tbbi);
            echo "<br>";
            echo "biaya cover : ", rupiah($biayacover), " | ", rupiah($tbc);
            echo "<br>";
            echo "biaya hardcover : ", "", " | ", rupiah($tbhc);
            echo "<br>";
            echo "biaya laminasi : ", rupiah($biayalaminasi), " | ", rupiah($tbl);
            echo "<br>";
            echo "Bahan baku kertas & Laminasi	 : ", rupiah($totalbahanbaku);
            echo "<br>";
            echo "<br>";
            echo "biaya tinta bw	 : ", rupiah($tintabw), " | ", rupiah($ttb);
            echo "<br>";
            echo "biaya tinta fc	 : ", rupiah($tintafc), " | ", rupiah($ttf);
            echo "<br>";
            echo "biaya tinta cover	 : ", rupiah($tintacover), " | ", rupiah($ttc);
            echo "<br>";
            echo "tinta	 : ", rupiah($totaltinta);
            echo "<br>";
            echo "<br>";
            echo "cover	 : ", rupiah($hediting), " | ", rupiah($editing);
            echo "<br>";
            echo "layouting	 : ", rupiah($hlayouting), " | ", rupiah($layouting);
            echo "<br>";
            echo "cover	 : ", "", " | ", rupiah($pubcover);
            echo "<br>";
            echo "penanganan naskah	 : ", "", " | ", rupiah($pennaskah);
            echo "<br>";
            echo "setting	 : ", "", " | ", rupiah($setting);
            echo "<br>";
            echo "penerbitan	 : ", rupiah($penerbitan);
            echo "<br>";
            echo "<br>";
            echo "Prepress	 : ", rupiah($biayapenerbitan), " | ", rupiah($tbp);
            echo "<br>";
            echo "Cetak	 : ", rupiah($biayacetak), " | ", rupiah($tbct);
            echo "<br>";
            echo "penyelesaian	 : ", rupiah($biayafinishing), " | ", rupiah($tbf);
            echo "<br>";
            echo "btkl	 : ", rupiah($totalbtkl);
            echo "<br>";
            echo "<br>";
            echo "btkl	 : ", rupiah($bop), " | ", rupiah($totalbop);
            echo "<br>";
            echo "btkl	 : ", rupiah($totalbop);

            echo "<br>";
            echo "<br>";
            echo "harga hpp eks : ", rupiah($hargahppeks2);
            echo "<br>";
            echo "harga jual satuan : ", rupiah($hargajual2);
            echo "<br>";
            echo "harga total : ", rupiah($hargatotal2);
            $qty = $qty + 5;
        } else {
            $hargahppeks2 = 0;
            $hargajual2 = 0;
            $hargatotal2 = 0;
        }
        //dsdsdsds

        echo $qty;
        // total
        $hpptotal = $totalbahanbaku + $totaltinta + $penerbitan + $totalbtkl + $totalbop;
        $hppeks = $hpptotal / $qty;
        $hargajual = ($hppeks * 1.5 *$pajak) + ($hppeks * 1.5);
        $hargatotal = $hargajual * $qty;
        $hargahppeks = $hargahppeks1 + $hargahppeks2;
        $hargatotal = $hargatotal1 + $hargatotal2;
        $hargajuals = $hargatotal / $qty;
        $hargajual = (int)$hargajuals;

        if($finishing == "finishing1") {
            $finishing = "Binding";
        } elseif ($finishing == "finishing2") {
            $finishing = "Binding + Jahit";
        } elseif ($finishing == "finishing3") {
            $finishing = "Binding + Jahit + Hardcover";
        } else {
            $finishing ="Booklet";
        }
        echo "<br>";
        echo "<br>";
        echo "harga hpp eks : ", rupiah($hargahppeks);
        echo "<br>";
        echo "harga jual satuan : ", rupiah($hargajual);
        echo "<br>";
        echo "harga total : ", rupiah($hargatotal);

        $uv = $_POST['uv'];

        $uku = $ukuran;
        if($ukuran == "A3"){
            $ukuran = "A3 (420 x 297 mm)";
        };
        if($ukuran == "A4"){
            $ukuran = "A4 (297 x 210 mm)";
        };
        if($ukuran == "A5"){
            $ukuran = "A5 (210 x 148 mm)";
        };
        if($ukuran == "B5"){
            $ukuran = "B5 (250 x 176 mm)";
        };
    header("Location: ../?judul=$judul&qty=$qty&fc=$fc&bw=$bw&ukuran=$ukuran&isi=$isi&cover=$cover&jenis=$jeniscover&laminasi=$laminasi&finishing=$finishing&uv=$uv&eks=$hargajual&total=$hargatotal&pajak=$pajakk&uks=$uku&ori=$ori");

?>