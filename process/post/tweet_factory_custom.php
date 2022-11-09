<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  $_SESSION['error'] = 'Invalid request';
  die($_SESSION['error']);
 // header('location: ../logo_view.php');
}




// try {
$_SESSION['filess'] =  $_FILES;
if (isset($_FILES['file']['name'])) {


  if (isset($_SESSION['tweetFactoryMedia'])) {
    $_SESSION['tweetFactoryMedia'] = $_SESSION['tweetFactoryMedia'];
  } else {
    $_SESSION['tweetFactoryMedia'] = [];
  }

  $photo = $_FILES['file']['name'];
  $photo_path = realpath($_FILES['file']['name']);

  $ext = pathinfo($photo, PATHINFO_EXTENSION);
  $time_id = time();
  $the_id = sha1($time_id);
  $new_filename = $the_id . '.' . $ext;
  $file_path = '../../assets/uploads/' . $new_filename;

  move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
  $filename = $new_filename;

  $media1 = $abraham_client->upload('media/upload', ['media' => $file_path]);
  array_push($_SESSION['tweetFactoryMedia'], $media1->media_id_string);
  unlink($file_path);
}
// } catch (Exception $e) {
//   $_SESSION['error'] = $e->getMessage();
// }







//*

if (!isset($_FILES['file']['name'])) {
  $data = $_POST;
  $grammar = [];

  
  if (!isset($_SESSION['tweetFactoryMedia']) && !isset($data['kt_docs_repeater_advanced'])) {
    $_SESSION['error'] = 'Invalid: Automation should have either media or grammar!';
    die();
  }

  
  if (isset($data['kt_docs_repeater_advanced'])) {
    for ($i = 0; $i < count($data['kt_docs_repeater_advanced']); $i++) {
      ${$i} = [];
      $data_b = json_decode($data['kt_docs_repeater_advanced'][$i]['rule'], true);
      for ($c = 0;
        $c < count($data_b);
        $c++
      ) {
        ${$i}[$c] = $data_b[$c]['value'];
      }
      array_push($grammar, ${$i});
    }
  }




  if (isset($_SESSION['tweetFactoryMedia'])) {
    //$media = implode(',', $_SESSION['tweetFactoryMedia']);
    //array_push($grammar, array('media'=>$_SESSION['tweetFactoryMedia']));
    $grammar['media'] = $_SESSION['tweetFactoryMedia'];
    unset($_SESSION['tweetFactoryMedia']);
  }



  $title = $_POST['title'];
  $description = $_POST['desc'];
  $execution = $_POST['duration']*60;
  $automation = time();

  $file = $user['t_id'] . time() . ".json";
  $file_name = "../../process/client/tweet_factory/" . $file;

  $grammar_data = json_encode($grammar);

  $file_data = fopen($file_name, "w");

  fwrite($file_data, $grammar_data);

  fclose($file_data);

  $stmt = $conn->prepare("INSERT INTO tweet_factory (title, description, execution, automation, file_path, user_id) VALUES (:title, :description, :execution, :automation, :file_path, :user_id)");
  $stmt->execute(['title'=>$title, 'description'=>$description, 'execution'=>$execution, 'automation'=>$automation, 'file_path'=>$file, 'user_id'=>$user['id']]);

$_SESSION['success'] = 'Your automation has been set successfully';

}
//*/


//$_SESSION['postgrammar_b'] = count($_SESSION['tweetFactoryMedia']);

//echo 'Done';




