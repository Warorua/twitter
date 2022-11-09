<?php
require '../../vendor/autoload.php';
include '../../includes/conn.php';
$httpClient = new \simplehtmldom\HtmlWeb();
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
///////////////         HOME PAGE TRENDING            ///////////////////////////////
$link = 'https://www.peakpx.com/en/search?q=neon';
$output = '';
//Title
$response = $httpClient->load($link);
//$title = $response->find('article.c-article-card  a span', 0)->plaintext . PHP_EOL . PHP_EOL;
//$text = $title.' ~Automated';

//$output .= sizeof($img).' - size of image array <br/>';
//Link HREF
$href =  $response->find('li[itemprop="associatedMedia"] figure img[itemprop="thumbnail"]');
foreach($href as $row){
 $f_href = $row->{'data-src'};   

 $url = $f_href;

 $ext = pathinfo($url, PATHINFO_EXTENSION);

 $img = '../../process/client/scrape_images/SR_' . time() .'.'. $ext;

 // echo $img . '----------pic';

 file_put_contents($img, file_get_contents($url));

 //  sleep(3);
  echo $f_href.'<img src="'.$f_href.'" /><br/>';
}


