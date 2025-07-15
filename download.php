<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();

$file_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM files WHERE id = ? AND approved = 1");
$stmt->execute([$file_id]);
$file = $stmt->fetch();

if ($file && file_exists($file['filepath'])) {
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="' . $file['filename'] . '"');
  readfile($file['filepath']);
  exit();
} else {
  echo "❌ File not found or not approved.";
}
?>
