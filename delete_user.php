<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['admin']);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
  $stmt->execute([$id]);
  echo "✅ User deleted.";
} else {
  echo "❌ No user ID provided.";
}
?>
