<?php 
session_start();

$file = $_FILES['uploaded_file'];
$pdo = new PDO("mysql:host=MySQL-8.0;dbname=db", "root", "");
$sql = "INSERT INTO images (path) VALUES (:path)";
$stmt = $pdo->prepare($sql);

if ($file['error'] !== UPLOAD_ERR_OK) {
    die("Ошибка загрузки файла!");
}

$allowed = ['image/jpeg', 'image/png'];
if (!in_array($file['type'], $allowed)) {
    $_SESSION['error'] = "Неверный формат изображения";
    header('Location: /index.php');
    die();
}

$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$newName = uniqid() . "-" . basename($file['name']);
$target = $uploadDir . $newName;


if (move_uploaded_file($file['tmp_name'], $target)) {
    $_SESSION['success'] = "Файл успешно загружен";
} else {
    $_SESSION['error'] = "Ошибка загрузки";
}

// Добавил путь файла в бд
$stmt->execute(["path" => $target]);

header('Location: /index.php');

