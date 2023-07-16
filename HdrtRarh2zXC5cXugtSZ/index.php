<?php require('../db.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/drag.js" defer></script>
    <script src="js/todo.js" defer></script>
    <title>Publishing</title>
    <link rel="shortcut icon" href="../assets/logotitle.png" type="image/x-icon">
  </head>
  <body>
    <div class="detail-task" id="detailTask">
      <div class="task-output" id="taskOutput">
        <div class="isi-task" id="isiTask">
          <?php if(isset($_GET['2aSn'])){ ?> 
            <div class="judul"><?php echo $_GET['2aSn'] ?></div>
          <?php } ?>
          <?php if(isset($_GET['1aSn'])){ ?> 
            <div class="penulis"><?php echo $_GET['1aSn'] ?></div>
          <?php } ?>
          <div class="kategori grid">
            <label for="kategori">Kategori Buku</label>
            <div>:</div>
            <?php if(isset($_GET['4aSn'])){ ?> 
              <input type="text" name="kategori" id="kategori" value="<?php echo $_GET['4aSn'] ?>">
            <?php } ?>
          </div>
          <div class="penulis grid">
            <label for="penulis">Penulis</label>
            <div>:</div>
            <?php if(isset($_GET['3aSn'])){ ?> 
              <input type="text" name="penulis" id="penulis" value="<?php echo $_GET['3aSn'] ?>">
            <?php } ?>
          </div>
          <div class="file grid">
            <label for="file">File</label>
            <div>:</div>
            <div class="linkNew">
                <?php if(isset($_GET['7aSn'])){ ?> 
                  <button><a href="download_file.php?file=<?php echo $_GET['7aSn'] ?>" target="_blank">Cek File</a></button>
                  <div style="margin-left: 10px"><?php echo $_GET['7aSn']; ?></div>
                <?php } else { ?>
                  <button disabled><a href="" aria-disabled>Cek File</a></button>
                <?php } ?>
            </div>
          </div>
          <div class="link grid">
            <label for="link">Link Buku</label>
            <div>:</div>
            <div class="linkNew">
                <?php if(isset($_GET['8aSn'])){ ?> 
                  <button><a href="<?php echo $_GET['8aSn'] ?>" target="_blank">Cek Link</a></button>
                  <div style="margin-left: 10px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $_GET['8aSn']; ?></div>
                <?php } else { ?>
                  <button disabled><a href="" aria-disabled>Cek Link</a></button>
                <?php } ?>
            </div>
          </div>
          <div class="update grid">
            <div></div>
            <div></div>
            <button style="justify-self: end;   background-color: white; color: black;">Update</button>
          </div>
        </div>
        <div class="penulis-task" id="penulisTask">
          <div class="penulis">Penulis</div>
            <?php if(isset($_GET['6aSn'])) { ?>
              <img src="../files/<?php echo $_GET['6aSn'] ?>" alt="foto">
            <?php } ?>
          <div class="nama grid">
            <label for="nama">Nama Penulis</label>
            <div>:</div>
            <?php if(isset($_GET['1aSn'])) { ?>
              <input type="text" name="nama" id="nama" value="<?php echo $_GET['1aSn'] ?>">
            <?php } ?>
          </div>
          <div class="kontak grid">
            <label for="kontak">Kontak</label>
            <div>:</div>
            <?php if(isset($_GET['2aSn'])) { ?>
              <input type="text" name="kontak" id="kontak" value="<?php echo $_GET['2aSn'] ?>">
            <?php } ?>
          </div>
          <div class="instansi grid">
            <label for="instansi">Instantsi</label>
            <div>:</div>
            <?php if(isset($_GET['3aSn'])) { ?>
              <input type="text" name="instansi" id="instansi" value="<?php echo $_GET['3aSn'] ?>">
            <?php } ?>
          </div>
          <div class="jabatan grid">
            <label for="nama">Jabatan</label>
            <div>:</div>
            <?php if(isset($_GET['4aSn'])) { ?>
              <input type="text" name="jabatan" id="jabatan" value="<?php echo $_GET['4aSn'] ?>">
            <?php } ?>
          </div>
          <div class="kontak-lain grid">
            <label for="kontakLain">Kontak Lain</label>
            <div>:</div>
            <?php if(isset($_GET['5aSn'])) { ?>
              <input type="text" name="kontakLain" id="kontakLain" value="<?php echo $_GET['5aSn'] ?>">
            <?php } ?>
          </div>
          <!--<div class="biografi grid">-->
          <!--  <label style="align-self: flex-start; margin-top: 5px;" for="biografi">Biografi</label>-->
          <!--  <div style="align-self: flex-start; margin-top: 5px;">:</div>-->
          <!--  <?php if(isset($_GET['7aSn'])) { ?>-->
          <!--    <textarea name="biografi" id="biografi" cols="30" rows="3" ><?php echo $_GET['7aSn'] ?></textarea>-->
          <!--  <?php } ?>-->
          <!--</div>-->
          <div></div>
        </div>
        <form action="php/form.php" method="post" class="task-progres" id="taskProgres" enctype="multipart/form-data">
          <div class="Progres">Progres</div>
          <?php if(isset($_GET['3aSn'])) { ?>
            <div class="judul"><?php echo $_GET['3aSn'] ?></div>
          <?php } ?>
          <div class="Telaah grid">
            <input type="checkbox" id="telaahTask" name="telaah" onchange="lihatRincian(1);">
            <div>:</div>
            <div id="telaahMe">Telaah</div>
            <div class="submit" id="submitTelaah" onclick="submitOke(1)"></div>
          </div>
          <div class="meet grid">
            <input type="checkbox" id="meetTask" name="meet" onchange="lihatRincian(2);">
            <div>:</div>
            <div id="meetMe">Meet</div>
            <div class="submit" id="submitMeet" onclick="submitOke(2)"></div>
          </div>
          <div class="mou grid">
            <input type="checkbox" id="mouTask" name="mou" onchange="lihatRincian(3);">
            <div>:</div>
            <div id="mouMe">MoU</div>
            <div class="submit" id="submitMou" onclick="submitOke(3)"></div>
          </div>
          <div class="edit grid">
            <input type="checkbox" id="editTask" name="edit" onchange="lihatRincian(4);">
            <div>:</div>
            <div id="editMe">Editing & Layouting</div>
            <div class="submit" id="submitEdit" onclick="submitOke(4)"></div>
          </div>
          <div class="isbn grid">
            <input type="checkbox" id="isbnTask" name="isbn" onchange="lihatRincian(5);">
            <div>:</div>
            <div id="isbnMe">Pendaftaran ISBN</div>
            <div class="submit" id="submitIsbn" onclick="submitOke(5)"></div>
          </div>
          <div class="produksi grid">
            <input type="checkbox" id="produksiTask" name="produksi" onchange="lihatRincian(6);">
            <div>:</div>
            <div id="produksiMe">Produksi</div>
            <div class="submit" id="submitProduksi" onclick="submitOke(6)"></div>
          </div>
          <button type="submit" class="tolak" name="submitTolak">Tolak</button>
          <div class="oke-oke">
            <div class="telaahOke okes" id="telaahOke">
              <div class="judul">Telaah</div>
              <div>
                <?php if(isset($_GET['4aSn'])) {?>
                  <div class="file"><a href="download_file.php?file=<?php echo $_GET['4aSn'] ?>" target="_blank">Cek File</a></div>
                  <div class="link"><a href="<?php echo $_GET['5aSn'] ?>" target="_blank">Cek Link</a></div>
                <?php } ?>
              </div>
              <div class="close" onclick="submitClose(1)"></div>
            </div>
            <div class="meetOke okes" id="meetOke">
              <div class="judul">Meet</div>
              <div class="okegrid">
                <?php if(isset($_GET['1aSn'])) { ?>
                  <?php $idBuku = $_GET['1aSn']; $linkMeet = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM link WHERE id_buku = '$idBuku' ORDER BY id_link DESC LIMIT 1")) ?>
                  <input type="text" name="idBuku" value="<?php echo $_GET['1aSn'] ?>" hidden><div></div><div></div><div></div><div></div>
                  <label for="tanggal">Tanggal</label>
                  <div>:</div>
                  <input type="date" name="tanggalMeet" value="<?php echo $linkMeet['tanggal']?>">
                  <div></div>
                  <label for="jam">Jam</label>
                  <div>:</div>
                  <input type="time" name="jamMeet" value="<?php echo $linkMeet['jam'] ?>">
                  <div></div>
                  <label for="link">Link Zoom</label>
                  <div>:</div>
                  <input type="text" name="linkMeet" value="<?php echo $linkMeet['link'] ?>">
                  <div></div>
                  <label for="fileMou">File MoU</label>
                  <div>:</div>
                  <input type="file" name="fileMeet">
                  <?php if($linkMeet['mou_draft'] == "kosong"){?>
                    <div><a class="fileMou" href="" target="_blank" hidden>Cek MoU</a></div>
                  <?php } else { ?>
                    <div><a class="fileMou" href="download_mou.php?file=<?php echo $linkMeet['mou_draft'] ?>" target="_blank">Cek MoU</a></div>
                  <?php } ?>
                  <div></div>
                <?php } ?>
              </div>
              <input type="submit" name="submitOkeMeet" value="Update">
              <div class="close" onclick="submitClose(2)"></div>
            </div>
            <div class="mouOke okes" id="mouOke">
              <div class="judul">MoU</div>
              <div class="okegrid">
                <?php if(isset($_GET['1aSn'])) { ?>
                  <?php $idBuku = $_GET['1aSn']; $fileMou = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mou WHERE id_buku = '$idBuku' ORDER BY id_buku DESC LIMIT 1")) ?>
                  <label for="">MoU Buku</label>
                  <div>:</div>
                  <?php if(!empty($fileMou['file'])){?>
                    <div><a class="mouDone" href="download_mou.php?file=<?php echo $fileMou['file'] ?>" target="_blank">Cek MoU Penulis</a></div>
                  <?php } else { ?>
                    <div><a class="fileMou" href="" target="_blank">MoU Belum Ada</a></div>
                  <?php } ?>
                  <div></div>
                <?php } ?>
              </div>
              <input type="submit" name="submitOkeMou" value="Update"hidden>
              <div class="close" onclick="submitClose(3)"></div>
            </div>
            <div class="editOke okes" id="editOke">
              <div class="judul">Editing & Layouting</div>
              <div></div>
              <input type="submit" name="submitOkeEdit" value="Update" hidden>
              <div class="close" onclick="submitClose(4)"></div>
            </div>
            <div class="isbnOke okes" id="isbnOke">
              <div class="judul">Pendaftaran ISBN</div>
              <div class="okegrid">
                <?php if(isset($_GET['1aSn'])) { ?>
                  <?php $idBuku = $_GET['1aSn']; $isbn = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$idBuku' ORDER BY id_buku DESC LIMIT 1")) ?>
                  <input type="text" name="idBukuIsbn" value="<?php echo $_GET['1aSn'] ?>" hidden><div></div><div></div><div></div><div></div>
                  <?php if($isbn['isbn'] != "no" ) { ?>
                    <label for="isbn">ISBN</label>
                    <div>:</div>
                    <input type="text" name="isbnBuku" value="<?php echo $isbn['isbn']?>">
                    <div></div>
                  <?php } else { ?>
                    <input type="text" name="isbnBuku" value="no" hidden>
                  <?php } ?>
                  <?php if($isbn['e_isbn'] != "no" ) { ?>
                    <label for="eisbn">E-ISBN</label>
                    <div>:</div>
                    <input type="text" name="eisbnBuku" value="<?php echo $isbn['e_isbn'] ?>">
                    <div></div>
                  <?php } else { ?>
                    <input type="text" name="eisbnBuku" value="no" hidden>
                  <?php } ?>
                  <?php $i = 1; while ($i <= 16) {?> 
                    <div></div>
                  <?php $i++; } ?>
                <?php } ?>
              </div>
              <input type="submit" name="submitOkeIsbn" value="Update">
              <div class="close" onclick="submitClose(5)"></div>
            </div>
            <div class="produksiOke okes" id="produksiOke">
              <div class="judul">Produksi</div>
              <div></div>
              <input type="submit" name="submitOkeProduksi" value="Update" hidden>
              <div class="close" onclick="submitClose(6)"></div>
            </div>
          </div>
        </form>
      </div>
      <div class="backgound-task" id="backgroundTask" onclick="hide()"></div>
    </div>
    <div class="board">
      <div class="lanes">

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">Naskah Baru</h3>
          <?php $naskahNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'Review' ORDER BY id_buku DESC");
            while($naskahBaru = mysqli_fetch_array($naskahNew)) { ?>
            <form action="php/form.php" method="post" class="task">
              <div class="judul"><?php echo $naskahBaru['judul'] ?></div>
              <div class="penulis"><?php echo $naskahBaru['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $naskahBaru['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                </div>
                <input type="submit" name="submitSelesai" class="selesai" value="review">
              </div>
            </form>
          <?php } ?>
        </div>

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">Telaah</h3>
          <?php $telaahNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'Confirm' ORDER BY id_buku DESC");
            while($telaah = mysqli_fetch_array($telaahNew)) { ?>
            <form action="php/form.php" method="post" class="task">
              <div class="judul"><?php echo $telaah['judul'] ?></div>
              <div class="penulis"><?php echo $telaah['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $telaah['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                  <input type="submit" name="submitProgres" class="progres" value="progres">
                </div>
                <input type="submit" name="submitSelesai" class="selesai" value="confirm">
              </div>
            </form>
          <?php } ?>
        </div>

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">Meet</h3>
          <?php $meetNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'Meet' ORDER BY id_buku DESC");
            while($meet = mysqli_fetch_array($meetNew)) { ?>
            <?php 
              $idBukuMeet = $meet['id_buku'];
              $cekTanggal = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM link WHERE id_buku = $idBukuMeet ORDER BY id_link DESC LIMIT 1"));
              $targetDate = $cekTanggal['tanggal'];
              $currentDate = date("Y-m-d");
            ?>
            <?php if(empty($targetDate)) { ?>
              <form action="php/form.php" method="post" class="task">
            <?php } else if($currentDate < $targetDate) {?>
              <form action="php/form.php" method="post" class="task" style="background: linear-gradient(to right, blue 7px, white 7px, white 100px);">
            <?php } else if($currentDate == $targetDate) {?>
              <form action="php/form.php" method="post" class="task" style="background: linear-gradient(to right, green 7px, white 7px, white 100px);">
            <?php } else if($currentDate > $targetDate) {?>
              <form action="php/form.php" method="post" class="task" style="background: linear-gradient(to right, red 7px, white 7px, white 100px);">
            <?php } else {?>
              <form action="php/form.php" method="post" class="task">
            <?php } ?>
            <div class="judul"><?php echo $meet['judul'] ?></div>
              <div class="penulis"><?php echo $meet['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $meet['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                  <input type="submit" name="submitProgres" class="progres" value="progres">
                  <?php if($meet['pembayaran'] == "belum") { ?>
                    <input type="submit" name="submitBayar" class="belum" value="bayar">
                  <?php } else { ?>
                    <input type="submit" name="submitBayar" class="bayar" value="bayar" disabled>
                  <?php } ?>
                </div>
                <input type="submit" name="submitSelesai" class="selesai" value="meet">
              </div>
            </form>
          <?php } ?>
        </div>

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">MoU</h3>
          <?php $mouNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'MoU' ORDER BY id_buku DESC");
            while($mou = mysqli_fetch_array($mouNew)) { ?>
            <form action="php/form.php" method="post" class="task">
            <div class="judul"><?php echo $mou['judul'] ?></div>
              <div class="penulis"><?php echo $mou['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $mou['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                  <input type="submit" name="submitProgres" class="progres" value="progres">
                  <?php if($mou['pembayaran'] == "belum") { ?>
                    <input type="submit" name="submitBayar" class="belum" value="bayar">
                  <?php } else { ?>
                    <input type="submit" name="submitBayar" class="bayar" value="bayar" disabled>
                  <?php } ?>
                </div>
                <?php if($mou['pembayaran'] == "belum") { ?>
                    <input type="submit" name="submitSelesai" class="selesai" value="mou" disabled>
                  <?php } else { ?>
                    <input type="submit" name="submitSelesai" class="selesai" value="mou">
                  <?php } ?>
              </div>
            </form>
          <?php } ?>
        </div>

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">Editing & Layouting</h3>
          <?php $editingNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'Editing & Layouting' ORDER BY id_buku DESC");
            while($editing = mysqli_fetch_array($editingNew)) { ?>
            <form action="php/form.php" method="post" class="task">
              <div class="judul"><?php echo $editing['judul'] ?></div>
              <div class="penulis"><?php echo $editing['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $editing['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                  <input type="submit" name="submitProgres" class="progres" value="progres">
                </div>
                <input type="submit" name="submitSelesai" class="selesai" value="edit">
              </div>
            </form>
          <?php } ?>
        </div>

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">Pendaftaran ISBN</h3>
          <?php $isbnNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'Pendaftaran ISBN' ORDER BY id_buku DESC");
            while($isbn = mysqli_fetch_array($isbnNew)) { ?>
            <form action="php/form.php" method="post" class="task">
            <div class="judul"><?php echo $isbn['judul'] ?></div>
              <div class="penulis"><?php echo $isbn['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $isbn['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                  <input type="submit" name="submitProgres" class="progres" value="progres">
                </div>
                <input type="submit" name="submitSelesai" class="selesai" value="isbn">
              </div>
            </form>
          <?php } ?>
        </div>

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">Produksi</h3>
          <?php $produksiNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'Produksi' ORDER BY id_buku DESC");
            while($produksi = mysqli_fetch_array($produksiNew)) { ?>
            <form action="php/form.php" method="post" class="task">
            <div class="judul"><?php echo $produksi['judul'] ?></div>
              <div class="penulis"><?php echo $produksi['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $produksi['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                  <input type="submit" name="submitProgres" class="progres" value="progres">
                </div>
                <input type="submit" name="submitSelesai" class="selesai" value="produksi">
              </div>
            </form>
          <?php } ?>
        </div>

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">Publish</h3>
          <?php $publishNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'Publish' ORDER BY id_buku DESC");
            while($publish = mysqli_fetch_array($publishNew)) { ?>
            <form action="php/form.php" method="post" class="task">
            <div class="judul"><?php echo $publish['judul'] ?></div>
              <div class="penulis"><?php echo $publish['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $publish['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                  <input type="submit" name="submitProgres" class="progres" value="progres">
                </div>
              </div>
            </form>
          <?php } ?>
        </div>

        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">Tolak</h3>
          <?php $tolakNew = mysqli_query($conn, "SELECT * FROM buku WHERE status = 'Rejected' ORDER BY id_buku DESC");
            while($tolak = mysqli_fetch_array($tolakNew)) { ?>
            <form action="php/form.php" method="post" class="task">
            <div class="judul"><?php echo $tolak['judul'] ?></div>
              <div class="penulis"><?php echo $tolak['penulis'] ?> </div>
              <input type="number" name="idBuku" value="<?php echo $tolak['id_buku'] ?>" hidden>
              <div class="tombol">
                <div class="standar">
                  <input type="submit" name="submitBuku" class="detail-buku" value="buku">
                  <input type="submit" name="submitPenulis" class="detail-penulis" value="penulis">
                  <input type="submit" name="submitProgres" class="progres" value="progres">
                </div>
              </div>
            </form>
          <?php } ?>
        </div>

      </div>
    </div>
    <script src="js/function.js"></script>
    <?php if(isset($_GET['0aSn'])) {
      $show = $_GET['0aSn'];
      switch ($show) { 
        case "buku":?>
          <script>setTimeout(show1, 150)</script>
        <?php break;
        case "penulis":?>
          <script>setTimeout(show2, 150)</script>
        <?php break;
        case "progres":?>
          <script>setTimeout(show3, 150)</script>
        <?php break;
        default:?>
          <script>setTimeout(hide, 150)</script>
    <?php }} ?>
    <script>cekStatus(<?php echo '"'.$_GET['sta'].'"' ?>);</script>
  </body>
</html>
