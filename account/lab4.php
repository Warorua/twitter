<?php
//*
include '../includes/conn.php';

include '../includes/session.php';

require '../vendor/autoload.php';

include '../includes/api_config.php';

$conn =$pdo->open();
$stmt = $conn->prepare("SELECT *, users.id AS usid FROM users LEFT JOIN client_api ON users.id = client_api.user_id");
$stmt->execute();
$data = $stmt->fetchAll();

//echo json_encode($data);

echo json_encode($_GET);
//*/

//echo 'Yuuup';