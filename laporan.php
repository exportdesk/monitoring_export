<?php include 'koneksi.php'; ?>
<?php include 'session.php'; ?>

<?php
// FILTER
$where = "";
if(!empty($_GET['negara'])){
    $negara = $_GET['negara'];
    $where = "WHERE negara='$negara'";
}

// DATA
$data = mysqli_query($conn,"SELECT * FROM hambatan $where");

// SUMMARY
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM hambatan $where"));
$proses = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM hambatan WHERE status='Diproses'"));
$selesai = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM hambatan WHERE status='Selesai'"));

// GRAFIK PER NEGARA
$grafik = mysqli_query($conn,"
SELECT negara, COUNT(*) as jumlah 
FROM hambatan 
GROUP BY negara
");

$negara_arr = [];
$jumlah_arr = [];

while($g = mysqli_fetch_array($grafik)){
    $negara_arr[] = $g['negara'];
    $jumlah_arr[] = $g['jumlah'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {background:#eef2f7;}

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

<!-- NAVBAR -->
<?php include 'navbar.php'; ?>

<div class="container mt-4">

<!-- FILTER -->
<div class="box mb-4">
<form method="GET" class="row">
<div class="col-md-4">
<select name="negara" class="form-control">
<option value="">Semua Negara</option>

<?php
$n = mysqli_query($conn,"SELECT DISTINCT negara FROM hambatan");
while($neg = mysqli_fetch_array($n)){
?>
<option value="<?= $neg['negara'] ?>"><?= $neg['negara'] ?></option>
<?php } ?>

</select>
</div>

<div class="col-md-2">
<button class="btn btn-primary">Filter</button>
</div>

<div class="col-md-2">
<a href="laporan.php" class="btn btn-secondary">Reset</a>
</div>
</form>
</div>

<!-- SUMMARY -->
<div class="row mb-4">

<div class="col-md-4">
<div class="card-summary bg-blue">
<h6>Total Hambatan</h6>
<h3><?= $total ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card-summary bg-orange">
<h6>Diproses</h6>
<h3><?= $proses ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card-summary bg-green">
<h6>Selesai</h6>
<h3><?= $selesai ?></h3>
</div>
</div>

</div>

<!-- GRAFIK -->
<div class="box mb-4">
<h5>Grafik Hambatan per Negara</h5>

<div class="chart-box">
<canvas id="chart"></canvas>
</div>

<script>
new Chart(document.getElementById("chart"), {
type: 'bar',
data: {
labels: <?= json_encode($negara_arr) ?>,
datasets: [{
label: 'Jumlah Hambatan',
data: <?= json_encode($jumlah_arr) ?>,
backgroundColor: '#1e88e5'
}]
},
options: {
responsive:true,
maintainAspectRatio:false,
scales: {
y: {
beginAtZero:true,
ticks: {
stepSize: 5
}
}
}
}
});
</script>

</div>

<!-- TABEL -->
<div class="box">

<div class="d-flex justify-content-between mb-3">
<h5>Data Laporan</h5>

<button onclick="window.print()" class="btn btn-success">
🖨️ Print
</button>
</div>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Perusahaan</th>
<th>Negara</th>
<th>Produk</th>
<th>Hambatan</th>
<th>Status</th>
</tr>

<?php $no=1; while($d = mysqli_fetch_array($data)){ ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $d['nama_perusahaan'] ?></td>
<td><?= $d['negara'] ?></td>
<td><?= $d['produk'] ?></td>
<td><?= $d['hambatan'] ?></td>
<td><?= $d['status'] ?></td>
</tr>
<?php } ?>

</table>

</div>

</div>

</body>
</html>