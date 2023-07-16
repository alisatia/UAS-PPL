<?php 
session_start();

//jika tidak login
if( !isset($_SESSION["id_user"]) ) {
    echo "<script>window.location.href = '../';</script>";
	exit;
}

//import php
require('control/function.php');
require('control/class.php');
require('post/barroyalti.php');
require('../conn.php');
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/logotitle.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/navigasi.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/biaya.css">
    <link rel="stylesheet" href="css/status.css">
    <link rel="stylesheet" href="css/naskah.css">
    <link rel="stylesheet" href="css/guidelines.css">
    <link rel="stylesheet" href="css/guidelines2.css">
    <script src="script/function.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <div id="innerProfil" hidden>1</div>
    <div id="loading" style="display:none">
		<img src="../assets/jalan.gif" alt="Loading...">
	</div>
    <div id="iblur" class="blur"></div>
    <div id="iblur2" class="blur2"></div>
    <div id="uploadPress" class="upload-press">
        <div class="box-upload">
            <div id="closeUpload" class="close-upload"></div>
            <form id="formUnggah" action="post/upload.php" method="post" class="form-upload" enctype="multipart/form-data">
                <div class="spesifikasi-upload">
                    <div class="upjudul">
                        <div class="icon"></div>
                        <input type="text" name="upjdl" id="upjdl" placeholder="Judul Buku" value="">
                    </div>
                    <div class="upkategori">
                        <div class="icon"></div>
                        <select name="upkate" id="uploadKategori">
                            <option id="lainnya" value="" disabled selected>Kategori Buku</option>
                            <?php while($kates = mysqli_fetch_array($kate)) { $opt = $kates['kategori'] ?>
                                <option value="<?php echo $opt ?>"><?php echo $opt ?></option>
                            <?php } ?>
                            <option id="katlan" value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="upother" id="uploadTambahKategori">
                        <div class="icon"></div>
                        <input type="text" name="upoth" id="upoth" placeholder="Kategori Baru">
                    </div>
                    <div class="upisbn" style="display: none;">
                        <div></div>
                        <input type="checkbox" id="chisbn" name="chisbn" value="yes" checked hidden>
                        <label for="chisbn" hidden>ISBN  </label>
                        <input type="checkbox" id="cheisbn" name="cheisbn" value="yes" checked hidden>
                        <label for="cheisbn" hidden>E-ISBN</label>
                        <input type="checkbox" id="chroyalti" name="chroyalti" value="yes" checked hidden>
                        <label for="chroyalti" hidden>Royalti</label>
                    </div>
                    <div class="uppenulis">
                        <div class="icon"></div>
                        <?php if(empty($dbpenulis['nama'])) { ?>
                            <input type="text" name="uppns" id="uppns" placeholder="nama penulis">
                        <?php } else { ?>
                            <input type="text" name="uppns" id="uppns" placeholder="nama penulis" value="<?php echo $dbpenulis['nama'] ?>">
                        <?php } ?>
                    </div>
                    <div class="upkontak">
                        <div class="icon"></div>
                        <?php if(empty($dbpenulis['phone'])) { ?>
                            <input type="number" name="upknt" id="upknt" placeholder="kontak penulis" value="">
                        <?php } else { ?>
                            <input type="number" name="upknt" id="upknt" placeholder="kontak penulis" value="<?php echo $dbpenulis['phone'] ?>">
                        <?php } ?>
                    </div>
                    <div id="tambah1">
                        <div></div>
                        <div class="tambahan">
                            <span>Tambah Penulis?</span>
                            <icon id="iconTambah" class="icon-tambah"></icon>
                        </div>
                    </div>
                    <div id="textareaPenulis">
                        <div class="icons"></div>
                        <textarea style="resize: none; height: 60px" name="upktn" id="upktn" placeholder="M. Agus, Ariq Rakanda, Rizkia" id="penulisTambahan" cols="20" rows="5"></textarea>
                        <span id="iconTextarea" class="icon-textarea"></span>
                    </div>
                </div>
                <div class="garis-upload"></div>
                <div class="browser-upload">
                    <input type="file" name="file" id="upfile" hidden onchange="return  uploadFile(this)">
                    <div class="drop">
                        <div class="dragDrop">
                            <div>Drag & Drop</div>
                            <div>Atau</div>
                            <div class="mobile-drag">Masukan File anda:</div>
                            <label for="upfile">Unggah</label>
                        </div>
                        <div id="textnama" style="font-size: small; color: #9d9d9d;">.doc/.docx, zip/rar max 50mb</div>
                    </div>
                    <div class="batasSize">
                        <dff>> 50</dff>
                        <div>jika melebihi 50mb silakan tulis tautan google drive di bawah ini.</div>
                    </div>
                    <input type="text" name="link" id="link" placeholder="Link Gdrive, Mega, dsb.">
                </div>
                <button type="submit" id="uploadNaskah" name="upload-naskah" class="upload-button" onclick="showLoading()">Kirim</button>
            </form>
        </div>
    </div>
    <div id="profilUser" class="profile-user">
        <div id="profileUserBox" class="profile-user-box">
            <img id="closeUser" class="close-profile" src="../assets/close.png" alt="close">
            <div class="profile-foto">
                <div class="foto-penulis" style="background-image: url(../files/<?php echo $dbpenulis['file_foto'] ?>);"></div>
                <div style="display: none;" class="biografi-penulis">
                    <h4>Biografi Penulis</h4>
                    <textarea name="biografiPenulis" id="biografiPenulis" cols="30" rows="10">
                        <?php echo $dbpenulis['biografi'] ?>
                    </textarea>
                </div>
            </div>
            <div class="profile-biodata">
                <div class="biodata-1">
                    <h3>BIODATA PENULIS</h3>
                    <form action="post/profile.php" method="post" class="form-profile" enctype="multipart/form-data">
                        <input type="text" name="profileId" value="<?php echo $dbpenulis['id_penulis'] ?>" hidden>
                        <div class="">
                            <label for="penulis">Nama</label>
                            <p>:</p>
                            <input type="text" name="profilePenulis" value="<?php echo $dbpenulis['nama'] ?>">
                        </div>
                        <div class="">
                            <label for="penulis">Kontak</label>
                            <p>:</p>
                            <input type="text" name="profileKontak" value="<?php echo $dbpenulis['phone'] ?>">
                        </div>
                        <div class="">
                            <label for="penulis">Instansi</label>
                            <p>:</p>
                            <input type="text" name="profileInstansi" value="<?php echo $dbpenulis['instansi'] ?>">
                        </div>
                        <div class="">
                            <label for="penulis">Jabatan</label>
                            <p>:</p>
                            <input type="text" name="profileJabatan" value="<?php echo $dbpenulis['jabatan'] ?>">
                        </div>
                        <div class="">
                            <label for="penulis">Kontak Lain</label>
                            <p>:</p>
                            <input type="text" name="profileKontakLain" value="<?php echo $dbpenulis['kontak_lain'] ?>">
                        </div>
                        <div class="">
                            <label for="penulis">Biografi</label>
                            <p>:</p>
                            <textarea name="profileBiografi" id="profileBiografi" cols="30" rows="5"><?php echo $dbpenulis['biografi'] ?></textarea>
                        </div>
                        <div class="">
                            <label for="updateFileFoto">Ubah Foto</label>
                            <p>:</p>
                            <input type="file" name="file" id="updateFileFoto" style="border: none">
                        </div>
                        <div class="">
                            <div></div>
                            <div></div>
                            <button name="submitProfile" class="profile-submit">Update</button>
                        </div>
                    </form>
                </div>
                <div class="biodata-2"></div>
            </div>
        </div>
    </div>
    <div id="container" class="container">
        <!-- siderbar -->
        <div id="sidebarPress" class="sidebar-press">
            <div class="title-press">
                <div id="titleImg" class="img"></div>
            </div>
            <div id="tambahanSidebar" class="tambahan-sidebar"></div>
            <div id="nav" class="navbar-press">
                <div id="tambahanBackground" class="tambahan-background"></div>
                <div id="navbarDashboard" class="navbar-dashboard">
                    <div id="dashboardIcon" class="icon" onclick="dashboard()"></div>
                    <div id="dashbaordText" class="text" onclick="dashboard()">Dashboard</div>
                </div>
                <div id="navbarBiaya"  class="navbar-biaya">
                    <div id="biayaIcon" class="icon" onclick="biaya()"></div>
                    <div  id="biayaText"class="text" onclick="biaya()">Biaya</div>
                </div>
                <div id="navbarStatus" class="navbar-status">
                    <div id="statusIcon" class="icon" onclick="status()"></div>
                    <div  id="statusText"class="text" onclick="status()">Status</div>
                </div>
                <div id="navbarNaskah" class="navbar-naskah">
                    <div id="naskahIcon" class="icon" onclick="naskah()"></div>
                    <div  id="naskahText"class="text" onclick="naskah()">Naskah</div>
                </div>
                <div id="navbarGuidelines" class="navbar-guidelines">
                    <div id="guidelinesIcon" class="icon" onclick="guidelines()"></div>
                    <div  id="guidelinesText"class="text" onclick="guidelines()">Panduan</div>
                </div>
            </div>
        </div>
        <!-- content -->
        <div class="content-press" id="contentPress">
            <label for="tambahanBurger" class="tambahan-burger">
                <div id="dot1" class="dot"></div>
                <div id="dot2" class="dot"></div>
                <div id="dot3" class="dot"></div>
            </label>
            <input type="checkbox" id="tambahanBurger" style="display: none">
            <div class="header">
                <div class="profil">
                    <div id="fotoPress" class="foto-press">
                        <div id="detailProfil" class="foto-detail">
                            <div class="detail-show">
                                <div id="textProfil" class="text-profil">Profil</div>
                                <a href="../login/logout.php" id="logout">Logout</a>
                            </div>
                            <div></div>
                        </div>
                        <?php if(empty($dbpenulis['file_foto'])) { ?>
                            <img src="../assets/noimage.png" alt="">
                        <?php } else { ?>
                            <img src="../files/<?php echo $dbpenulis['file_foto'] ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="akun"><?php echo $dbuser['username'] ?></div>
                </div>
                <div class="judul">
                    Dashboard - Informasi buku Anda
                </div>
                <div class="unggah">
                    <div class="txt">Unggah Naskah</div>
                    <div id="iconUnggah" class="img"></div>
                </div>
            </div>
            <div id="child" class="child">
                <div id="childDashboard" class="child-dash">
                    <div class="notif-dashboard">
                        <div id="direviu" class="telaah">
                            <div id="div">
                                <div id="revtot"><?php echo $riviu['riviu'] ?></div>
                                <div id="revtext">Ditelaah</div>
                            </div>
                            <img src="../assets/bookdsb.png" id="revicon"></img>
                        </div>
                        <div id="proses" class="proses">
                            <div id="div2">
                                <div id="protot"><?php echo $proses['riviu'] ?></div>
                                <div id="protext">Dikerjakan</div>
                            </div>
                            <img src="../assets/proses.png" id="proicon"></img>
                        </div>
                        <div id="selesai" class="selesai">
                            <div id="div3">
                                <div id="seltot"><?php echo $selesai['riviu'] ?></div>
                                <div id="seltext">Selesai</div>
                            </div>
                            <img src="../assets/done.png" id="selicon"></img>
                        </div>
                        <div id="ditolak" class="ditolak">
                            <div id="div4">
                                <div id="toltot"><?php echo $tolak['riviu'] ?></div>
                                <div id="toltext">Ditolak</div>
                            </div>
                            <img src="../assets/reject.png" id="tolicon"></img>
                        </div>
                        <div id="penyerahan" class="penyerahan">
                            <div id="div5">
                                <div id="sertot"><?php echo $serah['riviu'] ?></div>
                                <div id="sertext">Total Penyerahan</div>
                            </div>
                            <img src="../assets/penyerahan.png" id="sericon"></img>
                        </div>
                    </div>
                    <div class="grafik-dashboard">
                        <div id="graf1" class="grafik-kiri">
                            <div id="kota" class="chart-dash">
                                <div id="chartkota">
                                    <canvas id="barkota" width="100%" height="80%"></canvas>
                                </div>
                            </div>
                            <div id="buku" class="chart-dash">
                                <div id="chartbuku">
                                    <canvas id="barbuku" width="100%" height="50%"></canvas>
                                </div>
                            </div>
                        </div>
                        <div id="graf2" class="grafik-tengah">
                            <div id="royalti" class="chart-royalti chart-dash">
                                <label for="tombolRoyalti" id="hoverRoyalti" class="tombol-royalti"></label>
                                <input type="checkbox" id="tombolRoyalti" hidden>
                                <div id="text-royalti" class="text-royalti">text</div>
                                <form action="post/barroyalti.php" method="post" name="formRoyalti" id="formRoyalti" class="pilihan-royalti">
                                    <select name="semester" id="semester" class="semester" onchange="this.form.submit()">
                                        <?php if(isset($_GET['1aS'])) {
                                            $satu = $_GET['1aS'];
                                            if($satu == 1) {
                                                $semester = "Semester 1";
                                            } else {
                                                $semester = "Semester 2";
                                            } ?>
                                            <option value="<?php echo $satu ?>"><?php echo $semester ?></option>
                                        <?php } ?>
                                        <option value="1">Semester 1</option>
                                        <option value="2">Semester 2</option>
                                    </select>
                                    <div class="rentan">
                                        <div class="biru"></div>
                                        <select name="tahunsatu" id="tahunsatu" onchange="this.form.submit()">
                                            <?php if(isset($_GET['2aS'])) {?>
                                                <option value="<?php echo $_GET['2aS'] ?>"><?php echo $_GET['2aS'] ?></option>
                                            <?php } ?>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                        <div class="strip">-</div>
                                        <div class="hijau"></div>
                                        <select name="tahundua" id="tahundua" onchange="this.form.submit()">
                                            <?php if(isset($_GET['3aS'])) {?>
                                                <option value="<?php echo $_GET['3aS'] ?>"><?php echo $_GET['3aS'] ?></option>
                                            <?php } ?>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                </form>

                                <div class="total-royalti" id="totalRoyalti">Total Royalti:<?php if(!empty($totRoyaltis['total'])) { echo " Rp"; echo pembulatan($totRoyaltis['total']); } else { echo " Belum ada Royalti"; } ?></div>
                                
                                <div id="chartroyalti">
                                    <canvas id="barroyalti" width="100%" height="60%"></canvas>
                                </div>
                            </div>
                            <div id="tulisan" class="tulisan">
                                <div id="lasto" class="content-tulisan">
                                    <div id="ls1">Pengunggahan Naskah Terakhir</div>
                                    <table>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php while($lasts = mysqli_fetch_array($lasto)){ ?>
                                        <tr>
                                            <td><?php echo substr($lasts['created'], 0, 10) ?></td>
                                            <td><?php echo substr($lasts['judul'], 0, 20) ?></td>
                                            <td><?php echo $lasts['penulis'] ?></td>
                                            <?php $statt = $lasts['status'];
                                                if($statt == "Rejected") { ?>
                                                <td style="color: #FF626B;">Ditolak</td>
                                            <?php } else { ?>
                                                <td>
                                                    <?php if($statt == "Publish") { 
                                                        echo "Terbit";
                                                    } else { 
                                                        echo substr($statt, 0, 10);
                                                    } ?>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="graf3" class="grafik-kanan">
                            <div id="media" class="chart-dash">
                                <div id="chartmedia">
                                    <canvas id="barmedia" width="100%" height="90%"></canvas>
                                </div>
                            </div>
                            <div id="other" class="other">
                                <div id="chartother" class="chart-other">
                                    <p>Bar Naskah Terakhir</p>
                                    <p style="font-size: small; margin-top: 20px"># Buku <?php if(isset($barStatus['judul'])) { echo substr($barStatus['judul'], 0, 80); } else { echo "---"; } ?></p>
                                    <div class="status-bar-naskah">
                                        <?php if(isset($barStatus['judul'])) { ?>
                                            <?php $statusBar = new BarStatus(); $cekStatus = cekStatus($barStatus['status']); ?>
                                            <div class="progress-bar-naskah bar-naskah-0" style="display: <?php echo $statusBar->belum($cekStatus) ?>">Menunggu Konfirmasi . . .</div>
                                            <div class="progress-bar-naskah bar-naskah-1" style="display: <?php echo $statusBar->cek($cekStatus) ?>">Cek</div>
                                            <div class="progress-bar-naskah bar-naskah-2" style="display: <?php echo $statusBar->meet($cekStatus) ?>">Meet</div>
                                            <div class="progress-bar-naskah bar-naskah-3" style="display: <?php echo $statusBar->mou($cekStatus) ?>;">MoU</div>
                                            <div class="progress-bar-naskah bar-naskah-4" style="display: <?php echo $statusBar->proses($cekStatus) ?>;">Proses</div>
                                            <div class="progress-bar-naskah bar-naskah-5" style="display: <?php echo $statusBar->selesai($cekStatus) ?>;">Selesai</div>
                                            <div class="progress-bar-naskah bar-naskah-gagal" style="display: <?php echo $statusBar->gagal($cekStatus) ?>;">Ditolak</div>
                                            <div id="barPersen" class="progress-bar-naskah bar-persen"></div>
                                        <?php } ?>
                                        <script>barPersen(<?php echo $cekStatus ?>)</script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="post/biaya.php" method="post"  id="childBiaya" class="child-biaya">
                    <div id="cover" class="cover-biaya">
                        <div id="judul" class="judul-biaya">
                            <img class="booky-calcu" src="../assets/calculator.gif" alt="">
                        </div>
                        <div id="total">
                            <div id="childtot">
                                <div id="totbuku">
                                    <p>Harga Total</p>
                                    <p>:</p>
                                    <?php if(isset($_GET['total'])) { ?>
                                        <p id="totalbiaya">Rp <?php echo pembulatan($_GET['total']) ?></p>
                                    <?php } else { ?>
                                        <p style="color: rgb(184, 184, 184);" id="totalbiaya">Rp 00.000</p>
                                    <?php } ?>
                                </div>
                                <div id="eksbuku">
                                    <p>Harga per Eks</p>
                                    <p>:</p>
                                    <?php if(isset($_GET['eks'])) { ?>
                                        <p id="p3">Rp <?php echo pembulatan($_GET['eks']) ?></p>
                                    <?php } else { ?>
                                        <p style="color: rgb(184, 184, 184);" id="p3">Rp 00.000</p>
                                    <?php } ?>
                                </div>
                                <div id="pajak">
                                    <label for="spajak">Pajak</label>
                                    <select name="spajak" id="spajak">
                                        <?php if(isset($_GET['pajak'])) { ?>
                                            <option value="<?php echo $_GET['pajak'] ?>" disabled hidden selected><?php echo $_GET['pajak'] ?></option>
                                        <?php } ?>
                                        <option value="sebelum">Sebelum Pajak</option>
                                        <option value="sesudah">Setelah Pajak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="list-biaya" class="list-biaya">
                        <div id="boxbiaya" class="box-biaya">
                            <div>
                                <label for="jdlbuku">Judul Buku</label>
                                <div>:</div>
                                <?php if(isset($_GET['judul'])) { ?>
                                    <input type="text" name="jdlbuku" id="jdlbuku" placeholder="Judul Buku" value="<?php echo $_GET['judul'] ?>">
                                <?php } else { ?>
                                    <input type="text" name="jdlbuku" id="jdlbuku" placeholder="Judul Buku" value="">
                                <?php } ?>
                                </div>
                            <div>
                                <label for="qtybuku">Quantity</label>
                                <div>:</div>
                                <?php if(isset($_GET['qty'])) { ?>
                                     <input type="number" name="qtybuku" id="qtybuku" value="<?php echo $_GET['qty'] ?>" min="5" onchange="fqty()">
                                <?php } else { ?>
                                    <input type="number" name="qtybuku" id="qtybuku" placeholder="Quantity Buku" min="5" onchange="fqty()">
                                <?php } ?>
                            </div>
                            <div>
                                <label for="fcbuku">Halaman Warna</label>
                                <div>:</div>
                                <?php if(isset($_GET['fc'])) { ?>
                                    <input type="number" name="fcbuku" id="fcbuku" value="<?php echo $_GET['fc'] ?>" min="0">
                                <?php } else { ?>
                                    <input type="number" name="fcbuku" id="fcbuku" value="" min="0" placeholder="Halaman Warna">
                                <?php } ?>
                            </div>
                            <div>
                                <label for="bwbuku">Halaman Hitam Putih</label>
                                <div>:</div>
                                <?php if(isset($_GET['bw'])) { ?>
                                    <input type="number" name="bwbuku" id="bwbuku" value="<?php echo $_GET['bw'] ?>" min="0">
                                <?php } else { ?>
                                    <input type="number" name="bwbuku" id="bwbuku" value="" min="0" placeholder="Halaman Hitam Putih">
                                <?php } ?>
                            </div>
                            <div>
                                <label for="ukrnbuku">Ukuran Buku</label>
                                <div>:</div>
                                <?php if(isset($_GET['ukuran'])) { ?>
                                    <select style="color: black;" id="ukuranWarna" name="ukrnbuku" id="ukrnbuku">
                                <?php } else { ?> 
                                    <select id="ukuranWarna" name="ukrnbuku" id="ukrnbuku">
                                <?php } ?>
                                        <?php if(isset($_GET['ukuran'])) { ?>
                                            <option value="<?php echo $_GET['uks'] ?>" disabled selected hidden><?php echo $_GET['ukuran'] ?></option>
                                        <?php } else { ?>
                                            <option value="B5" disabled selected hidden>Standar (B5)</option>
                                        <?php } ?>
                                        <option value="A4">A4 (297 x 210 mm)</option>
                                        <option value="A5">A5 (210 x 148 mm)</option>
                                        <option value="B5">B5 (250 x 176 mm)</option>
                                    </select>
                            </div>
                            <div>
                                <label for="isibuku">Bahan Isi</label>
                                <div>:</div>
                                <?php if(isset($_GET['isi'])) { ?>
                                    <select style="color: black" id="isiWarna" name="isibuku" id="isibuku">
                                <?php } else { ?>
                                    <select id="isiWarna" name="isibuku" id="isibuku">
                                <?php } ?>
                                    <?php if(isset($_GET['isi'])) { ?>
                                        <option value="<?php echo $_GET['isi'] ?>" disabled selected hidden><?php echo $_GET['isi'] ?></option>
                                    <?php } else { ?>
                                        <option value="HVS 80" disabled selected hidden>Standar (HVS 80)</option>
                                    <?php } ?>
                                    <?php while ($isis = mysqli_fetch_array($isi)) { ?>
                                            <option value="<?php echo $isis['nama'] ?>"><?php echo $isis['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label for="cvrbuku">Bahan Cover</label>
                                <div>:</div>
                                <?php if(isset($_GET['cover'])) { ?>
                                    <select style="color: black" id="coverWarna" name="cvrbuku" id="cvrbuku">
                                <?php } else { ?>
                                    <select id="coverWarna" name="cvrbuku" id="cvrbuku">
                                <?php } ?>
                                    <?php if(isset($_GET['cover'])) { ?>
                                        <option value="<?php echo $_GET['cover'] ?> " disabled selected hidden><?php echo $_GET['cover'] ?></option>
                                    <?php } else { ?>
                                        <option value="AP 310 gr" disabled selected hidden>Standar (AP 310 gr)</option>
                                    <?php } ?>
                                    <?php while ($covers = mysqli_fetch_array($cover)) { ?>
                                        <option value="<?php echo $covers['nama'] ?>"><?php echo $covers['nama'] ?></option>
                                    <?php } ?>  
                                </select>
                            </div>
                            <div>
                                <label for="jnscvr">Jenis Cover</label>
                                <div>:</div>
                                <?php if(isset($_GET['jenis'])) { ?>
                                    <select style="color: black" id="jenisWarna" name="jnscvr" id="jnscvr">
                                <?php } else { ?>
                                    <select id="jenisWarna" name="jnscvr" id="jnscvr">
                                <?php } ?>
                                    <?php if(isset($_GET['jenis'])) { ?>
                                        <option value="<?php echo $_GET['jenis'] ?>" disabled selected hidden><?php echo $_GET['jenis'] ?></option>
                                    <?php } ?>
                                    <option value="Softcover">Softcover</option>
                                    <option value="Hardcover">Hardcover</option>
                                </select>
                            </div>
                            <div>
                                <label for="lmnsi">Laminasi</label>
                                <div>:</div>
                                <?php if(isset($_GET['laminasi'])) { ?>
                                    <select style="color: black" id="laminasiWarna" name="lmnsi" id="lmnsi">
                                <?php } else { ?> 
                                    <select id="laminasiWarna" name="lmnsi" id="lmnsi">
                                <?php } ?>
                                    <?php if(isset($_GET['laminasi'])) { ?>
                                        <option value="<?php echo $_GET['laminasi'] ?>" disabled selected hidden><?php echo $_GET['laminasi'] ?></option>
                                    <?php } ?>
                                    <option value="Glossy">Glossy</option>
                                    <option value="Doff">Doff</option>
                                </select>
                            </div>
                            <div>
                                <label for="fnsng">Finishing</label>
                                <div>:</div>
                                <?php if(isset($_GET['finishing'])) { ?>
                                    <select style="color: black" id="finisWarna" name="fnsng" id="fnsng">
                                <?php } else { ?>
                                    <select id="finisWarna" name="fnsng" id="fnsng">
                                <?php } ?>
                                    <?php if(isset($_GET['finishing'])) { ?>
                                        <option value="<?php echo $_GET['ori'] ?>" disabled selected hidden ><?php echo $_GET['finishing'] ?></option>
                                    <?php } else { ?>
                                        <option style="color: #FF626B;" value="finishing1" disabled selected hidden >Standar (Binding)</option>
                                    <?php } ?>
                                    <option value="finishing1">Binding</option>
                                    <option value="finishing2">Binding Jahit</option>
                                    <option value="finishing3">Binding Jahit Hardcover</option>
                                    <option value="finishing4">Booklet</option>
                                </select>
                            </div>
                            <div>
                                <label for="uv">Spot UV</label>
                                <div>:</div>
                                <?php if(isset($_GET['uv'])) { ?>
                                    <select style="color: black" id="uvWarna" name="uv" id="uv">
                                <?php } else { ?>
                                    <select id="uvWarna" name="uv" id="uv">
                                <?php } ?>
                                    <?php if(isset($_GET['uv'])) { ?>
                                        <option value="<?php echo $_GET['uv'] ?>" disabled selected hidden><?php echo $_GET['uv'] ?></option>
                                    <?php } ?>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Ya">Ya</option>
                                </select>
                            </div>
                            <div>
                                <div></div>
                                <div></div>
                                <button type="submit" id="hitung">Hitung</button>
                            </div>
                        </div>
                    </div>
                    <div id="blank" class="simulasi-buku">
                        <div class="review-buku">
                            <div class="hanya">Simulasi hitung biaya dan Kover untuk menerbitkan buku</div>
                            <div class="punggung">
                                <div class="punggung-buku">
                                    <div class="punggung-buku-inisial"><?php if(isset($_GET['judul'])) { echo substr($_GET['judul'], 0, 1); } else { echo "B"; } ?></div>
                                    <div class="punggung-buku-judul"><?php if(isset($_GET['judul'])) { echo $_GET['judul']; } else { echo "BUKU ITB PRESS"; } ?></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="depan-buku">
                                <div class="cover-buku">
                                    <div class="cover-buku-penulis"><?php if(empty($dbpenulis['nama'])) { echo "ITB Press"; } else { echo $dbpenulis['nama']; } ?></div>
                                    <div class="cover-buku-judul"><?php if(isset($_GET['judul'])) { echo $_GET['judul']; } else { echo "BUKU ITB PRESS"; } ?></div>
                                </div>
                            </div>
                            <div class="harga-buku">
                                <p>* Cover</p>
                                <p>: <?php if(isset($_GET['jenis'])) { echo $_GET['jenis']; } else {?><dfg style="color: rgb(184, 184, 184)"><?="Softcover";?></dfg><?php } ?></p>
                                <p>* Finishing</p>
                                <p>: <?php if(isset($_GET['finishing'])) { echo $_GET['finishing']; } else { ?><dfg style="color: rgb(184, 184, 184)"><?= "Binding";?></dfg><?php } ?></p>
                                <p>* Sopot UV</p>
                                <p>: <?php if(isset($_GET['uv'])) { echo $_GET['uv']; } else { ?><dfg style="color: rgb(184, 184, 184)"><?= "Tidak";?></dfg><?php } ?></p>
                            </div>
                            <div class="ukuran-1">
                                <div class="ukuran-box-1 box-1-width"></div>
                                <?php if(isset($_GET['bw'])) { ?> 
                                    <div style="color: black" class="ukuran-box-2">
                                <?php } else { ?>
                                    <div style="color: rgb(184, 184, 184);" class="ukuran-box-2">
                                <?php } ?>
                                    <?php if(isset($_GET['bw'])) {$kbw = $_GET['bw']; $kfc = $_GET['fc'];  $kCover = $_GET['jenis']; } else { $kbw = 80; $kfc = 20; $kCover = "Softcover";};?><?= cekKetebalan($kbw, $kfc, $kCover)." mm"; ?></div>
                            </div>
                            <div class="ukuran-2">
                                <div class="ukuran-box-1 box-2-width"></div>
                                <div class="ukuran-box-2"><?php if(isset($_GET['ukuran'])) { echo cekKertasSatu($_GET['ukuran']); } else { ?><dfg style="color: rgb(184, 184, 184)"><?= "17,6 cm";?></dfg><?php } ?></div>
                            </div>
                            <div class="ukuran-3">
                                <div class="ukuran-box-3"><?php if(isset($_GET['ukuran'])) { echo cekKertasDua($_GET['ukuran']); } else { ?><dfg style="color: rgb(184, 184, 184)"><?= "25 cm"; }?></dfg><?php ?></div>
                                <div class="ukuran-box-4"></div>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="childStatus" class="child-status">
                    <div id="bar">
                        <div id="barjudul">
                            <label class="label-barbar" for="barbar">Judul:</label>
                            <select name="" id="barbar" onchange="seljud()" onclick="friww()">
                                <?php
                                $sds = "ikj";
                                $iss = 1;
                                $isx = 1;
                                while($judop = mysqli_fetch_array($dbstatus)) { 
                                    $judstat = $judop['status'];
                                    $idBukunya = $judop['id_buku'];
                                    if($iss == 1) { 
                                        $diss = $judstat;   
                                        $iss++;
                                    }  
                                    $gb = $sds . $isx; $isx++;?>
                                    <option id="<?php echo $gb ?>" value="<?php echo $idBukunya ?>|<?php echo $judstat ?>"><?php echo substr($judop['judul'], 0, 20) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div id="riwayat">
                            <div id="bxriwa">
                                <p id="titles">Riwayat Naskah</p><br>
                                <?php $juu = 1; $jus = "ids"; while($nama = mysqli_fetch_array($dbstatuss)) { 
                                    $xjudul = $nama['judul'];
                                    $xidbuku = $nama['id_buku'];
                                    $gbng = $jus . $juu;
                                    $dbb = mysqli_query($conn, "SELECT * FROM riwayat_naskah WHERE id_buku = '$xidbuku' ORDER BY created ASC ") ?>
                                    <div id="<?php echo $gbng ?>">
                                        <?php while($xnama = mysqli_fetch_array($dbb)) { ?>
                                            <svv id="poi"></svv>
                                            <svv><?php echo substr($xnama['created'],0,10) ?></svv>
                                            <svv><?php echo $xnama['status'] ?></svv>
                                        <?php } ?>
                                    </div>
                                    <?php $juu = $juu + 1 ?>
                                <?php } ?>
                                <div id="demo">d</div>
                            </div>
                        </div>
                    </div>
                    <div id="anime">
                        <div id="barH">
                            <div class="status-bar-progres">
                                <div id="stepBarSatu" class="step-bar">1</div>
                                <div id="stepLengSatu" class="step-leng"></div>
                                <div id="stepBarDua" class="step-bar">2</div>
                                <div id="stepLengDua" class="step-leng"></div>
                                <div id="stepBarTiga" class="step-bar">3</div>
                                <div id="stepLengTiga" class="step-leng"></div>
                                <div id="stepBarEmpat" class="step-bar">4</div>
                                <div id="stepLengEmpat" class="step-leng"></div>
                                <div id="stepBarLima" class="step-bar">5</div>
                                <div id="stepLengLima" class="step-leng"></div>
                                <div id="stepBarEnam" class="step-bar">6</div>
                                <div id="stepLengEnam" class="step-leng"></div>
                                <div id="stepBarTujuh" class="step-bar">7</div>
                                <div class="step-name">Confrim</div>
                                <div></div>
                                <div class="step-name">Meet</div>
                                <div></div>
                                <div class="step-name">Mou</div>
                                <div></div>
                                <div class="step-name">Penyuntingan</div>
                                <div></div>
                                <div class="step-name">ISBN</div>
                                <div></div>
                                <div class="step-name">Produksi</div>
                                <div></div>
                                <div class="step-name">Terbit</div>
                            </div>
                        </div>
                        <div id="animasi">
                            <div id="anreview" >
                                <img class="booky-read" src="../assets/confirm.gif" alt="read">
                                <div id="rev">
                                    <p>Naskah Anda Berhasil diunggah</p><br>
                                    <p>Tim kami akan segera mengeceknya</p>
                                </div>
                            </div>
                            <div id="anConfirm" >
                                <img class="booky-confirm" src="../assets/read.gif" alt="confirm">
                                <div id="rev">
                                    <p>Naskah Anda sedang kami telaah</p><br>
                                    <p>Ditunggu ya!!</p><br>
                                    <?php
                                        $i = 1;
                                        while($dbConfirms = mysqli_fetch_array($dbConfirm)){ 
                                            $today = new DateTime($dbConfirms['created']);
                                            $today->modify('+3 days');
                                            $future_date = $today->format('Y-m-d');
                                        
                                        ?>
                                            <p style="display: none" id="<?= "conf" . $i; ?>"><?= "Silakan datang kembali paling telat pada tanggal <strong>" . $future_date . "</strong> sudah selesai kami telaah" ?></p>
                                    <?php $i++; 
                                        }
                                    ?>
                                </div>
                            </div>
                            <div id="anmeet">
                                <div id="meetone">Meeting, MoU dan Pembayaran</div>
                                <div id="meettwo">
                                    <p>Jadwal Meeting</p><br>
                                    <p>Anda mendapatkan jadwal meeting pada:</p>
                                    <div id="meetlist">
                                        <?php $meetjuu = 1; $meetjus = "meetids"; while($meetvalues = mysqli_fetch_array($meetvalue)) { 
                                            $meetgbng = $meetjus . $meetjuu;?>
                                            <div id="<?php echo $meetgbng ?>" class="naruto">
                                                <div class="">Tanggal</div>
                                                <div class="">:</div>
                                                <div class=""><?= $meetvalues['tanggal'] ?></div>
                                                <div class="">Jam</div>
                                                <div class="">:</div>
                                                <div class=""><?php echo $meetvalues['jam'] ?></div>
                                                <div class="">Link Zoom</div>
                                                <div class="">:</div>
                                                <div class=""><a href="<?php echo $meetvalues['link'] ?>" target="_blank"><?php echo $meetvalues['link'] ?></a></div>
                                                <div style="color: rgba(201, 64, 64, 0)">d</div>
                                                <div class="ubah-jadwal">
                                                    <div class="testinggg" style="margin-right: 20px">Ajukan perpindahan jadwal</div>
                                                    <form action="post/pengajuan.php" method="post">
                                                        <input type="text" name="idbuku" value="<?= $meetvalues['id_buku'] ?>" hidden>
                                                        <div id="tombolAjukan">Ajukan</div>
                                                        <div id="boxPengajuan" class="pengajuan">
                                                            <label for="tglPengajuan">Tgl</label>
                                                            <input type="date" id="tglPengajuan" name="tglpengajuan">
                                                            <label for="jamPengajuan">Jam</label>
                                                            <input type="time" id="jamPengajuan" name="jampengajuan">
                                                            <div></div>
                                                            <button type="submit" name="ajukan">ajukan</button>
                                                            <img id="closePengajuan" src="../assets/close.png" alt="">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <?php $meetjuu = $meetjuu + 1 ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php $dsnjuu = 1; $dsnjus = "dsnids"; while($disinis = mysqli_fetch_array($disini)) { 
                                    $dsngbng = $dsnjus . $dsnjuu; ?>
                                    <div id="<?php echo $dsngbng ?>" class="meetthree"><br>
                                        Untuk mengunduh kontrak kerjasama silakan klik <a style="color: blue" href="control/downmou.php?file=<?php echo $disinis['mou_draft'] ?>" target="_blank">di sini. </a>MoU ini ditandatangi oleh salah satu perwakilan dari penulis. MoU ditandatangani menggunakan materai Rp. 10,000, kemudian discan dan diunggah pada halaman berikutnya.
                                    </div>
                                    <?php $dsnjuu = $dsnjuu + 1 ?>
                                <?php } ?>
                            </div>
                            <div id="anmou">
                                <div class="lds-ellipsis">
                                    <?php if(isset($_GET['up'])){ ?>
                                        <p id="ppp">MoU sudah diunggah</p>
                                    <?php } else if (isset($_GET['in'])) { ?>
                                        <p id="ppp">MoU Anda sudah terunggah sebelumnya. </p>
                                    <?php } else { ?>
                                        <p id="ppp">Silakan unggah MoU Anda</p>
                                    <?php } ?>
                                </div>
                                <div id="isimou">
                                    <form action="control/upmou.php" method="post" id="mouupload" enctype="multipart/form-data">
                                        <label for="input-mou-upload" id="dropcontainer">
                                            <span id="droptitle">Drop files here</span>
                                            or
                                            <input type="file" name="file" id="inputmouupload">
                                            <input type="text" name="id-book" value="<?php echo $idpenulis ?>" hidden>
                                            <input type="text" value="1" id="masukanSini" name="idBukunya" hidden>
                                        </label>
                                        <button id="send" type="submit" name="send">Kirim</button>                                             
                                    </form>
                                </div> 
                            </div>
                            <div id="anedit">
                                <div class="layouting">
                                    <img class="booky-edit" src="../assets/editing.gif" alt="">
                                </div>
                                <div id="informasi">
                                    <p>Tim editing dan layouting kami sedang mengerjakan naskah Anda!</p>
                                    <p>Ditunggu ya!</p>
                                </div>
                            </div>
                            <div id="anisbn">
                                <div id="press" style="display: none;">
                                    <div>S</div>
                                    <div>S</div>
                                    <div>E</div>
                                    <div>R</div>
                                    <div>P</div>
                                    <div class=""></div>
                                    <div>B</div>
                                    <div>T</div>
                                    <div>I</div>
                                </div>
                                <div class="dots-bars-6"></div>
                                <div id="informasi">
                                    <p>ISBN dan E-ISBN Anda sedang di daftarkan</p>
                                    <p>Tunggu informasi selanjutnya!</p>
                                </div>
                            </div>
                            <div id="anproduksi">
                                <div class="produksi_cogs">
                                    <div class='COGfirst'>
                                        <div class='firstPart'></div>
                                        <div class='firstPart'></div>
                                        <div class='firstPart'></div>
                                        <div class='firstHole'></div>
                                    </div>
                                    <div class='COGsecond'>
                                        <div class='secondPart'></div>
                                        <div class='secondPart'></div>
                                        <div class='secondPart'></div>
                                        <div class='secondHole'></div>
                                    </div>
                                    <div class='COGthird'>
                                        <div class='thirdPart'></div>
                                        <div class='thirdPart'></div>
                                        <div class='thirdPart'></div>
                                        <div class='thirdHole'></div>
                                    </div>
                                </div>
                                <div id="informasi">Naskah Anda sedang kami produksi</div>
                            </div>
                            <div id="anrej">
                                <div id="icon"></div>
                                <div id="text">Maaf naskah Anda kami tolak dengan melihat beberapa pertimbangan.</div>
                                <div id="text">Lihat penyebab penolakan naskah <a href=""> di sini</a></div>
                            </div>
                            <div id="andone">
                                <div class="pesawat"></div>
                                <div id="informasi">Selamat naskah Anda sudah terbit, silakan cek <a href="https://www.itbpress.id/" target="_blank">di sini</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="childNaskah" class="child-naskah">
                    <div id="kategori">
                        <div id="bxkate">
                            <li id="jdlkate" onclick="fjdlkate()">Tahun Terbit</li>
                            <div id="isikate">
                                <div id="kakate" onclick="fkakate(this)">2023</div>
                                <!-- <?php while($katess = mysqli_fetch_array($katekate)) { ?>
                                    <div id="kotate"></div>
                                    <div id="kakate" onclick="fkakate(this)"><?php echo substr($katess['created'],0,4) ?></div>
                                <?php } ?> -->
                            </div>
                        </div>
                    </div>
                    <div id="buku">
                        <div id="kate">
                            <div id="kates">Semua</div>
                            <div id="liness"></div>
                            <div id="next">
                                <div id="pref"><</div>
                                <div id="nom">1</div>
                                <div id="nex">></div>
                            </div>
                        </div>
                        <div id="boke">
                            <?php
                                $nom = 1; 
                                while($bukudone = mysqli_fetch_array($dbbukudone)) { 
                                    $judul = $bukudone['judul'];
                            ?>
                                        <div id="boxbook">
                                            <img src="../files/cover.jpg" alt="">
                                            <div id="bookjudul"><?php echo substr($judul, 0, 25) ?></div>
                                            <div id="bookpenulis">
                                                <?php
                                                    $dbbukudonejudul = mysqli_query($conn, "SELECT * FROM buku_done WHERE judul = '$judul' ");
                                                    $dbbukudonecount = mysqli_query($conn, "SELECT COUNT(*) FROM buku_done WHERE judul = '$judul' ");
                                                    $count = mysqli_fetch_array($dbbukudonecount);
                                                    $num = $count['COUNT(*)'];
                                                    while($bukudonejudul = mysqli_fetch_array($dbbukudonejudul) ) {
                                                        echo $bukudonejudul['penulis'];
                                                        if($num >= 2) {
                                                            echo ", ";
                                                            $num--;
                                                        }
                                                    } ?>
                                            </div>
                                        </div>
                                        <?php if($nom <= 4) { ?>
                                            <div id="lines"></div>
                                        <?php } ?>
                                        <?php if($nom == 5) { ?>
                                            <div id="liness"></div>
                                            <div id="liness"></div>
                                            <div id="liness"></div>
                                            <div id="liness"></div>
                                            <div id="liness"></div>
                                            <div id="liness"></div>
                                            <div id="liness"></div>
                                            <div id="liness"></div>
                                            <div id="liness"></div>
                                        <?php } ?>
                                        <?php if($nom >= 6) { ?>
                                            <div id="lines"></div>
                                        <?php } ?>
                            <?php $nom++; } ?>
                        </div>
                    </div>
                </div>
                <div id="childGuidelines" class="child-guidelines">
                    <div id="struktur">
                        <div id="logo"></div>
                        <div id="strukturs">
                            <div style="cursor: pointer; font-size: 12px" onclick="ssone(this)" id="sone">Anatomi Buku</div>
                            <div style="cursor: pointer; font-size: 12px" onclick="sstwo(this)" id="stwo">Panduan Umum</div>
                            <div style="cursor: pointer; font-size: 12px" onclick="ssthree(this)" id="sthree">Templat Ukuran Buku</div>
                            <div style="cursor: pointer; font-size: 12px" onclick="ssfive(this)" id="sfive">Penggunaan Templat</div>
                            <div style="cursor: pointer; font-size: 12px" onclick="ssfour(this)"  id="sfour">Waktu pengerjaan</div>
                            <div style="cursor: pointer; font-size: 12px" onclick="ssseven(this)" >Panduan Khusus</div>
                        </div>
                    </div>
                    <div id="isi">
                        <h2 id="h1">Panduan Penerbitan Buku secara Daring</h2>
                        <div id="ione">
                            <div id="iones">
                                <css>
                                    <h3>Preliminaries</h3><br>
                                    <li>Halaman prancis</li>
                                    <li>Kover dalam</li>
                                    <li>Katalog dalam Terbitan (KDT)</li>
                                    <li>Kata pengantar (jika perlu)</li>
                                    <li>Prakata (pengantar dari penulis)</li>
                                    <li>Daftar isi</li>
                                    <li>Daftar gambar (jika ada)</li>
                                    <li>Daftar tabel (jika ada)</li>
                                </css>
                            </div>
                            <div id="iones">
                                <css>
                                    <h3>Isi</h3><br>
                                    <h5>Bab 1</h5>
                                    <h6>(Judul Bab)</h6>
                                    <p>.........................................................................</p>
                                    <p>.........................................................................</p>
                                    <p>1.1 ...................................................................</p>
                                    <p>......................................................................</p>
                                    <p>a. ................................................................</p>
                                    <p>1) ............................................................</p>
                                    <p>a) .........................................................</p>
                                </css>
                            </div>
                            <div id="iones">
                                <css>
                                    <h3>Postliminaries</h3><br>
                                    <li>Indeks</li>
                                    <li>Daftar pustaka</li>
                                    <li>Profil penulis</li>
                                    <li>Lampiran (jika ada)</li><br>
                                    <h3>Sinopsis</h3><br>
                                    <sc>Sinopsis berisi rangkuman singkat dari isi</sc>
                                    <sc>buku yang akan dicantumkan di bagian</sc>
                                    <sc>belakang kover dan di website.</sc>
                                </css>
                            </div>
                        </div>
                        <div id="itwo">
                            <h3>Panduan Umum</h3><br>
                            <h4>Draf naskah yang Anda unggah sebaiknya memenuhi berikut ini:</h4><br>
                            <scr id="scr">
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Penulis sudah memastikan kelengkapan buku: preliminaries, isi, dan postliminaries.</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Isi dari draft naskah yang akan dikirimkan ke penerbit minimal 49 halaman (bagian isi).</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Font isi menggunakan font 11 point, margin 2 (kiri, kanan, atas, bawah) dengan spasi 1,5 atau setara dengan kurang lebih 14.000 kata, terhitung dari bab awal sampai dengan bab akhir (isi).</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Draf naskah telah final: naskah yang dikirimkan tidak akan mengalami perubahan mayor.</scc>
                            </scr><br>
                            <p style="line-height: 2; word-spacing: 5px;">Persyaratan di atas berdasarkan pada UU No. 3 tahun 2017 dan Permendikbudristek No. 25 tahun 2022.</p>
                        </div>
                        <div id="ithree">
                            <h3>Templat Ukuran Buku</h3><br>
                            <p style="line-height: 2; word-spacing: 5px;">Jika dalam naskah Anda terdapat banyak gambar atau tabel, kami sarankan Anda menggunakan ukuran buku B5. Berikut adalah contoh penggunaan ukuran buku.</p>
                            <scr id="scr">
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">A4 sering digunakan untuk prosiding</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">A5 sering digunakan untuk novel, antologi puisi, atau buku umum.</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">B5 sering digunakan untuk buku ajar</scc>
                            </scr><br>
                            <p style="line-height: 2; word-spacing: 5px;">Anda dapat mengunduh dan menggunakan templat naskah Word  yang telah kami sediakan.</p>
                            <scr id="scr">
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;"><a href="control/downtemp.php?file=template-A4-ITBPress-ver.4.docx" target="_blank">Templat buku A4 (29,7 x 21 cm)</a></scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;"><a href="control/downtemp.php?file=template-A5-ITBPress-ver.4.docx" target="_blank">Templat buku A5 (14,8 x 21 cm)</a></scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;"><a href="control/downtemp.php?file=template-B5-ITBPress-ver.4.docx" target="_blank">Templat buku B5 (17,6 x 25 cm)</a></scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;"><a href="control/downtemp.php?file=template-Unesco-ITBPress-ver.4.docx" target="_blank">Templat buku unesco (15,5 x 23 cm)</a></scc>
                            </scr><br>
                            <p>Buku yang berukuran custom dapat langsung Anda unggah. Jika naskah Anda sudah di-layout maka ikuti petunjuk Panduan Khusus</p>
                        </div>
                        <div id="ifour">
                            <h3>Waktu Pengerjaan</h3><br>
                            <p style="line-height: 2; word-spacing: 5px;">Jika MoU dan surat keaslian naskah sudah ditandatangani, naskah akan dimasukkan dalam antrean. Setelah melalui antrean, proses penerbitan dan percetakan dilakukan dalam sebulan.</p>
                        </div>
                        <div id="ifive">
                            <h3>Penggunaan Templat</h3><br>
                            <p style="line-height: 2; word-spacing: 5px;">Jika naskah Anda sudah ada dan akan menggunakan Templat yang kami sediakan. Maka lakukanlah hal-hal berikut ini:</p>
                            <scr id="scr">
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Pastikan Templat yang Anda unduh sesuai dengan ukuran yang dibutuhkan.</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Buka file Templat yang telah Anda unduh</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Ikuti petunjuk dan penjelasan yang ada pada Templat</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Jika petunjuk sudah dipahami maka buka file naskah Anda dan salin tulisan per bagian pada naskah Anda lalu tempelkan pada Templat sesuai dengan kebutuhan.</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Cara menempelkan hasil salinan supaya tidak mengubah formatnya seprti: italik, bold, dan uppercase atau lowercase yaitu dengan memilih “Menggabungkan Format atau Merge Formatting”</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Penjelasan mengenai tipe salinan:</scc>
                                <img src="../assets/panduantemplat.png" alt="panduantemplat">
                            </scr><br>
                        </div>
                    </div>
                </div>
                <div id="childGuidelines2x">
                    <div id="struktur">
                        <div id="logo"></div>
                        <div id="strukturs">
                            <div style="cursor: pointer;  font-size: 12px" onclick="wwone(this)" id="wone">Pengiriman</div>
                            <div style="cursor: pointer;  font-size: 12px" onclick="wwtwo(this)" id="wtwo">Color Profile</div>
                            <div style="cursor: pointer;  font-size: 12px" onclick="wwthree(this)" id="wthree">Margin</div>
                            <div style="cursor: pointer;  font-size: 12px" onclick="wwfour(this)" id="wfour">Bleed</div>
                            <div style="cursor: pointer;  font-size: 12px" onclick="wwfive(this)" id="wfive">Font dan Spasi</div>
                            <div style="cursor: pointer;  font-size: 12px" onclick="wwseven(this)">Panduan Umum</div>
                        </div>
                    </div>
                    <div id="isi">
                        <h2 id="h1">Panduan Mengirimkan Naskah yang Sudah Didesain</h2>
                        <div id="vone">
                            <p style="line-height: 2; word-spacing: 5px;">Jika Anda mengirimkan naskah yang sudah didesain dan di-layout dalam program lain, seperti InDesign, Latex, atau AffinityPublisher, Anda dapat mengikuti panduan berikut.</p><br>
                            <scr id="scr">
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">File di-package untuk menghindari missing font dan gambar</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Gambar dan tabel di dalam naskah harus editable atau melampirkan softfile-nya</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Hasil package dikirimkan dalam format “.rar”</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Mengikuti panduan <hjk style="cursor: pointer" onclick="wwtwo(this)"> Color Profile </hjk></scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Mengikuti panduan <hjk style="cursor: pointer" onclick="wwthree(this)"> Margin </hjk></scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Mengikuti panduan <hjk style="cursor: pointer" onclick="wwfour(this)"> Bleed </hjk></scc>
                            </scr><br>
                        </div>
                        <div id="vtwo">
                            <h4>Color Profile</h4><br>
                            <p style="line-height: 2; word-spacing: 5px;">Semua gambar termasuk tulisan pada naskah menggunakan color profile CMYK (Color default percetakan) bukan RGB (Color default digital) supaya tidak terjadi perbedaan warna di digital dan hasil cetakan.</p><br>
                            <jio id="colorprofile">
                                <jio>
                                    <p>Contoh pengecekkan color profile pada aplikasi InDesign:</p><br>
                                    <img class="panduan1-gambar" src="../assets/panduan1.png" alt="">
                                </jio>
                                <jio>
                                    <p>Contoh konversi color profile gambar menggunakan aplikasi Photoshop:</p><br>
                                    <img class="panduan2-gambar" src="../assets/panduan2.png" alt="">
                                </jio>
                            </jio>
                        </div>
                        <div id="vthree">
                            <h4>Margin</h4><br>
                            <p style="line-height: 2; word-spacing: 5px;">Untuk buku yang berukuran B5 (17,6 x 25 cm), Unesco (15,5 x 23 cm), dan A5 (14,8 x 21 cm) gunakan margin (Outside: 2cm, Inside: 2,5cm, Page numbering [Top/Bottom]: 2,5cm, dan Top/Bottom: 2cm )</p><br>
                            <jio id="colorprofile">
                                <jio>
                                    <p>Contoh pada aplikasi InDesign:</p><br>
                                    <img class="panduan3-gambar" src="../assets/panduan3.png" alt="">
                                </jio>
                                <jio>
                                    <p>Contoh implementasi:</p><br>
                                    <img class="panduan2-gambar" src="../assets/panduan4.png" alt="">
                                </jio>
                            </jio>
                        </div>
                        <div id="vfour">
                            <h4>Bleed</h4><br>
                            <p style="line-height: 2; word-spacing: 5px;">Gunakan bleed 3mm di setiap sisi agar pada saat proses pencetakan tidak ada white space pada kertas apabila layout halman menggunakan background/gambar.</p><br>
                            <jio id="colorprofile">
                                <jio>
                                    <p>Contoh pada aplikasi InDesign:</p><br>
                                    <img class="panduan5-gambar" src="../assets/panduan5.png" alt="">
                                </jio>
                                <jio>
                                    <p>Contoh implementasi:</p><br>
                                    <img class="panduan6-gambar" src="../assets/panduan6.png" alt="">
                                </jio>
                            </jio>
                        </div>
                        <div id="vfive">
                            <p style="line-height: 2; word-spacing: 5px;">Gunakan font yang memliki legalitas. Untuk font yang gratis kami sarankan menggunakan font yang ada pada <a href="https://fonts.google.com/" target="_blank">https://fonts.google.com/.</a>Gunakan font yang mudah dibaca. Apabila naskah diperuntukkan untuk kegiatan akademik, maka gunakan font dengan kategori Serif.</p><br>
                            <scr id="scr">
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Isi (konten) menggunakan font berukuran 11 pt dan spasi 14-15 pt.</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Heading atau judul menggunakan font berukuran 18 - 24pt.</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Subjudul menggunakan font berukuran 16-18pt.</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Subsubjudul menggunakan font berukuran 14-16pt.</scc>
                                <scd></scd>
                                <scc style="line-height: 2; word-spacing: 5px;">Judul gambar, judul tabel, keterangan, dan sumber menggunakan font berukuran 8-9pt.</scc>
                            </scr><br>
                        </div>
                    </div>
                </div>
                <div id="child-unggah" style="display: none;"></div>
                <div id="panduanGanda" class="panduan-ganda">
                    <div id="gandaUmum" class="ganda-umum">Panduan Umum</div>
                    <div id="gandaKhusus" class="ganda-khusus">Panduan Khusus</div>
                </div>
            </div>
        </div>
    </div>

    <div class="tablet-portrait">
        <h1>Silakan putar tablet Anda</h1>
        <img class="rotate-tablet" src="../assets/booky.png" alt="">
        <img class="rotate-web" src="../assets/rotate.webp" alt="" >
    </div>

    <div class="mobile-landscape">
        <h1>Silakan putar mobile Anda</h1>
        <img class="rotate-booky" src="../assets/booky.png" alt="">
        <img class="rotate-webp" src="../assets/rotate.webp" alt="" >
    </div>

    <!-- script -->
    <script>
        // chart kota
        new Chart(document.getElementById('barkota'), {
            type: 'bar',
            data: {
                labels: [<?php while ($p = mysqli_fetch_array($kota)) { echo '"' . $p['kota'] . '",';}?>],
                datasets: [{
                    label: "Penjualan / Kota",
                    data: [<?php while ($q = mysqli_fetch_array($kotas)) { echo '"' . $q['qty'] . '",';}?>],
                    borderWidth: 1,
                    borderRadius: 15,
                    backgroundColor: "rgba(0, 84, 163, 0.7)",
                }]
            },
            options: {
                indexAxis: 'y',
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                responsive: true,
            }
        });
        // chart buku
        new Chart(document.getElementById('barbuku'), {
            type: 'bar',
            data: {
                labels: ['itbpress', 'moco', 'tokopedia'],
                    datasets: [{
                    label: "Penjualan / Media",
                    data: [<?php while ($t = mysqli_fetch_array($online)) { echo '"' . $t['total'] . '",';}?>],
                    borderWidth: 1,
                    borderRadius: 15,
                    backgroundColor: ['#0054A3', 'rgba(92, 178, 81, 0.5)', 'rgba(215, 32, 56, 0.5)', 'rgba(217, 66, 255, 0.5)', 'rgba(255, 247, 66, 0.5)'],
                }]
            },
            options: {
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                responsive: true,
            }
        });
        // chart royalti
        new Chart(document.getElementById('barroyalti'), {
            type: 'line',
            data: {
                <?php
                    if(isset($_GET['1aS'])) { $getSemester = $_GET['1aS']; }else { $getSemester = 1; }
                    if(isset($_GET['2aS'])){ $getTahunSatu = $_GET['2aS']; } else { $getTahunSatu = 2023; }
                    if(isset($_GET['3aS'])){ $getTahunDua = $_GET['3aS']; } else { $getTahunDua = 2023; }
                ?>
                labels: [<?php echo semester($getSemester); ?>],
                datasets: [{
                    label: "Royalti / Semester",
                    data: [<?php echo tahunSatu($getSemester, $getTahunSatu) ?>],
                    borderWidth: 3,
                    borderColor: '#0054A3',
                    backgroundColor: "#0054A3",
                }, {
                    label: "Royalti / Semester",
                    data: [<?php echo tahunSatu($getSemester, $getTahunDua) ?>],
                    borderWidth: 3,
                    borderColor: '#2ECC71',
                    backgroundColor: "#2ECC71",
                }]
            },
            options: {
                radius: 5,
                elements: {
                    bar: {
                        borderWidth: 1,
                    }
                },
                responsive: true,
            }
        });
        // chart media
        new Chart(document.getElementById('barmedia'), {
            type: 'bar',
            data: {
                labels: [<?php while ($r = mysqli_fetch_array($jual)) { echo '"' . $r['judul'] . '",';}?>],
                datasets: [{
                    label: "Penjualan / Buku",
                    data: [<?php while ($s = mysqli_fetch_array($juals)) { echo '"' . $s['qty'] . '",';}?>],
                    borderWidth: 1,
                    borderRadius: 15,
                    backgroundColor: "rgba(0, 84, 163, 0.7)",
                }]
            },
            options: {
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                responsive: true,
            }
        });
    </script>    
    <script src="script/script.js"></script>
    <script src="script/newscript.js"></script>
    <script src="script/xother.js"></script>
    <script>friww()</script>

    <!-- control -->
    <?php if(!empty($diss)) { ?>
        <?php if($diss == "Review") { ?> <script> document.getElementById('anreview').style.display = "grid"; </script> <?php }?>
        <?php if($diss == "Confirm") { ?> <script> document.getElementById('anreview').style.display = "grid"; </script> <?php }?>
        <?php if($diss == "Meet") { ?> <script> document.getElementById('anmeet').style.display = "grid"; </script> <?php }?>
        <?php if($diss == "MoU") { ?> <script> document.getElementById('anmou').style.display = "grid"; </script> <?php }?>
        <?php if($diss == "Editing & Layouting") { ?> <script> document.getElementById('anedit').style.display = "grid"; </script> <?php }?>
        <?php if($diss == "Pendaftaran ISBN") { ?> <script> document.getElementById('anisbn').style.display = "grid"; </script> <?php }?>
        <?php if($diss == "Produksi") { ?> <script> document.getElementById('anproduksi').style.display = "grid"; </script> <?php }?>
        <?php if($diss == "Publish") { ?> <script> document.getElementById('andone').style.display = "grid"; </script> <?php }?>
        <?php if($diss == "Rejected") { ?> <script> document.getElementById('anrej').style.display = "grid"; </script> <?php }?>
    <?php } ?>
    <?php if(isset($_GET['profile'])) { ?> <script>onProfil()</script> <?php } ?>
    <?php if(isset($_GET['judul'])) { ?> <script>navBiaya();tambahanBackground.style.top = "calc(25px + 70px)";funcChildBiaya();</script> <?php } ?>
    <?php if(isset($_GET['status'])) { ?> <script>navStatus();tambahanBackground.style.top = "calc(25px + 70px * 2)";funcchildBiaya();</script> <?php } ?>
    <script>seljud()</script>
</body>
</html>