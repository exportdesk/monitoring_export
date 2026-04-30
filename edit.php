<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM hambatan WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Hambatan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    background:#eef2f7;
}

/* CARD FORM */
.card-form {
    max-width:600px;
    margin:auto;
    margin-top:50px;
    border-radius:10px;
    padding:25px;
    background:white;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

/* HEADER */
.form-title {
    font-weight:bold;
    margin-bottom:20px;
}

/* BUTTON */
.btn-custom {
    background:#1e88e5;
    color:white;
}

.btn-custom:hover {
    background:#1565c0;
}
</style>

</head>

<body>

<div class="card-form">

<h4 class="form-title">
<i class="fa fa-edit"></i> Edit Data Hambatan
</h4>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?= $d['id'] ?>">

<label>Nama Perusahaan</label>
<input type="text" name="nama_perusahaan" class="form-control mb-3"
value="<?= $d['nama_perusahaan'] ?>" required>

<label>Produk</label>
<input type="text" name="produk" class="form-control mb-3"
value="<?= $d['produk'] ?>" required>

<label>Negara Tujuan</label>
<input type="text" name="negara" class="form-control mb-3"
value="<?= $d['negara'] ?>" required>

<label>Deskripsi Hambatan</label>
<textarea name="hambatan" class="form-control mb-3" rows="4" required><?= $d['hambatan'] ?></textarea>

<label>Status</label>
<select name="status" class="form-control mb-4">

<option <?= $d['status']=='Baru'?'selected':'' ?>>Baru</option>
<option <?= $d['status']=='Diproses'?'selected':'' ?>>Diproses</option>
<option <?= $d['status']=='Selesai'?'selected':'' ?>>Selesai</option>

</select>

<div class="d-flex justify-content-between">
<a href="data.php" class="btn btn-secondary">
<i class="fa fa-arrow-left"></i> Kembali
</a>

<button type="submit" class="btn btn-custom">
<i class="fa fa-save"></i> Update
</button>
</div>

</form>

</div>

</body>
</html>