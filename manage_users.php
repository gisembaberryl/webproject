<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['admin']);

$stmt = $pdo->query("SELECT id, name, email, role FROM users");

echo "<div class='container'><h2>Manage Users</h2>";
while ($user = $stmt->fetch()) {
  echo "<p>" . htmlspecialchars($user['name']) . " (" . $user['role'] . ") - " . htmlspecialchars($user['email']) . "</p>";
}
echo "</div>";
?>
