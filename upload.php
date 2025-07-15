<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();
requireRole(['lecturer']);

// Fetch lecturer's courses
$stmt = $pdo->prepare("SELECT id, title FROM courses WHERE lecturer_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$courses = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $course_id = $_POST['course_id'];
  $file = $_FILES['file'];
  $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
  $allowed = ['pdf', 'docx', 'pptx'];

  if (in_array($ext, $allowed)) {
    $target = 'uploads/' . time() . '_' . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $target);

    $stmt = $pdo->prepare("INSERT INTO files (course_id, filename, filepath, uploaded_by) VALUES (?, ?, ?, ?)");
    $stmt->execute([$course_id, $file['name'], $target, $_SESSION['user_id']]);
    echo "✅ File uploaded and pending approval.";
  } else {
    echo "❌ Invalid file type.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Materials</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Upload Course Materials</h2>
    <form method="POST" enctype="multipart/form-data">
  <label>Select Course:</label>
  <select name="course_id" required>
    <?php foreach ($courses as $course): ?>
      <option value="<?= $course['id'] ?>"><?= htmlspecialchars($course['title']) ?></option>
    <?php endforeach; ?>
  </select>

  <label>Select File Type:</label>
  <select name="type" required>
    <option value="assignment">Assignment</option>
    <option value="notes">Notes</option>
    <option value="exam">Exam</option>
  </select>

  <input type="file" name="file" required>
  <button type="submit">Upload</button>
</form>
  </div>
</body>
</html>
