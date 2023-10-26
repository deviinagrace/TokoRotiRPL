<?php
$servername = "localhost"; // Nama server MySQL
$username = "root"; // Username MySQL
$password = ""; // Password MySQL
$database = "db_toko"; // Nama database

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Koneksi Gagal : " . mysqli_connect_error());
}else{
    echo "";
}
?>