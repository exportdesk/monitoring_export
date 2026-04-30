<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include 'koneksi.php'; ?>
<?php include 'session.php'; ?>

<?php
// SUMMARY
$total = $conn->query("SELECT COUNT(*) FROM hambatan")->fetchColumn();
$proses = $conn->query("SELECT COUNT(*) FROM hambatan WHERE status='Diproses'")->fetchColumn();
$selesai = $conn->query("SELECT COUNT(*) FROM hambatan WHERE status='Selesai'")->fetchColumn();

// GRAFIK
$grafik = $conn->query("
    SELECT negara, COUNT(*) AS jumlah
    FROM hambatan
    GROUP BY negara
    ORDER BY jumlah DESC
");

$label_negara = [];
$data_jumlah = [];

while($row = $grafik->fetch(PDO::FETCH_ASSOC)){
    $label_negara[] = $row['negara'];
    $data_jumlah[] = $row['jumlah'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    background:#eef2f7;
    font-family: Arial;
}

/* NAVBAR */
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

/* CARD */
.card-custom {
    border-radius:10px;
    color:white;
    padding:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.bg-blue {background:#1e88e5;}
.bg-orange {background:#fb8c00;}
.bg-green {background:#43a047;}

.icon-circle {
    background:white;
    width:55px;
    height:55px;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:22px;
}

.icon-blue {color:#1e88e5;}
.icon-orange {color:#fb8c00;}
.icon-green {color:#43a047;}

.box {
    background:white;
    padding:20px;
    border-radius:10px;
}

.badge-baru {background:red;}
.badge-proses {background:orange;}
.badge-selesai {background:green;}

.chart-box {
    max-width:500px;
    margin:auto;
}
canvas {
    height:260px !important;
}
</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

<!-- CARD -->
<div class="row">

<div class="col-md-4">
<div class="card-custom bg-blue">
<div>
<h6>Total Hambatan</h6>
<h2><?= $total ?></h2>
</div>
<div class="icon-circle">
<i class="fa fa-globe icon-blue"></i>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card-custom bg-orange">
<div>
<h6>Sedang Diproses</h6>
<h2><?= $proses ?></h2>
</div>
<div class="icon-circle">
<i class="fa fa-cog icon-orange"></i>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card-custom bg-green">
<div>
<h6>Selesai</h6>
<h2><?= $selesai ?></h2>
</div>
<div class="icon-circle">
<i class="fa fa-check icon-green"></i>
</div>
</div>
</div>

</div>

<!-- GRAFIK -->
<div class="box mt-4">
<h5>Grafik Jumlah Hambatan Berdasarkan Negara</h5>

<div class="chart-box">
<canvas id="chart"></canvas>
</div>

<script>
new Chart(document.getElementById("chart"), {
type: 'bar',
data: {
labels: <?= json_encode($label_negara) ?>,
datasets: [{
label: 'Jumlah Hambatan',
data: <?= json_encode($data_jumlah) ?>,
backgroundColor: '#1e88e5'
}]
},
options: {
responsive: true,
maintainAspectRatio: false,
scales: {
y: {
beginAtZero: true,
ticks: { precision: 0 }
}
}
}
});
</script>

</div>

<!-- TABEL -->
<div class="box mt-4">

<h5>Hambatan Ekspor Terbaru</h5>

<table class="table table-bordered mt-3">
<tr>
<th>Nama Perusahaan</th>
<th>Negara</th>
<th>Produk</th>
<th>Hambatan</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php
$data = $conn->query("SELECT * FROM hambatan ORDER BY id DESC LIMIT 5");
while($d = $data->fetch(PDO::FETCH_ASSOC)){
?>

<tr>
<td><?= $d['nama_perusahaan'] ?></td>
<td><?= $d['negara'] ?></td>
<td><?= $d['produk'] ?></td>
<td><?= $d['hambatan'] ?></td>

<td>
<?php if($d['status']=="Baru"){ ?>
<span class="badge badge-baru">Baru</span>
<?php } elseif($d['status']=="Diproses"){ ?>
<span class="badge badge-proses">Sedang Diproses</span>
<?php } else { ?>
<span class="badge badge-selesai">Selesai</span>
<?php } ?>
</td>

<td>
<a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
<a href="hapus.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>
