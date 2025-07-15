<?php
require 'includes/auth.php';
requireLogin();
$role = $_SESSION['role'];
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Welcome, <?= htmlspecialchars($name) ?>!</h2>
    <p>Your role: <strong><?= ucfirst($role) ?></strong></p>

    <?php if ($role === 'lecturer'): ?>
      <h3>Lecturer Tools</h3>
  <ul>
    <li><a href="create_course.php">Create New Course</a></li>
    <li><a href="upload.php">Upload Materials</a></li>
    <li><a href="view_comments.php">View Student Comments</a></li>
  </ul>
    <?php elseif ($role === 'student'): ?>
      <h3>Student Tools</h3>
      <ul>
        <li><a href="courses.php">Browse Courses</a></li>
        <li><a href="comment.php">Comment on Courses</a></li>
      </ul>
    <?php elseif ($role === 'admin'): ?>
      <h3>Admin Tools</h3>
      <ul>
        <li><a href="moderate.php">Moderate Files</a></li>
        <li><a href="approve.php">Approve Uploads</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
      </ul>
    <?php endif; ?>

    <p><a href="logout.php">Logout</a></p>
  </div>
</body>
</html>
