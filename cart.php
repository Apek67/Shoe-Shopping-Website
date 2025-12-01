<?php
session_start();
include("../config/db.php");

if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_SESSION['user_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];
    $conn->query("INSERT INTO tbl_cart (user_id,product_id,quantity) VALUES ($user_id,$product_id,1)");
}

$uid = $_SESSION['user_id'] ?? 0;
$result = $conn->query("SELECT c.cart_id,p.name,p.price FROM tbl_cart c JOIN tbl_products p ON c.product_id=p.product_id WHERE c.user_id=$uid");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cart - Shoe Shop</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<h2>Your Cart</h2>
<table>
<tr><th>Product</th><th>Price</th></tr>
<?php while($row=$result->fetch_assoc()): ?>
<tr><td><?php echo $row['name']; ?></td><td>₹<?php echo $row['price']; ?></td></tr>
<?php endwhile; ?>
</table>
<a href="checkout.php">Proceed to Checkout</a>
</body>
</html>
