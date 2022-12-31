<?php
require '../../vendor/autoload.php';
include '../../includes/conn.php';
$_SESSION['user_id'] = 14;
include '../../includes/session.php';
include '../../includes/api_config.php';

$abraham_client->setApiVersion('1.1');
$data = $abraham_client->get('direct_messages/events/list', [
    "count" => 10,
]);
$dt1 = array_convert($data);
$arr = array();

foreach ($dt1['events'] as $row) {

    $data2 = $abraham_client->delete('direct_messages/events/destroy', [
        "id" => $row['id'],
    ]);

    echo json_encode($data2). '<br/>';
}
//echo json_encode($dt1['events']);