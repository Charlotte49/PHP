<?php
echo"<h1>TP2</h1>";
echo"<hr>";
/*
echo "<h2>Ex1</h2>";
echo"<hr>";

echo "<h3>1.</h3>";

$personne = rand(0,100);
$categorie='';

if($personne >= 0 and $personne <= 12 )
{
    $categorie='enfant';
}

elseif ($personne >= 13 and $personne <= 19 )
{
    $categorie='ado';
}

elseif ($personne >= 20 and $personne <= 50 )
{
    $categorie='adulte';
}

elseif ($personne >= 51 and $personne <= 70 )
{
    $categorie='senior';
}

else { $categorie = 'agé';}

echo $categorie;

echo "<h3>2.</h3>";

switch ($personne)
{
    case $personne>=0 and $personne <= 19:
        $categorie='enfant';
        break;

    case $personne >= 13 and $personne <= 19:
         $categorie='ado';
         break;

    case $personne >= 20 and $personne <= 50:
        $categorie='adulte';
        break;

    case $personne >= 51 and $personne <= 70:
        $categorie='senior';
        break;

    case $personne >= 71:
        $categorie='agé';
        break;
}

echo $categorie;

echo"<hr>";

echo "<h2>Ex2</h2>";
echo"<hr>";

echo "<h3>1.</h3>";

$n1=0;
$somme1=0;
$somme2=0;

while($n1 < 20)
{
    if($n1==0)
    {
        $somme1=0;
        $somme2=0;
    }

    elseif ($n1==1)
    {
        $somme2=1;
        $somme1=0;
    }

    else{
        $tmp=$somme2;
        $somme2+=$somme1;
        $somme1=$tmp;}

    echo $somme2, '<br>';
    $n1++;
}

echo "<h3>2.</h3>";

$n1=0;
$somme1=0;
$somme2=0;
do {
    if($n1==0)
    {
        $somme1=0;
        $somme2=0;
        echo '0 <br>';
        $n1++;
        continue;
    }

    elseif ($n1==1)
    {
        $somme2=1;
        $somme1=0;
        echo '0 <br>';
        $n1++;
        continue;
    }

    else{
        $tmp=$somme2;
        $somme2+=$somme1;
        $somme1=$tmp;}

    echo ($somme2/$somme1), '<br>';


    $n1++;
}while($n1 < 30);

echo"<hr>";
*/
echo "<h2>Ex3</h2>";
echo"<hr>";


$euler=0;
for($i=1; $i<=15000; $i++ )
{
    $euler+=1/$i**2;
}
$pi=sqrt($euler*6);
echo $pi;

echo"<hr>";

echo "<h2>Ex4</h2>";
echo"<hr>";

$tab=array('Jacques'=> 'BLABLA', 'Emile' => 'BONJOUR', 'Marie'=> 'HELLO',
    'Tom'=>'PAPA', 'Julie'=>'GOOD');

foreach ($tab as $key => $value)
{
    echo $key," <vr> ",$value,'<br>';
}

echo"<hr>";

echo "<h2>Ex5</h2>";
echo"<hr>";

$nb = rand(0,100);
$tab=array("Table de $nb <br>");
echo $tab[0];

for($i=1;$i<=10;$i++)
{
    $tab["$i x $nb"]=$i*$nb;
    echo "[$i x $nb] ",$tab["$i x $nb"], '<br>';
}

echo"<hr>";

echo "<h2>Ex6</h2>";
echo"<hr>";

for($i=2;$i<=92;$i++){
    $nbDiv = 0;
    for($j=1;$j<=$i;$j++){
        if($i%$j==0){
            $nbDiv++;
        }
    }
    if($nbDiv == 2){
     echo "$i est premier <br>";}
}


echo"<hr>";

echo "<h2>Ex7</h2>";
echo"<hr>";

$annuaire=array(
    "PUJOL Olivier"=>"03 89 72 84 48",
    "IMBERT Jo"=>"03 89 36 06 05",
    "SPIEGEL Pierre"=>"03 87 67 92 37",
    "THOUVENOT Frédéric"=>"01 42 86 02 12",
    "MEGEL Pierre"=>"09 59 71 46 96",
    "SUCHET Loïc"=>"03 89 33 10 54",
    "GIROIS Francis"=>"03 88 01 21 15",
    "HOFFMANN Emmanuel"=>"03 89 69 20 05",
    "KELLER Fabien"=>"04 18 52 34 25",
    "LEY Jean-Marie"=>"03 89 43 17 85",
    "ZOELLE Thomas"=>"04 18 65 67 69",
    "WILHELM Olivier"=>"03 89 60 48 78",
    "BLIN Nathalie"=>"01 28 59 23 25",
    "BICARD Pierre-Eric"=>"03 89 69 25 82",
    "ZIEGLER Thierry"=>"03 89 06 33 89",
    "BADER Jean"=>"03 89 25 65 72",
    "ROSSO Anne-Sophie"=>"01 56 20 02 36",
    "ROTTNER Thierry"=>"03 88 29 61 54",
    "WEBER Joao"=>"03 89 35 45 20",
    "SCHILLINGER Olivier"=>"03 84 21 38 40",
    "BICARD Muriel"=>"03 89 33 47 99 ",
    "KELLER Christian"=>"03 88 19 16 10 ",
    "GROELLY Antonio"=>"03 89 33 60 63",
    "ALLARD Aline"=>"03 89 56 49 19",
    "WINNINGER Bénédicte"=>"04 16 14 86 66");

ksort($annuaire);
echo "<table>";
foreach ($annuaire as $key => $value)
{
    
}

?>