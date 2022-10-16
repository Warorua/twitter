<?php
require '../../vendor/autoload.php';
include '../../includes/conn.php';
$httpClient = new \simplehtmldom\HtmlWeb();
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
///////////////         HOME PAGE TRENDING            ///////////////////////////////
$link = 'https://www.tuko.co.ke/';
$output = '';
//Title
$response = $httpClient->load($link);
$title = $response->find('article.c-article-card  a span', 0)->plaintext . PHP_EOL . PHP_EOL;
$text = $title.' #Tuko';


//$output .= sizeof($img).' - size of image array <br/>';
//Link HREF
$href =  $response->find('article.c-article-card a[href]');
$f_href = $href[0]->href;
//echo $f_href.'<br/>';

$h_link = $f_href;
$content = $httpClient->load($h_link);


//Image
$img = $content->find('div.post__content img.article-image__picture');
$pic_1 = $img[0]->src;
$image = $pic_1;

$date = $content->find('div.c-article-info time.c-article-info__time');
$dt_1 = $date[0]->datetime;
$time = $dt_1;

//echo $time.'<br/>';

$media = array($image);

$output = array(
    'text'=>$text,
    'media'=>$media,
    'status'=>400
);

/*
foreach($output['media'] as $row) {
    echo $row;
}*/

//echo $output;


$conn = $pdo->open();
$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM bot_control WHERE deep_link=:deep_link");
$stmt->execute(['deep_link'=>$h_link]);

$ct = $stmt->fetch();
if ($ct['numrows'] < 1) {
    $parent = "tuko.co.ke";
    //insert into database
    $stmt = $conn->prepare("INSERT INTO bot_control (source, deep_link) VALUES (:source, :deep_link)");
    $stmt->execute(['source' => $parent, 'deep_link' => $f_href]);
    $lst_id = $conn->lastInsertId();
    $del_id = $lst_id - 1;
    //echo $lst_id . '<br/>';
    //*
    $stmt = $conn->prepare("DELETE FROM bot_control WHERE id<:id AND source=:source");
    $stmt->execute(['source' => $parent, 'id' => $del_id]);
  // */
  echo json_encode($output);
 } else {
    echo json_encode(array('status'=>403));
}

