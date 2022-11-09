<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  $_SESSION['error'] = 'Invalid request';
  $output = $_SESSION['error'];
  die($_SESSION['error']);
 // header('location: ../logo_view.php');
}


//*
$output = 'TEST START';
if (!isset($_FILES['file']['name'])) {
  $data = $_POST;
  $grammar = [];

  
  if (!isset($data['kt_docs_repeater_advanced'])) {
    $output = array('error','Invalid: Grammar is empty!');
   // die();
  }

  
  if (isset($data['kt_docs_repeater_advanced'])) {
    for ($i = 0; $i < count($data['kt_docs_repeater_advanced']); $i++) {
      ${$i} = [];
      $data_b = json_decode($data['kt_docs_repeater_advanced'][$i]['rule'], true);
      for ($c = 0;
        $c < count($data_b);
        $c++
      ) {
        ${$i}[$c] = htmlspecialchars($data_b[$c]['value']);
      }
      array_push($grammar, ${$i});
    }
  }

  if (isset($grammar['media'])) {
    $data_size = count($grammar) - 1;
  } else {
    $data_size = count($grammar);
  }

  
  $text = '';
  for ($a = 0; $a < $data_size; $a++) {
    $arr = $grammar[$a];
    $key = array_rand($arr);
    $text .= $arr[$key] . ' ';
  }

  //echo $text . '<br/>';
  if (isset($data['kt_docs_repeater_advanced'])) {
  $output = array('info',$text);
  }
  

}
//*/


//$_SESSION['postgrammar_b'] = count($_SESSION['tweetFactoryMedia']);

//echo 'Done';
echo json_encode($output);
//echo json_encode($data);


