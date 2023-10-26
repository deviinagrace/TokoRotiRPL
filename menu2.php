<?php
session_start();
require 'koneksi.php';

// Fungsi untuk mendapatkan data produk
function getProducts($conn, $nama_produk) {
    $sql = "SELECT id, nama_produk, harga_produk FROM tb_produk WHERE nama_produk LIKE '%$nama_produk%'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}

// Mendapatkan data produk untuk setiap kategori
$data1 = getProducts($conn, 'Satuan');
$data2 = getProducts($conn, 'Kecil');
$data3 = getProducts($conn, 'Besar');

$_SESSION['data1'] = $data1;
$_SESSION['data2'] = $data2;
$_SESSION['data3'] = $data3;

// Fungsi untuk menambahkan produk ke keranjang
function addToCart($conn, $id_keranjang, $id, $nama_produk, $harga_produk, $jumlah_produk) {
  // Periksa apakah produk sudah ada di keranjang
  $sqlCheck = "SELECT * FROM tb_keranjang WHERE id_keranjang = $id_keranjang AND id = $id";
  $resultCheck = mysqli_query($conn, $sqlCheck);

  if (mysqli_num_rows($resultCheck) > 0) {
      // Jika produk sudah ada, update jumlahnya
      $sqlUpdate = "UPDATE tb_keranjang SET jumlah_produk = jumlah_produk + $jumlah_produk WHERE id_keranjang = $id_keranjang AND id = $id";
      mysqli_query($conn, $sqlUpdate);
  } else {
      // Jika produk belum ada, tambahkan ke keranjang
      $sqlInsert = "INSERT INTO tb_keranjang (id_keranjang, id, nama_produk, harga_produk, jumlah_produk) VALUES ($id_keranjang, $id, '$nama_produk', $harga_produk, $jumlah_produk)";
      mysqli_query($conn, $sqlInsert);
  }
}


// Cek apakah tombol "Tambah ke Keranjang" diklik
if (isset($_POST['addToCart'])) {
  $id_keranjang = $_POST['id_keranjang'];
  $id = $_POST['id'];
  $nama_produk = $_POST['nama_produk'];
  $harga_produk = $_POST['harga_produk'];
  $jumlah_produk = $_POST['jumlah_produk'];

  // Panggil fungsi untuk menambahkan produk ke keranjang
  addToCart($conn, $id_keranjang, $id, $nama_produk, $harga_produk, $jumlah_produk);
}

//var_dump($_POST);  // Tampilkan semua data POST

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarcis Yosi & Yosi - Menu</title>
    <link rel="shortcut icon" type="image" href="./image/logo.png">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <style>
      body {
        font-family: 'Open Sans', Arial, sans-serif;
        /*padding: 20px;*/
        background-color: #937a62; /* Beige color as a background */
      }
      .menu-container {
        display: flex;
        flex-wrap: nowrap; /* Disable wrapping to make swiping easier */
        overflow-x: auto; /* Enable horizontal scrolling/swiping */
        position: relative;
      }
      .menu-item {
        border: 1px solid #4f3011; /* SaddleBrown border color */
        padding: 20px;
        margin: 25px;
        width: 300px;
        background-color: rgba(255, 255, 255, 0.8); /* Tan background color */
        display: inline-block; /* Display items in a row */
        vertical-align: top; /* Align items at the top of the container */
        border-radius: 15px; /* Rounded corners */
      }
      .menu-item img {
        margin-bottom: 5px; /* Add spacing between image and text */
        border-radius: 10px; /* Rounded corners for the image */
        /*max-width: 100%; */
        /* Ensure the image fits within the container */
        width: 200px;
        height: 200px;
      }
      .menu-item h3 {
        font-family: 'Dancing Script', cursive;
        margin-top: 0;
        color: #4f3011; /* SaddleBrown header color */
      }
      .menu-item .price {
        font-weight: bold;
        font-size: 20px;
        color: #000000;
      }
      .menu-item .quantity {
        width: 40px;
        height: 25px;
      }
      .menu-item .cart-icon {
        cursor: pointer;
        color: #937a62; /* SaddleBrown cart icon color */
        width: 40px;
        height: 20px;
        margin-left: 0px;
      }
      h2{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        margin-top: 70px;
        margin-left: 30px;
        margin-bottom: 0;
        color: #ffffff; /* SaddleBrown header color */
      }
      h1{
        border-bottom: 3px solid #573818;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        /*padding: 10px;*/
        text-align: center;
        font-weight: bold;
        margin-top: 60px;
        color: #573818;
        text-shadow: 1px 1px 1px white;
        padding-bottom: 20px;
        margin-left: 30px;
        margin-right: 30px;
      }
      .image-container {
        margin-top: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px; /* Sesuaikan dengan tinggi gambar */
        margin-bottom: 20px;
      }
      .product-image {
        border-radius: 10px;
        width: 200px;
        height: 200px;
      }
      .transparent-button {
        background-color: transparent;
        border: none;
        outline: none;
      }
      .transparent-button:active {
        border: transparent; /* Menghapus border pada saat tombol diklik (aktif) */
      }
    </style>
  </head>
  <body>
  <div class="all-content">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md" id="navbar">
            <!-- Brand -->
            <a class="navbar-brand" href="#" id="logo"><img src="./image/logo.png" alt="" width="50px">Tarcis Yosi & Yosi</a>
          
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span><i data-feather="menu"></i></span>
            </button>
          
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="home.php">Home</a>
                </li>
                <!-- dropdown -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                        Menu
                    </a>
                    <div class="dropdown-menu">
                        <a href="menu2.php" class="dropdown-item">Tarcis Satuan</a>
                        <a href="menu2.php" class="dropdown-item">Tarcis Mini Kemasan Kecil</a>
                        <a href="menu2.php" class="dropdown-item">Tarcis Mini Kemasan Besar</a>
                    </div>
                </li>
                <!-- dropdown -->
                <li class="nav-item">
                  <a class="nav-link" href="payment.php">Order</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
              </ul>
            </div>
            <div class="icons">
                <i class="usr" data-feather="user"></i>
                <i class="hrt" data-feather="heart"></i>
                <i class="shp" onclick="toggleCart()" data-feather="shopping-cart"></i>
            </div>
          </nav>
        <!-- navbar end -->
    </div>
    <h1>MENU</h1>
    <?php
      function displayProducts($data, $menuTitle) {
        echo "<h2>$menuTitle</h2>";
        echo "<div class='menu-container'>";
        foreach ($data as $item) {
          echo "<input type='hidden' name='id' value='{$item['id']}'>";
          echo "<div class='menu-item'>";
          $imageName = '';
          switch ($item['nama_produk']) {
              case 'Satuan Kacang':
                  $imageName = 'Kacang.jpg';
                  break;
              case 'Satuan Coklat':
                  $imageName = 'Coklat.jpg';
                  break;
              case 'Satuan Nanas':
                  $imageName = 'Nanas.jpg';
                  break;
              case 'Satuan Keju':
                  $imageName = 'Keju.jpg';
                  break;
              case 'Kecil Kacang':
                  $imageName = 'Kacang.jpg';
                  break;
              case 'Kecil Coklat':
                  $imageName = 'Coklat.jpg';
                  break;
              case 'Kecil Nanas':
                  $imageName = 'Nanas.jpg';
                  break;
              case 'Kecil Keju':
                  $imageName = 'Keju.jpg';
                  break;
              case 'Besar Kacang':
                  $imageName = 'Kacang.jpg';
                  break;
              case 'Besar Coklat':
                  $imageName = 'Coklat.jpg';
                  break;
              case 'Besar Nanas':
                  $imageName = 'Nanas.jpg';
                  break;
              case 'Besar Keju':
                  $imageName = 'Keju.jpg';
                  break;
              default:
                  //$imageName = $item[''];
          }
          echo "<div class='image-container'>";
          echo "<img src='./image/{$imageName}' alt='{$item['nama_produk']}' class='product-image'>";
          echo "</div>";
          // Display other product information and structure as needed
          echo "<h3>{$item['nama_produk']}</h3>";
          echo "<span class='price'>{$item['harga_produk']}</span>";
          echo "<form method='post'>";
          echo "<input type='hidden' name='id' value='{$item['id']}'>";
          echo "<input type='hidden' name='id_keranjang' value='{$item['id']}'>"; // Tambahkan ini
          echo "<input type='hidden' name='nama_produk' value='{$item['nama_produk']}'>"; // Tambahkan ini
          echo "<input type='hidden' name='harga_produk' value='{$item['harga_produk']}'>"; // Tambahkan ini
          echo "<br>Jumlah: <input type='number' class='quantity' name='jumlah_produk' id='quantity_{$item['id']}' min='1' value='0'>";
          echo "<button type='submit' name='addToCart' class='transparent-button'><i class='cart-icon' data-feather='shopping-cart' onclick=\"addToCart('{$item['nama_produk']}', 'quantity_{$item['id']}')\"></i></button>";
          echo "<i class='cart-icon' data-feather='heart'></i>";
          echo "</form>";


          /*echo "<br>Jumlah: <input type='number' class='quantity' id='quantity_{$item['id']}' min='0' value='0'>";
          echo "<i class='cart-icon' data-feather='shopping-cart' onclick=\"addToCart('{$item['nama_produk']}', 'quantity_{$item['id']}')\"></i>";
          echo "<i class='cart-icon' data-feather='heart'></i>";*/
          echo "</div>";
          //<!-- Tampilkan produk dan formulir "Tambah ke Keranjang" -->
        }
        echo "</div>";
      }
    ?>

    <?php displayProducts($_SESSION['data1'], 'TARCIS SATUAN'); ?>
    <?php displayProducts($_SESSION['data2'], 'TARCIS MINI KEMASAN KECIL'); ?>
    <?php displayProducts($_SESSION['data3'], 'TARCIS MINI KEMASAN BESAR'); ?>

    <!-- Shopping Cart Sliding Menu -->
    <div class="cart" id="cart">
        <h1>Cart</h1>
        <div class="box">
            <!-- Add your content inside the box -->
            <p>This is a sample box content.</p>
        </div>
        <div class="box">
            <!-- Add your content inside the box -->
            <p>This is a sample box content.</p>
        </div>
        <ul class="listCart">
            <!-- Cart items will be dynamically added here using JavaScript -->
        </ul>
        <div class="checkOut">
            <div class="total">Total: $0.00</div>
            <div class="closeShopping" onclick="toggleCart()">Close</div>
        </div>
    </div>

    <script>
        // JavaScript to handle the cart toggle
        function toggleCart() {
            var cart = document.getElementById('cart');
            var isOpen = cart.style.right === '0px';

            cart.style.right = isOpen ? '-500px' : '0';
        }
    </script>

    <script>
      function addToCart(varian, inputId) {
        const quantity = document.getElementById(inputId).value;
        console.log('Tambahkan', quantity, varian, 'ke keranjang');
      }

      feather.replace();
    </script>

    <!-- Bootstrap JS (optional, if needed) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>