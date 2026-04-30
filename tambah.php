<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
}

/* HEADER */
.header {
    background: #0d47a1;
    color: white;
    padding: 15px;
    font-weight: bold;
}

/* CARD */
.card-form {
    background: white;
    border-radius: 10px;
    padding: 25px;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
}

/* BUTTON */
.btn-custom {
    background: #0d47a1;
    color: white;
}
</style>

</head>

<body>

<div class="header">
    Sistem Monitoring Hambatan Ekspor Obat dan Makanan
</div>

<div class="container mt-5">

<div class="row justify-content-center">
<div class="col-md-6">

<div class="card-form">

<h4 class="mb-4">➕ Tambah Data Hambatan</h4>

<form method="POST" action="simpan.php">

<label>Nama Perusahaan</label>
<input type="text" name="nama_perusahaan" class="form-control mb-3" placeholder="Contoh: PT Suka Maju" required>

<label>Negara Tujuan</label>
<input type="text" name="negara" class="form-control mb-3" placeholder="Contoh: Korea Selatan" required>

<label>Produk</label>
<input type="text" name="produk" class="form-control mb-3" placeholder="Contoh: Kosmetik" required>

<label>Deskripsi Hambatan</label>
<input type="text" name="hambatan" class="form-control mb-3" required>


<label>Status</label>
<select name="status" class="form-control mb-4">
    <option>Baru</option>
    <option>Diproses</option>
    <option>Selesai</option>
</select>

<div class="d-flex justify-content-between">
    <a href="index.php" class="btn btn-secondary">← Kembali</a>
    <button type="submit" class="btn btn-custom">Simpan</button>
</div>

</form>

</div>

</div>
</div>

</div>

</body>
</html>