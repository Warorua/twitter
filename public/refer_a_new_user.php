<?php
include '../includes/conn.php';
//*
if (isset($_GET['refid'])) {
    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE referer_code=:referer_code");
    $stmt->execute(['referer_code' => $_GET['refid']]);
    $auth_1 = $stmt->fetch();
    if ($auth_1['numrows'] > 0) {
        $_SESSION['refererId'] = $auth_1['id'];
        header('location:'.$parent_url . '/v2/new');
    } else {
        $_SESSION['error'] = 'Referer not found!';
        header('location:'.$parent_url . '/v2/new');
    }
} else {
    header('location:'.$parent_url . '/v2/new');
}
