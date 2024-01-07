function pesan() {
    var produk = document.getElementById('harga').value;
    var jumlah = document.getElementById('jumlah').value;
    var total = parseFloat(produk) * parseFloat(jumlah);
    if (!isNaN(total)) {
        document.getElementById('total').value = total;
    } else {
        document.getElementById('total').value = produk;
    }
}