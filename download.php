<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['student']);

if (isset($_GET['file'])) {
  $filepath = $_GET['file'];
  if (file_exists($filepath)) {
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    readfile($filepath);
    exit();
  } else {
    echo "❌ File not found.";
  }
} else {
  echo "❌ No file specified.";
}
?>
