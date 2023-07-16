function showBarang(){
    var barangHeader = document.getElementById('barangHeader');
    var penjualanHeader = document.getElementById('penjualanHeader');
    var barunHeader = document.getElementById('barunHeader');
    var barang = document.getElementById('barang');
    var penjualan = document.getElementById('penjualan');
    var baru = document.getElementById('baru');

    barangHeader.style.backgroundColor = "white";
    barangHeader.style.color = "#0054a3";
    barangHeader.style.borderBottom = "1px solid white"
    barangHeader.style.opacity = "1"
    barang.style.display = "block"

    penjualanHeader.style.backgroundColor = "#0054a3";
    penjualanHeader.style.color = "white";
    penjualanHeader.style.borderBottom = "1px solid #0054a3";
    penjualanHeader.style.opacity = "0.5"
    penjualan.style.display = "none"
    
    barunHeader.style.backgroundColor = "#0054a3";
    barunHeader.style.color = "white";
    barunHeader.style.borderBottom = "1px solid #0054a3";
    barunHeader.style.opacity = "0.5"
    baru.style.display = "none"
}

function showPenjualan(){
    barangHeader.style.backgroundColor = "#0054a3";
    barangHeader.style.color = "white";
    barangHeader.style.borderBottom = "1px solid #0054a3";
    barangHeader.style.opacity = "0.5"
    barang.style.display = "none"

    penjualanHeader.style.backgroundColor = "white";
    penjualanHeader.style.color = "#0054a3";
    penjualanHeader.style.borderBottom = "1px solid white"
    penjualanHeader.style.opacity = "1"
    penjualan.style.display = "block"
    
    barunHeader.style.backgroundColor = "#0054a3";
    barunHeader.style.color = "white";
    barunHeader.style.borderBottom = "1px solid #0054a3";
    barunHeader.style.opacity = "0.5"
    baru.style.display = "none"
}

function showBaru(){
    barangHeader.style.backgroundColor = "#0054a3";
    barangHeader.style.color = "white";
    barangHeader.style.borderBottom = "1px solid #0054a3";
    barangHeader.style.opacity = "0.5"
    barang.style.display = "none"

    penjualanHeader.style.backgroundColor = "#0054a3";
    penjualanHeader.style.color = "white";
    penjualanHeader.style.borderBottom = "1px solid #0054a3";
    penjualanHeader.style.opacity = "0.5"
    penjualan.style.display = "none"

    barunHeader.style.backgroundColor = "white";
    barunHeader.style.color = "#0054a3";
    barunHeader.style.borderBottom = "1px solid white";
    barunHeader.style.opacity = "1"
    baru.style.display = "block"
}

function vlookup() {
    // Ambil input kode barang
    var kodeBarang = document.getElementById("produk").value;
    var kodeBarang = kodeBarang.substring(1, kodeBarang.indexOf("]"));

    // Ambil data tabel
    var table = document.getElementById("tableBuku");

    // Looping untuk mencari data yang cocok
    for (var i = 1; i < table.rows.length; i++) {
        if (table.rows[i].cells[0].innerHTML == kodeBarang) {
            // Jika data cocok, tampilkan hasil
            document.getElementById("hargaBaru").value = table.rows[i].cells[2].innerHTML;
            return;
        }
    }

    // Jika tidak ada data cocok, tampilkan pesan error
    document.getElementById("hargaBaru").value = 0;
}

function totalHarga(){
    var hargaBaru = document.getElementById('hargaBaru').value
    var qtyBaru = document.getElementById('qtyBaru').value
    var diskonBaru = document.getElementById('diskonBaru').value
    var totalBaru = document.getElementById('totalBaru')

    var totalBarang = (hargaBaru * qtyBaru) - (hargaBaru * (diskonBaru / 100))

    totalBaru.value = totalBarang
}

function formatNumberHarga() {
    // Mendapatkan nilai input
    var input = document.getElementById("harga").value;
    
    // Mengubah string input menjadi angka
    var angka = parseInt(input.replace(/,/g, ""));

    // Memformat angka dengan pemisah ribuan
    var angka_format = angka.toLocaleString();

    // Memasukkan nilai yang sudah diformat kembali ke input
    document.getElementById("harga").value = angka_format;
}