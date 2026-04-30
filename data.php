<?php include 'koneksi.php'; ?>
<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Data Hambatan</title>

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

.badge-baru {background:red;}
.badge-proses {background:orange;}
.badge-selesai {background:green;}
</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

<div class="box">

<div class="d-flex justify-content-between mb-3">
<h4>Data Hambatan Ekspor</h4>

<a href="tambah.php" class="btn btn-success">
<i class="fa fa-plus"></i> Tambah Hambatan
</a>
</div>

<table class="table table-bordered">

<tr>
<th>No</th>
<th>Perusahaan</th>
<th>Negara</th>
<th>Produk</th>
<th>Hambatan</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
$data = mysqli_query($conn,"SELECT * FROM hambatan ORDER BY id DESC");

while($d = mysqli_fetch_array($data)){
?>

<tr>
<td><?= $no++ ?></td>
<td><?= $d['nama_perusahaan'] ?></td>
<td><?= $d['negara'] ?></td>
<td><?= $d['produk'] ?></td>
<td><?= $d['hambatan'] ?></td>

<td>
<?php if($d['status']=="Baru"){ ?>
<span class="badge badge-baru">Baru</span>
<?php } elseif($d['status']=="Diproses"){ ?>
<span class="badge badge-proses">Diproses</span>
<?php } else { ?>
<span class="badge badge-selesai">Selesai</span>
<?php } ?>
</td>

<td>
<a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
<button onclick="hapusData(<?= $d['id'] ?>)" class="btn btn-danger btn-sm">
Hapus
</button></td>

</tr>

<?php } ?>

</table>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function hapusData(id){
    Swal.fire({
        title: 'Yakin hapus data?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "hapus.php?id=" + id;
        }
    });
}
</script>
</body>
</html>