<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['lecturer']);

$stmt = $pdo->prepare("SELECT c.title, cm.content, u.name, cm.timestamp
                       FROM comments cm
                       JOIN courses c ON cm.course_id = c.id
                       JOIN users u ON cm.user_id = u.id
                       WHERE c.lecturer_id = ?
                       ORDER BY cm.timestamp DESC");
$stmt->execute([$_SESSION['user_id']]);

echo "<div class='container'><h2>Student Comments</h2>";
while ($row = $stmt->fetch()) {
  echo "<p><strong>" . htmlspecialchars($row['name']) . "</strong> on <em>" . htmlspecialchars($row['title']) . "</em>:<br>" .
       htmlspecialchars($row['content']) . "<br><small>" . $row['timestamp'] . "</small></p><hr>";
}
echo "</div>";
?>
