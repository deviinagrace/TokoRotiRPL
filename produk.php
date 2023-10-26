<?php
session_start();

require 'koneksi.php';

$sql1 = "SELECT id, nama_produk, harga_produk FROM tb_produk WHERE nama_produk LIKE '%Satuan%'";
$result1 = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_assoc($result1);

$sql2 = "SELECT id, nama_produk, harga_produk FROM tb_produk WHERE nama_produk LIKE '%Kecil%'";
$result2 = mysqli_query($conn, $sql2);
$data2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT id, nama_produk, harga_produk FROM tb_produk WHERE nama_produk LIKE '%Besar%'";
$result3 = mysqli_query($conn, $sql3);
$data3 = mysqli_fetch_assoc($result3);

$_SESSION['data1'] = $data1;
$_SESSION['data2'] = $data2;
$_SESSION['data3'] = $data3;

mysqli_close($conn);

header("Location: ../WebDosen/menu2.php");
?>
