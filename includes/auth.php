<?php
session_start();

function requireLogin() {
  if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
  }
}

function requireRole($roles = []) {
  if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $roles)) {
    header("Location: dashboard.php");
    exit();
  }
}
?>
