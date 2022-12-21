<?php
//ini_set('max_execution_time', 1800);
include '../../includes/conn.php';

////////////Automation tester
$stmt = $conn->prepare("INSERT INTO tester (slot) VALUES (:slot)");
$stmt->execute(['slot' => time()]);
/////////////////////////////
