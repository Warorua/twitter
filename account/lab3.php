<?php
require '../vendor/autoload.php';
include '../includes/conn.php';
include '../includes/session.php';

$method = $_SERVER['REQUEST_METHOD'];
$page = $_POST['page'];
$var = $_POST['var'];

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO process_engine (request_method,page,var_1) VALUES (:req, :page, :var_1)");
$stmt->execute(['req'=>$method, 'page'=>$page, 'var_1'=>$var]);

echo json_encode($_POST);
?>