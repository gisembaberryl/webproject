<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['admin']);

$stmt = $pdo->query("SELECT f.id, f.filename, u.name AS uploader
                     FROM files f
                     JOIN users u ON f.uploaded_by = u.id
                     WHERE f.approved = 0");

echo "<div class='container'><h2>Pending Files</h2>";
while ($row = $stmt->fetch()) {
  echo "<p><strong>" . htmlspecialchars($row['filename']) . "</strong> uploaded by " . htmlspecialchars($row['uploader']) .
       " <a href='approve.php?id=" . $row['id'] . "'>✅ Approve</a></p>";
}
echo "</div>";
?>
