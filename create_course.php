<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['lecturer']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $unit = $_POST['unit'];
  $lecturer_id = $_SESSION['user_id'];

  $stmt = $pdo->prepare("INSERT INTO courses (title, description, unit, lecturer_id) VALUES (?, ?, ?, ?)");
  $stmt->execute([$title, $description, $unit, $lecturer_id]);
  echo "<p style='color:green;'>✅ Course created successfully!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Course</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Create New Course</h2>
    <form method="POST">
      <input type="text" name="title" placeholder="Course Title" required>
      <textarea name="description" placeholder="Course Description" required></textarea>
      <input type="text" name="unit" placeholder="Unit Code or Name" required>
      <button type="submit">Create Course</button>
    </form>
    <p><a href="dashboard.php">← Back to Dashboard</a></p>
  </div>
</body>
</html>
