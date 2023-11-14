<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="cart2.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <h1>Shopping Cart</h1>
        <div class="cart">
            <div class="products">
                <?php
                session_start();
                require 'koneksi.php';

                if (isset($_POST['removeFromCart'])) {
                    $id = $_POST['removeFromCart'];
                    // Delete the item from the database
                    $deleteQuery = "DELETE FROM tb_keranjang WHERE id = $id";
                    mysqli_query($conn, $deleteQuery);
                }

                if (isset($_POST['updateQuantity'])) {
                    $id = $_POST['updateQuantity'];
                    $quantity = $_POST['quantity'];

                    // Update the quantity in the database
                    $updateQuery = "UPDATE tb_keranjang SET jumlah_produk = $quantity WHERE id = $id";
                    mysqli_query($conn, $updateQuery);
                }

                // Fetch products from tb_keranjang
                $sql = "SELECT * FROM tb_keranjang";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='product'>";
                        echo "<div class='product-info'>";
                        echo "<h3 class='product-name'>{$row['nama_produk']}</h3>";
                        echo "<h4 class='product-price'>Rp {$row['harga_produk']}</h4>";
                        echo "<form method='post'>";
                        echo "<p class='product-quantity'>Qty: </p>";
                        echo "<input type='number' name='quantity' value='{$row['jumlah_produk']}' min='1' style='width: 40px;'>";
                        echo "<input type='hidden' name='updateQuantity' value='{$row['id']}'>";
                        echo "<button type='submit'><i class='fa fa-refresh' aria-hidden='true'></i><span class='update'>Update</span></button>";
                        echo "</form>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='removeFromCart' value='{$row['id']}'>";
                        echo "<button type='submit'><i class='fa fa-trash' aria-hidden='true'></i><span class='remove'>Remove</span></button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No products in the cart.";
                }

                mysqli_close($conn);
                ?>
            </div>
            <div class="cart-total">
                <!-- Display total price and number of items here -->
                <?php
                // Calculate total price and number of items from the fetched products
                // You might need to modify this logic based on your table structure
                $totalPrice = 0;
                $numberOfItems = 0;

                if (mysqli_num_rows($result) > 0) {
                    mysqli_data_seek($result, 0); // Reset pointer to fetch data again

                    while ($row = mysqli_fetch_assoc($result)) {
                        $totalPrice += $row['harga_produk'] * $row['jumlah_produk'];
                        $numberOfItems += $row['jumlah_produk'];
                    }
                }

                echo "<p>";
                echo "<span>Total Price</span>";
                echo "<span>Rp $totalPrice</span>";
                echo "</p>";
                echo "<p>";
                echo "<span>Number of Items</span>";
                echo "<span>$numberOfItems</span>";
                echo "</p>";
                ?>
                <a href="#">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</body>
</html>
