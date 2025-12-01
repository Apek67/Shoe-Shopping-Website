<?php
session_start();
include("../config/db.php");
$result = $conn->query("SELECT * FROM tbl_products");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Products - Shoe Shop</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<h2>Our Products</h2>
<div class="product-list">
<?php while($row = $result->fetch_assoc()): ?>
  <div class="product-card">
    <img src="../assets/images/<?php echo $row['image_url']; ?>" width="150">
    <h3><?php echo $row['name']; ?></h3>
    <p>₹<?php echo $row['price']; ?></p>
    <form method="POST" action="cart.php">
      <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
      <button type="submit">Add to Cart</button>
    </form>
  </div>
<?php endwhile; ?>
</div>
</body>
</html>
