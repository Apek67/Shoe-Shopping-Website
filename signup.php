<?php
include("../config/db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_users (name,email,password) VALUES ('$name','$email','$password')";
    if ($conn->query($sql)) {
        header("Location: login.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup - Shoe Shop</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="form-container">
  <h2>Create Account</h2>
  <form method="POST">
    <input type="text" name="name" placeholder="Enter Name" required><br>
    <input type="email" name="email" placeholder="Enter Email" required><br>
    <input type="password" name="password" placeholder="Enter Password" required><br>
    <button type="submit">Signup</button>
  </form>
</div>
</body>
</html>


