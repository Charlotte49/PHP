<?php
include "connexpdo.php";

$base = 'pgsql:host=localhost;port=5432;dbname=notes;';
$user = 'postgres';
$password = 'isen2018';

$idcon=connexpdo($base,$user,$password);

header("Content-type: image/png");

$image = imagecreate(400, 300);
$gris = imagecolorallocate($image, 150, 150, 150);
$white = imagecolorallocate($image, 255, 255, 255);
$blue = imagecolorallocate($image, 0, 0, 255);

imagefilledrectangle($image, 10, 10, 310, 410, $gris);

$moy1=0;
$increment=100;

$query1 = "SELECT note from notes where etudiant='E1'";
$result1 = $idcon->query($query1)->fetchAll();
for($i=0; $i<sizeof($result1)-1; $i++)
{

    imageline($image , $increment  ,100-$result1[$i]['note']  , $increment+20  , 100-$result1[$i+1]['note'],  $white );
    $increment+=20;
 }

$query2 = "SELECT note from notes where etudiant='E2'";
$result2 = $idcon->query($query1)->fetchAll();

$increment=100;

for($i=0; $i<sizeof($result2)-1; $i++)
{

    imageline($image , $increment  ,105-$result2[$i]['note']  , $increment+20  , 105-$result2[$i+1]['note'],  $blue );
    $increment+=20;
}


imagepng($image);