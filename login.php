<?php
session_start();
include("../config/db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM tbl_users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];
            header("Location: ../index.php");
        } else {
            echo "Invalid Password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Shoe Shop</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="form-container">
  <h2>Login</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Enter Email" required><br>
    <input type="password" name="password" placeholder="Enter Password" required><br>
    <button type="submit">Login</button>
  </form>
</div>
</body>
</html>
