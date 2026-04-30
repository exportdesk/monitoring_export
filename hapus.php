<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM hambatan WHERE id='$id'");

header("location:data.php");
?>