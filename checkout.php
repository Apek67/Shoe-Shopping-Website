<?php
session_start();
include("../config/db.php");
$uid = $_SESSION['user_id'] ?? 0;
if ($uid==0) { header("Location: login.php"); exit; }

$result = $conn->query("SELECT c.cart_id,p.product_id,p.price FROM tbl_cart c JOIN tbl_products p ON c.product_id=p.product_id WHERE c.user_id=$uid");
$total = 0;
$items = [];
while($row=$result->fetch_assoc()){
  $total += $row['price'];
  $items[] = $row;
}
$conn->query("INSERT INTO tbl_orders (user_id,total_amount) VALUES ($uid,$total)");
$order_id = $conn->insert_id;
foreach($items as $i){
  $pid=$i['product_id']; $price=$i['price'];
  $conn->query("INSERT INTO tbl_order_items (order_id,product_id,quantity,price) VALUES ($order_id,$pid,1,$price)");
}
$conn->query("DELETE FROM tbl_cart WHERE user_id=$uid");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Checkout - Shoe Shop</title>
</head>
<body>
<h2>Order Placed Successfully!</h2>
<p>Your Order ID: <?php echo $order_id; ?></p>
<a href="../index.php">Continue Shopping</a>
</body>
</html>
