<?php
require 'db.php';

$action = $_GET['action'] ?? '';

if ($action === 'create' && !empty($_POST['title'])) {
    $stmt = $db->prepare("INSERT INTO tasks (title) VALUES (?)");
    $stmt->execute([$_POST['title']]);
}

if ($action === 'delete' && !empty($_GET['id'])) {
    $stmt = $db->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: index.php');
exit;
