<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();

$stmt = $pdo->query("SELECT c.id, c.title, c.description, f.filename, f.filepath
                     FROM courses c
                     JOIN files f ON c.id = f.course_id
                     WHERE f.approved = 1");

echo "<div class='container'><h2>Available Courses</h2>";
while ($row = $stmt->fetch()) {
  echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
  echo "<p>" . htmlspecialchars($row['description']) . "</p>";
  echo "<a href='download.php?file=" . urlencode($row['filepath']) . "'>Download " . htmlspecialchars($row['filename']) . "</a>";
  echo "<form method='POST' action='comment.php'>
          <input type='hidden' name='course_id' value='" . $row['id'] . "'>
          <textarea name='content' placeholder='Leave a comment'></textarea>
          <button type='submit'>Comment</button>
        </form><hr>";
}
echo "</div>";
?>

