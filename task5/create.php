<?php
$comment = $_POST['comment'];
// echo $comment;

$host = "MySQL-8.0";
$name = "db";
$user = "root";
$password = "";

$pdo = new PDO("mysql:host=$host;dbname=$name", $user, $password);
// var_dump($pdo);

$sql = "INSERT INTO comments (body) VALUES (:comment)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['comment' => $comment]);

