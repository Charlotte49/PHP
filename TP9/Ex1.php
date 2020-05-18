<?php
include "connexpdo.php";

$base = 'pgsql:host=localhost;port=5432;dbname=notes;';
$user = 'postgres';
$password = 'isen2018';

$idcon=connexpdo($base,$user,$password);

header("Content-type: image/png");

$image = imagecreate(400, 150);
$gris = imagecolorallocate($image, 150, 150, 150);
$white = imagecolorallocate($image, 255, 255, 255);
$blue = imagecolorallocate($image, 0, 0, 255);
$black = imagecolorallocate($image, 0, 0, 0);

imagefilledrectangle($image, 10, 10, 310, 410, $gris);

$moy1=0;
$count=0;
$increment=0;

imagestring($image,15,10,65,"E1",$white);
$query1 = "SELECT note from notes where etudiant='E1'";
$result1 = $idcon->query($query1)->fetchAll();
for($i=0; $i<sizeof($result1); $i++)
{
    $moy1+=$result1[$i]['note'];

    if($i!=sizeof($result1)-1)
    {
        imageline($image , $increment  ,50-$result1[$i]['note']  , $increment+30  , 50-$result1[$i+1]['note'],  $white );
        $increment+=30;
    }
        $count++;
 }
$moy1=$moy1/$count;

$moy2=0;
$count=0;
imagestring($image,15,40,65,"E2",$blue);

$query2 = "SELECT note from notes where etudiant='E2'";
$result2 = $idcon->query($query2)->fetchAll();

$increment=0;

for($i=0; $i<sizeof($result2); $i++)
{
    $moy2+=$result2[$i]['note'];
    if($i!=sizeof($result2)-1)
    {
        imageline($image , $increment  ,50-$result2[$i]['note']  , $increment+30  , 50-$result2[$i+1]['note'],  $blue );
        $increment+=30;
    }
    $count++;
}
$moy2=$moy2/$count;

imagestring($image,2,100,100,"Moyenne des notes de E1: $moy1", $black);
imagestring($image,2,100,120,"Moyenne des notes de E2: $moy2", $black);

imagepng($image);