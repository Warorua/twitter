<?php
include '../../includes/conn.php';
 include '../../includes/session.php';
        require '../../vendor/autoload.php';
        include '../../includes/api_config.php';



/*
//echo json_encode($_SESSION['postTestData']);
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
$cipher_points = safeEncrypt(150000, $key);

$stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
$stmt->execute(['id'=>$user['id'], 'p_value'=>$cipher_points, 'p_key'=>$key, 'p_cipher'=>1]);
//*/



/*

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$usr = $stmt->fetchAll();
foreach($usr as $row){
    
//echo json_encode($_SESSION['postTestData']);
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
$cipher_points = safeEncrypt(10000, $key);

$stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
$stmt->execute(['id'=>$row['id'], 'p_value'=>$cipher_points, 'p_key'=>$key, 'p_cipher'=>1]);
}

//*/


/*
//echo json_encode($_SESSION['postTestData']);
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
$cipher_points = safeEncrypt(150000, $key);

$stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
$stmt->execute(['id'=>$user['id'], 'p_value'=>$cipher_points, 'p_key'=>$key, 'p_cipher'=>1]);
//*/



//*

$stmt = $conn->prepare("SELECT * FROM users WHERE p_cipher=0");
$stmt->execute();
$usr = $stmt->fetchAll();
foreach($usr as $row){
    
//echo json_encode($_SESSION['postTestData']);
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
$cipher_points = safeEncrypt($row['p_value'], $key);

$stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
$stmt->execute(['id'=>$row['id'], 'p_value'=>$cipher_points, 'p_key'=>$key, 'p_cipher'=>1]);
}

//*/
?>