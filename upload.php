<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();

if (!hasRole('lecturer')) {
  echo "Access denied.";
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $course_id = $_POST['course_id'];
  $file = $_FILES['file'];
  $allowed = ['pdf', 'docx', 'pptx'];
  $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

  if (in_array($ext, $allowed)) {
    $target = 'uploads/' . time() . '_' . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $target);

    $stmt = $pdo->prepare("INSERT INTO files (course_id, filename, filepath, uploaded_by) VALUES (?, ?, ?, ?)");
    $stmt->execute([$course_id, $file['name'], $target, $_SESSION['user_id']]);
    echo "✅ File uploaded and pending approval.";
  } else {
    echo "❌ Invalid file type.";
  }
}
?>
