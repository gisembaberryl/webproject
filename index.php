<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header("Location: dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Course Sharing App</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Welcome to the Course Sharing Platform</h2>
    <p><a href="login.php">Login</a> or <a href="register.php">Register</a></p>
  </div>
</body>
</html>
