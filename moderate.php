<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();

if (!hasRole('admin')) {
  echo "Access denied.";
  exit();
}

$stmt = $pdo->query("SELECT * FROM files WHERE approved = 0");
while ($file = $stmt->fetch()) {
  echo "<p>{$file['filename']} <a href='approve.php?id={$file['id']}'>Approve</a></p>";
}
?>
