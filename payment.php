<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarcis Yosi & Yosi - Contact</title>
    <link rel="shortcut icon" type="image" href="./image/logo.png">
    <link rel="stylesheet" href="payment.css">
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
                <i class="usr" data-feather="user"></i>
                <i class="hrt" data-feather="heart"></i>
                <i class="shp" onclick="toggleCart()" data-feather="shopping-cart"></i>
            </div>
          </nav>
        <!-- navbar end -->
    </div>
	
<header>
	<div class="pay">
		<div class="container">
			<div class="left">
				<h3>BILLING ADDRESS</h3>
				<form>
					Full Name
					<input type="text" name="" placeholder="Enter name">

					Phone Number
					<input type="text" name="" placeholder="Enter phone number">

					Address
					<input type="text" name="" placeholder="Enter address">
					
					City
					<input type="text" name="" placeholder="Enter city">

					Province
					<input type="text" name="" placeholder="Enter province">

					Country
					<input type="text" name="" placeholder="Enter country">

					<div id="zip">
						<label>
						Postal code
						<input type="number" name="" placeholder="Postal code">
						</label>
					</div>
					<div id="pilih">
						<label>
							Payment
							<p><input type='radio' name='payment' value='COD' /> COD</p>
							<p><input type='radio' name='payment' value='Transfer'/> Transfer 
							<select>
								<option>.....</option>
								<option>BCA</option>
								<option>Shopeepay</option>
								<option>Mandiri</option>
							</select>
							</p>
							<label>
							<p><input type='radio' name='payment' value='PickUp'/> PickUp</p>
						</label>
					</div>
				</form>
				<input type="submit" name="" value="Order">
			</div>
			<div class="right">
				<h3>YOUR ORDER</h3>
				
			</div>
		</div>
	</div>
</header>

	<!-- ini feather icon -->
	<script>
		feather.replace();
	</script>
</body>
</html>