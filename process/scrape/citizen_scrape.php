<?php
require '../../vendor/autoload.php';
include '../../includes/conn.php';
$httpClient = new \simplehtmldom\HtmlWeb();
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
///////////////         HOME PAGE TRENDING            ///////////////////////////////
$link = 'https://www.citizen.digital';
$output = '';
//Title
$response = $httpClient->load($link);
//$title = $response->find('article.c-article-card  a span', 0)->plaintext . PHP_EOL . PHP_EOL;
//$text = $title.' ~Automated';

//$output .= sizeof($img).' - size of image array <br/>';
//Link HREF
$href =  $response->find('div.home div.topstory div.main-img a[href]');
$f_href = $href[0]->href;
//echo $f_href.'<br/>';

$h_link = $link.$f_href;
$content = $httpClient->load($h_link);


//Image
$img = $content->find('meta[name="twitter:image"]');
$pic_1 = $img[0]->content;
$image = $pic_1;

$date = $content->find('meta[property="article:published_time"]');
$dt_1 = $date[0]->content;
$time = $dt_1;

$title_1 = $content->find('meta[name="twitter:description"]');
$title = $title_1[0]->content;
$text = $title.' ~ Citizen Digital';

$title_2 = $content->find('meta[name="twitter:title"]');
$tit = $title_2[0]->content;
$text_2 = $tit.' ~ Citizen Digital';

//echo $time.'<br/>';

$media = array($image);

$output = array(
    'text'=>$text,
    'short_text'=>$text_2,
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
    $parent = "citizen.digital";
    //insert into database
    $stmt = $conn->prepare("INSERT INTO bot_control (source, deep_link) VALUES (:source, :deep_link)");
    $stmt->execute(['source' => $parent, 'deep_link' => $h_link]);
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

