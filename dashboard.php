<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$role = $_SESSION['role']; // 'lecturer', 'student', or 'admin'
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
    <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
    <p>Your role: <strong><?php echo ucfirst($role); ?></strong></p>

    <?php if ($role === 'lecturer'): ?>
      <h3>Lecturer Tools</h3>
      <ul>
        <li><a href="upload.php">Upload Assignments, Notes & Exams</a></li>
        <li><a href="create_course.php">Create New Course</a></li>
        <li><a href="view_comments.php">View Student Comments</a></li>
      </ul>

    <?php elseif ($role === 'student'): ?>
      <h3>Student Tools</h3>
      <ul>
        <li><a href="courses.php">Browse Courses by Unit</a></li>
        <li><a href="download.php">Download Materials</a></li>
        <li><a href="comment.php">Ask Questions / Comment</a></li>
      </ul>

    <?php elseif ($role === 'admin'): ?>
      <h3>Admin Tools</h3>
      <ul>
        <li><a href="moderate.php">Moderate Uploaded Files</a></li>
        <li><a href="approve.php">Approve Pending Uploads</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
      </ul>
    <?php endif; ?>

    <p><a href="logout.php">Logout</a></p>
  </div>
</body>
</html>
