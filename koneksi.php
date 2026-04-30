<?php
try {
    $conn = new PDO(
        "mysql:host=".$_ENV['MYSQLHOST'].";dbname=".$_ENV['MYSQLDATABASE'].";port=".$_ENV['MYSQLPORT'],
        $_ENV['MYSQLUSER'],
        $_ENV['MYSQLPASSWORD']
    );
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
