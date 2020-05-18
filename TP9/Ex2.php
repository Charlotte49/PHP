<?php
include "connexpdo.php";

$base = 'pgsql:host=localhost;port=5432;dbname=grapheactions;';
$user = 'postgres';
$password = 'isen2018';

$idcon=connexpdo($base,$user,$password);

header("Content-type: image/png");

$image = imagecreate(110, 150);
$gris = imagecolorallocate($image, 150, 150, 150);
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0);

imagefilledrectangle($image, 10, 10, 310, 410, $gris);
imagestring($image,1,10,10,"Cours des actions", $green);
imagestring($image,1,10,20,"Als et For en 2010", $green);

$increment=0;

imagestring($image,3,10,130,"For",$red);

$query1 = "SELECT valeur from statistique where (action='For')";
$result1 = $idcon->query($query1)->fetchAll();

for($i=0; $i<sizeof($result1)-1; $i++)
{
    imageline($image , $increment  ,130-$result1[$i]['valeur']  , $increment+10  , 130-$result1[$i+1]['valeur'],  $red );
    $increment+=10;
}

imagestring($image,3,70,130,"Als",$white);

$query2 = "SELECT valeur from statistique where (action='Als')";
$result2 = $idcon->query($query2)->fetchAll();
$increment=0;

for($i=0; $i<sizeof($result2)-1; $i++)
{
    imageline($image , $increment  ,140-$result2[$i]['valeur']  , $increment+10  , 140-$result2[$i+1]['valeur'],  $white );
    $increment+=10;
}

imagepng($image);