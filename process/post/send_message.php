<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
//*
$ms_1 = $_POST['message'];

$ms_2 = str_replace('/"', '"', $ms_1);
$ms_3 = json_decode($ms_2, true);
//*/




if(isset($ms_3['ops'][0]['insert'])){
    $text = strip_tags($ms_3['ops'][0]['insert']);
//$text = 'broooooo';


    $media = [];
if(isset($ms_3['ops'][1]['insert']['image'])){
    $good_pic = strstr($ms_3['ops'][1]['insert']['image'], 'base64,');
    $good_pic2 = str_replace("base64,", "", $good_pic);

   $image = $good_pic2; 
  // $image = base64_encode(file_get_contents('https://media.geeksforgeeks.org/wp-content/uploads/geeksforgeeks-22.png')); 
 //$_SESSION['mypic'] = $image;

   $time_id2 = time();
   $the_id2 = sha1($time_id2);
   $new_filename2 = $the_id2 . '.png';
   $filename = '../../assets/uploads/UPL' . $new_filename2;
   file_put_contents($filename, base64_decode($image));
   $media1 = $abraham_client->upload('media/upload', ['media' => $filename]);
   // $img_1 = $media1->media_id_string;
   array_push($media, $media1->media_id_string);
   unlink($filename);
   $media2 = implode(',', $media);

   $obj_1 = [
    'text' => $text,
    'attachment' =>  [
    'type' => 'media',
    'media' => [
        'id' => $media2
    ]
    ]];

    

}else{
    $image = '';
    $obj_1 = ['text' => $text,];
}







$abraham_client->setApiVersion('1.1');

$obj = '';
    $obj = [
        'event' => [
            'type' => 'message_create',
            'message_create' => [
                'target' => [
                    'recipient_id' => $_SESSION['activeMessenger']
                ],
                'message_data' => $obj_1
            ]
        ]
    ];

$data = $abraham_client->post('direct_messages/events/new', $obj, true);
$_SESSION['success'] = 'Message sent!';
echo json_encode($data);
}else{
    $_SESSION['error'] = 'Text cannot be empty';
}


