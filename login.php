<?php
    require 'koneksi.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query_sql = "SELECT * FROM tb_daftar WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query_sql);

if ($result && $result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    
    if ($row['admin'] == 1) {
        header("Location: ../WebDosen/homeadmin.php");
    } else {
        header("Location: ../WebDosen/home.php");
    }
} else {
    echo "Email atau Password anda salah";
}

?>