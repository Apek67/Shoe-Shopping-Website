<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Online Shoe Shop</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <h1>Online Shoe Shopping</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="pages/products.php">Products</a>
      <a href="pages/cart.php">Cart</a>
      <?php if(isset($_SESSION['user_id'])): ?>
          <a href="pages/logout.php">Logout</a>
      <?php else: ?>
          <a href="pages/login.php">Login</a>
          <a href="pages/signup.php">Signup</a>
      <?php endif; ?>
      <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"): ?>
          <a href="pages/admin.php">Admin Panel</a>
      <?php endif; ?>
    </nav>
  </header>

  <section>
    <h2>Welcome to the Online Shoe Shop</h2>
    <p>Browse latest collection of shoes and order online!</p>
  </section>
</body>
</html>
