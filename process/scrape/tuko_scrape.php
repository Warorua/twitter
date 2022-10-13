<?php
require '../../vendor/autoload.php';
$httpClient = new \simplehtmldom\HtmlWeb();
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
///////////////         HOME PAGE TRENDING            ///////////////////////////////
$link = 'https://www.tuko.co.ke/';
$output = '';
//Title
$response = $httpClient->load($link);
$title = $response->find('article.c-article-card  a span', 0)->plaintext . PHP_EOL . PHP_EOL;
$text = $title.' @Tuko_co_ke';


//$output .= sizeof($img).' - size of image array <br/>';
//Link HREF
$href =  $response->find('article.c-article-card a[href]');
$f_href = $href[0]->href;
$output .= $f_href.'<br/>';

$h_link = $f_href;
$content = $httpClient->load($h_link);


//Image
$img = $content->find('div.post__content img.article-image__picture');
$pic_1 = $img[0]->src;
$image = $pic_1;

$media = array($image,$image);

$output = array(
    'text'=>$text,
    'media'=>$media
);

/*
foreach($output['media'] as $row) {
    echo $row;
}*/

//echo $output['media'][0];
echo json_encode($output);

