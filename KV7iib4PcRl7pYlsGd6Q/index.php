<?php
require("../db.php");

//database buku
$buku = mysqli_query($conn, "SELECT * FROM buku_done ORDER BY judul ASC");
$produk = mysqli_query($conn, "SELECT * FROM buku_done ORDER BY judul ASC");
$datalist = mysqli_query($conn, "SELECT * FROM buku_done ORDER BY judul ASC");
$list = mysqli_query($conn, "SELECT * FROM penjualan ORDER BY id_penjualan DESC");
$konsumen = mysqli_query($conn, "SELECT * FROM penjualan GROUP BY konsumen ORDER BY konsumen ASC");
$kota = mysqli_query($conn, "SELECT * FROM penjualan GROUP BY kota ORDER BY kota ASC");
$penjualan = mysqli_query($conn, "SELECT * FROM penjualan ORDER BY created DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Penjualan</title>
    <link rel="shortcut icon" href="../assets/logotitle.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="barang border" id="barangHeader" onclick="showBarang()">Buku</div>
            <div class="penjualan border" id="penjualanHeader" onclick="showPenjualan()">Penjualan</div>
            <div class="baru border" id="barunHeader" onclick="showBaru()">Baru</div>
        </div>
        <div class="content" id="barang">
            <h2>Buku</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Internal Reference</th>
                        <th>Nama</th>
                        <th>Penulis</th>
                        <th>HPP</th>
                        <th>Harga</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        function formatAngka($angka){
                            $angka_formatted = number_format($angka, 0, ".", ",");
                            return $angka_formatted;
                        }
                        $no = 1;
                        while($listBuku = mysqli_fetch_array($buku)) { 
                            $hpp = $listBuku['hpp'];
                            $harga = $listBuku['harga']; ?>
                            <tr>
                                <form action="php/send.php" method="post">
                                    <input type="number" name="id" value="<?php echo $listBuku['id_buku'] ?>" hidden>
                                    <td><?php echo $no ?></td>
                                    <td><input type="text" name="kode" value="<?php echo $listBuku['kode_buku'] ?>"></td>
                                    <td><?php echo $listBuku['judul'] ?></td>
                                    <td><?php echo $listBuku['penulis'] ?></td>
                                    <td><input type="text" name="hpp" id="hpp" inputmode="numeric" onkeyup="formatNumberHpp()" value="<?php echo formatAngka($hpp) ?>"></td>
                                    <td><input type="text" name="harga" value="<?php echo formatAngka($harga) ?>"></td>
                                    <td><input class="update" type="submit" name="update" value="Update"></td>
                                </form>
                            </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
        <div class="content" id="penjualan">
            <h2>Penjualan</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Diskon</th>
                        <th>Kota</th>
                        <th>Media</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nom = 1; while($penjualanS = mysqli_fetch_array($penjualan)) { 
                        $idBuku = $penjualanS['id_buku'];
                        $cek = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM buku_done WHERE id_buku = '$idBuku'")); ?>
                        <tr>
                            <td><?php echo $nom ?></td>
                            <td><?php echo $penjualanS['kode_buku'] ?></td>
                            <td><?php echo $penjualanS['judul'] ?></td>
                            <td><?php echo $cek['penulis'] ?></td>
                            <td><?php echo "Rp ".formatAngka($penjualanS['harga']) ?></td>
                            <td><?php echo formatAngka($penjualanS['qty'])." eks" ?></td>
                            <td><?php echo formatAngka($penjualanS['diskon'])." %" ?></td>
                            <td><?php echo $penjualanS['kota'] ?></td>
                            <td><?php echo $penjualanS['media'] ?></td>
                            <td><?php echo "Rp ".formatAngka($penjualanS['total']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <table id="tableBuku">
            <tr>
                <th>Kode Buku</th>
                <th>Nama Buku</th>
                <th>Harga Buku</th>
            </tr>
            <?php while($datalists = mysqli_fetch_array($datalist)) { ?>
                <tr>
                    <td><?php echo $datalists['kode_buku'] ?></td>
                    <td><?php echo $datalists['judul'] ?></td>
                    <td><?php echo $datalists['harga'] ?></td>
                </tr>
            <?php } ?>
	    </table>
        <form action="php/form.php" method="post" class="content" id="baru">
            <h2>Penjualan Baru</h2>
            <div class="form-baru">
                <table>
                    <thead>
                        <tr>
                            <th class="col10">Tanggal</th>
                            <th class="col1">Konsumen</th>
                            <th class="col2">Buku</th>
                            <th class="col3">Harga</th>
                            <th class="col4">Qty</th>
                            <th class="col5">Diskon</th>
                            <th class="col8">Kota</th>
                            <th class="col9">Media</th>
                            <th class="col6">Total</th>
                            <th class="col7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="date" name="tanggal"></td>
                            <td class="col1">
                                <input list="konsumens" name="konsumen" id="konsumen" required>
                                <datalist id="konsumens">
                                    <?php while($konsumens = mysqli_fetch_array($konsumen)) { ?>
                                        <option value="<?php echo $konsumens['konsumen'] ?>">
                                    <?php } ?>
                                </datalist>
                            </td>
                            <td class="col2">
                                <input list="produks" name="produk" id="produk" onchange="vlookup()" required>
                                <datalist id="produks">
                                    <?php while($produks = mysqli_fetch_array($produk)) { ?>
                                        <option value="<?php echo "[".$produks['kode_buku']."] ".$produks['judul'] ?>">
                                    <?php } ?>
                                </datalist>
                            </td>
                            <td class="col3"><input type="number" id="hargaBaru" name="hargaBuku"></td>
                            <td class="col4"><input type="number" id="qtyBaru" min="1" name="qtyBaru" onchange="totalHarga()" required></td>
                            <td class="col5">
                                <input style="width: 60%" type="number" id="diskonBaru" name="percentinput" min="0" max="100" step="1" onchange="totalHarga()" value="0">
                                %
                            </td>
                            <td>
                                <input list="kotaBaru" name="kota" id="kota" required>
                                <datalist id="kotaBaru"?>
                                    <?php while($kotas = mysqli_fetch_array($kota)) { ?>
                                        <option value="<?php echo $kotas['kota'] ?>">
                                    <?php } ?>
                                </datalist>
                            </td>
                            <td>
                                <select name="media" id="media">
                                    <option value="itbpress">ITB Press</option>
                                    <option value="tokopedia">Tokopedia</option>
                                    <option value="moco">Moco</option>
                                </select>
                            </td>
                            <td class="col6"><input type="number" name="totalBaru" id="totalBaru" readonly></td>
                            <td>
                                <input type="submit" class="simpan" value="simpan" name="simpan">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <form action="send.php" method="post">
        <label for="id">Judul</label>
        <select name="id" id="id">
            <?php
            while($bukus = mysqli_fetch_array($buku)) { ?>
                <option value="<?php echo $bukus['id_buku'] ?>"><?php echo $bukus['judul'] ?></option>
            <?php } ?>
        </select><br>
        <label for="qty">Qty</label>
        <input type="number" id="qty" name="qty"><br>
        <label for="total">Total</label>
        <input type="number" id="total" name="total"><br>
        <label for="kota">Kota</label>
        <input type="text" id="kota" name="kota"><br>
        <label for="media">Media</label>
        <select name="media" id="media">
            <option value="tokopedia">Tokopedia</option>
            <option value="itbpress">ITBPress</option>
            <option value="moco">Moco</option>
        </select><br>
        <label for="bulan">Tanggal</label>
        <input type="date" name="bulan" id="bulan"><br>
        <input type="submit" id="submit" name="submit">
    </form>
    <?php while($lists = mysqli_fetch_array($list)){?>
        <div><?php echo $lists['judul'] ?> </div>
        <div><?php echo $lists['qty'] ?> </div>
        <div><?php echo $lists['total'] ?> </div>
    <?php } ?>
</body>
</html>