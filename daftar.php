<?php
require 'koneksi.php';
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "INSERT INTO tb_daftar (email, username, password)
VALUES ('$email', '$username', '$password')";

if(mysqli_query($conn, $query_sql)){
    header("Location: ../WebDosen/hallogin.php");
}else{
    echo "Pendaftaran Gagal" . mysqli_error($conn);
}
?>
