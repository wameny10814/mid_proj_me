<?php require __DIR__ . '/parts/connect.php';
header('Content-Type: application/json');
session_start();

$sid = isset($_SESSION['user']['sid']) ? intval($_SESSION['user']['sid']) : '';

if (!empty($sid)) {
    $pdo->query("DELETE FROM `member` WHERE sid=$sid");
}

header("Location: login.php");
