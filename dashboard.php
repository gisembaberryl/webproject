<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
    <p>Your role: <?php echo $_SESSION['role']; ?></p>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
