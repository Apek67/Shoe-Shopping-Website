<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){ die("Access Denied"); }

if($_SERVER['REQUEST_METHOD']=="POST"){
  $name=$_POST['name']; $price=$_POST['price']; $cat=$_POST['category']; $desc=$_POST['description'];
  $img=$_POST['image_url'];
  $conn->query("INSERT INTO tbl_products (name,category,price,description,image_url) VALUES ('$name','$cat',$price,'$desc','$img')");
}
$products=$conn->query("SELECT * FROM tbl_products");
?>
<!DOCTYPE html>
<html>
<head><title>Admin Panel</title></head>
<body>
<h2>Admin Panel - Manage Products</h2>
<form method="POST">
  <input type="text" name="name" placeholder="Shoe Name" required>
  <input type="text" name="category" placeholder="Category" required>
  <input type="number" name="price" placeholder="Price" required>
  <input type="text" name="image_url" placeholder="Image Filename" required>
  <textarea name="description" placeholder="Description"></textarea>
  <button type="submit">Add Product</button>
</form>
<h3>Product List</h3>
<table>
<tr><th>ID</th><th>Name</th><th>Price</th></tr>
<?php while($p=$products->fetch_assoc()): ?>
<tr><td><?php echo $p['product_id']; ?></td><td><?php echo $p['name']; ?></td><td>₹<?php echo $p['price']; ?></td></tr>
<?php endwhile; ?>
</table>
</body>
</html>
