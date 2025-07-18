<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['admin']);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $pdo->prepare("UPDATE files SET approved = 1 WHERE id = ?");
  $stmt->execute([$id]);
  echo "✅ File approved.";
} else {
  echo "❌ No file ID provided.";
}
?>
