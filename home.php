<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarcis Yosi & Yosi - Home</title>
    <link rel="shortcut icon" type="image" href="./image/logo.png">
    <link rel="stylesheet" href="style.css">
    <!-- boorstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- boorstrap links -->

    <!-- ini feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!--font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Alegreya+Sans&family=Quicksand:wght@500&family=Uchen&display=swap" rel="stylesheet">
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
                <a href="profile.php"><i class="usr" data-feather="user"></i></a>
                <i class="shp" onclick="toggleCart()" data-feather="shopping-cart"></i>
                <a href="hallogin.php"><i class="logout" data-feather="log-out"></i></a>
            </div>
          </nav>
        <!-- navbar end -->
    </div>
    <!--home section-->
    <div class="home">
        <div class="content">
            <h3>Delicious
                <br>Tarcis Yosi&Yosi
            </h3>
            <h2>Menu <span class="changecontent"></span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                <br>Ut placeat nisi deserunt atque adipisci dolore autem, 
            </p>
            <a href="menu2.php" class="btn">Order Now</a>
        </div>
    </div>

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

    <!-- ini feather icon -->
    <script>
        feather.replace();
    </script>
</body>
</html>