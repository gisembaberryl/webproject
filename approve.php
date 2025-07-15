<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();

if (!hasRole('admin')) {
  echo "Access denied.";
  exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("UPDATE files SET approved = 1 WHERE id = ?");
$stmt->execute([$id]);
echo "✅ File approved.";
?>
