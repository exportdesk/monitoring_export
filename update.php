<?php
include 'koneksi.php';

mysqli_query($conn,"UPDATE hambatan SET
nama_perusahaan='$_POST[nama_perusahaan]',
produk='$_POST[produk]',
negara='$_POST[negara]',
hambatan='$_POST[hambatan]',
status='$_POST[status]'
WHERE id='$_POST[id]'
");
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
        text: 'Data berhasil diupdate',
        confirmButtonColor: '#0d47a1'
    }).then(() => {
        window.location = 'data.php';
    });
});
</script>

</body>
</html>