<?php 
session_start();

$database = "MySQL-8.0";
$dbname = "db";
$user = "root";
$password = "";

$id = $_GET['id'];

$pdo = new PDO("mysql:host=$database;dbname=$dbname", $user, $password);
$sql = "DELETE FROM expenses WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

header('Location: /index.php');
