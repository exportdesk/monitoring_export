<?php
include 'koneksi.php';

mysqli_query($conn,"INSERT INTO hambatan 
(nama_perusahaan, produk, negara, hambatan, status)
VALUES(
'$_POST[nama_perusahaan]',
'$_POST[produk]',
'$_POST[negara]',
'$_POST[hambatan]',
'$_POST[status]'
)");
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data berhasil disimpan',
        confirmButtonColor: '#0d47a1'
    }).then(() => {
        window.location = 'data.php';
    });
});
</script>

</body>
</html>