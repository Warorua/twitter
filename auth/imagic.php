<?php
require '../vendor/autoload.php';

// Create an Imagick object
$image = new Imagick();

// Use newImage function to create new image
$image->newImage(650, 400, new ImagickPixel('green'));

// Set the image format
$image->setImageFormat('png');

header('Content-type: image/png');

// Display the output image
echo $image;
?>

?>

