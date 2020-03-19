
<?php

echo "<h1>TP4</h1>";

echo "<h2>Ex1</h2>";


echo "EN :".date('l j F Y')."<br>";

setlocale (LC_TIME,'fr_FR.utf8');
echo "FR : ".strftime("%A %e %B %Y",time())."<br>";
echo "Date et heure : ".date( 'j/m/Y G:i')."<br>";

echo "Il est passé ".time()." depuis les premières apparitions d'UNIX
"."<br> <br>";



echo "<h2>Ex2</h2>";

$d = new DateTime('2000-10-03');

echo "Date de naissance : ";
echo date_format($d,'j-m-Y ')."<br>";
echo "Date du jour : ";

$d1=new DateTime();
echo date_format($d1,'j-m-Y ')."<br>";


echo "Age : ";

$int=$d->diff($d1);

echo $int->format('%Y années %m mois et %d jours');


echo "<br> <br>";
echo "<h2>Ex3</h2>";

$d = new DateTime('2020-02-09');
$d->setTime(8,34,35);
$interval = new DateInterval("P29DT12H44M3S");
$d->add($interval);
echo $d->format('j-m-Y G:i:s')."<br>";

for($i=0; $i<99;$i++)
{
   $d=$d->add($interval);
}
echo $d->format('j-m-Y G:i:s');



echo "<br> <br>";
echo "<h2>Ex4</h2>";

$t=checkdate(02,29,1962);
if ($t==true) echo "La date a existé";
else echo "La date n'a pas existé";


echo "<br> <br>";
echo "<h2>Ex5</h2>";

$d = mktime(0,0,0,3,3,1993);
setlocale (LC_TIME,'fr_FR.utf8');

echo "Le 3 mars 1993 était un ".strftime('%A',$d);

echo "<br> <br>";
echo "<h2>Ex6</h2>";



for($i=2020; $i<=2062;$i++)
{
    $d=date('L',mktime(0, 0, 0, 0, 0, $i));
    if ($d==1)
    {echo $i." est bissextile".'<br>';}
    else {echo $i." n'est pas bissextile".'<br>';}
}



?>