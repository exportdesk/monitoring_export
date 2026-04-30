<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Bantuan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body { background:#eef2f7; }
.custom-navbar {
    background: linear-gradient(to right,#1e3c72,#2a5298);
    padding: 12px 20px;
}

.custom-navbar .navbar-brand {
    color: white;
    font-weight: bold;
}

.custom-navbar a {
    color: white !important;
    margin-left: 20px;
    text-decoration: none;
    font-weight: 500;
}

.custom-navbar a:hover {
    opacity: 0.8;
}

.box {
    background:white;
    padding:20px;
    border-radius:10px;
}

.card-summary {
    color:white;
    padding:15px;
    border-radius:10px;
}

.bg-blue {background:#1e88e5;}
.bg-orange {background:#fb8c00;}
.bg-green {background:#43a047;}

.chart-box {
    max-width:600px;
    margin:auto;
}
canvas {height:300px !important;}
</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

<div class="box">

<h4 class="mb-4">
<i class="fa fa-info-circle"></i> Bantuan & Panduan Admin
</h4>

<!-- PANDUAN -->
<div class="section">
<h5><i class="fa fa-book icon"></i> Panduan Penggunaan</h5>

<ul>
<li>Menu <b>Dashboard</b> menampilkan ringkasan data hambatan</li>
<li>Menu <b>Data Hambatan</b> untuk melihat, menambah, edit, dan hapus data</li>
<li>Klik <b>Tambah Hambatan</b> untuk input data baru</li>
<li>Gunakan tombol <b>Edit</b> untuk memperbarui data</li>
<li>Gunakan tombol <b>Hapus</b> untuk menghapus data</li>
<li>Menu <b>Laporan</b> untuk melihat dan mencetak data</li>
</ul>
</div>

<!-- ALUR -->
<div class="section">
<h5><i class="fa fa-sitemap icon"></i> Alur Sistem</h5>

<p>
Admin melakukan input data hambatan → data tersimpan di database → 
data ditampilkan di dashboard dan laporan → admin dapat melakukan 
update atau penghapusan data.
</p>
</div>

<!-- CONTACT INTERNAL -->
<div class="section">
<h5><i class="fa fa-users icon"></i> Kontak Admin</h5>

<p>Jika terjadi kendala teknis, hubungi admin sistem:</p>

<ul>
<li><b>Admin Sistem:</b> 0896-0448-4184 (Erika)</li>
<li><b>Email:</b> erika@admin.capstone_project.com</li>
</ul>

</div>

</div>

</div>

</body>
</html>