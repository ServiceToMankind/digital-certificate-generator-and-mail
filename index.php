<?php

// to view single image
// header('content-type:image/jpeg');

// extract data from csv file
$file = fopen('sample.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
  $data=$line;
}
fclose($file);

// List of applicants
$row=$data;

   
for($i=0;$i<=count($row);$i++){
$uname=$row["$i"];

$font='HapticScript-Regular2.otf';
$image=imagecreatefromjpeg('template.jpg');
$name="$uname";

$color=imagecolorallocate($image,242,82,112);
$black=imagecolorallocate($image,0,0,0);

//image size
$width= imagesx($image);
$height=imagesy($image);

// Logic to centre the text boxes w.r.t to image.
//text size
$text_size = imagettfbbox(390,0,$font,$name);
$text_width= max([$text_size[2], $text_size[2]]) - min([$text_size[0], $text_size[6]]);
$text_height= max([$text_size[5],$text_size[7]]) - min([$text_size[1], $text_size[3]]);

//centre the text
$centerX = CEIL(($width - $text_width) / 2);
$centerY = CEIL(($height - $text_height) / 2);
$centerX = $centerX<0 ? 0 : $centerX ;
$centerY = $centerY<0 ? 0 : $centerY ;




//write
imagettftext($image,390,0,580,3458,$color,$font,$name);
$idfilepath="result/".$name.".jpg";
imagejpeg($image,$idfilepath);
// to view single image
// imagejpeg($image);
imagedestroy($image);

}
echo "done, enjoy";