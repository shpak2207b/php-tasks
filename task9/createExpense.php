<?php
session_start();

$database = "MySQL-8.0";
$dbname = "db";
$user = "root";
$password = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $expense_name = trim($_POST['name']);
    $expense_amount = trim($_POST['amount']);

        if (!empty($expense_name) && !empty($expense_amount)) {
        $pdo = new PDO("mysql:host=$database;dbname=$dbname", $user, $password);
        $sql = "INSERT INTO expenses (name, amount) VALUES (:name, :amount)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $expense_name, 'amount' => $expense_amount]);
        
        $_SESSION['success'] = "Действие выполнено успешно.";

    }
    else {
        $_SESSION['error'] = "Ошибка.";
        echo "Заполните все поля!!";
    }
};

header('Location: /index.php');


