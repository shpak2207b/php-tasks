<?php
session_start();

$database = "MySQL-8.0";
$dbname = "db";
$user = "root";
$password = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $comment = trim($_POST['comment']);
    if (!empty($comment)) {
        $pdo = new PDO("mysql:host=$database;dbname=$dbname", $user, $password);
        $sql = "INSERT INTO comments (body) VALUES (:comment)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['comment' => $comment]);
        
        $_SESSION['success'] = "Успешно";

    }
    else {
        $_SESSION['error'] = "форма не прошла валидацию";
        echo "форма пустая!!";
    }
};

header('Location: /index.php');


