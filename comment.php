<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['student']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $course_id = $_POST['course_id'];
  $content = trim($_POST['content']);

  if ($content !== '') {
    $stmt = $pdo->prepare("INSERT INTO comments (course_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->execute([$course_id, $_SESSION['user_id'], $content]);
    echo "💬 Comment posted!";
  } else {
    echo "❌ Comment cannot be empty.";
  }
}
?>


