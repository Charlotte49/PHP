<?php

echo "<h1>TP3</h1>";
echo "<hr>";

echo "<h2>Ex2</h2>";
echo"<hr>";



$var=0;

function increment ($var)
{
    $var++;
    return $var;
}

increment($var);
echo increment($var);

echo "<hr>";

echo "<h2>Ex3</h2>";
echo"<hr>";

$identite=array('alain', 'basile', 'David', 'Edgar');
$age = array(1, 15, 35, 65);
$mail = array('penom.nom@gtail.be', 'truc@bruce.zo', 'caro@caramel.org', 'trop@monmel.fr');
$tab1=  array(0);
$tab2=array(0);

echo "<h3>1.</h3>";

$indice=rand(0,sizeof($mail)-1);

function domaine($mail,$indice)
{
    $domain = strstr($mail[$indice], '@');
    echo strstr($domain, '.',true)," avec l'extension ";
    echo strstr($domain, '.');

}



echo "<h3>2.</h3>";

function presentation($identite, $age, $mail, $indice)
{
    echo "Je me nomme ".$identite[$indice]." j'ai ".$age[$indice];

    if($age[$indice]<=1)
    {
        echo " an ";
    }

    else{ echo " ans ";}

    echo " et mon mail est ".$mail[$indice]." du domaine ";
    domaine($mail,$indice);
}

presentation($identite,$age,$mail,$indice);

echo "<hr>";

echo "<h2>Ex4</h2>";
echo"<hr>";


function ligne()
{
    for($i=0; $i<5;$i++)

    echo '* &nbsp;';
}

function carre_plein()
{
    for($i=0; $i<5; $i++)
    {
        ligne();
        echo "<br>";
    }
}

function triangle_iso()
{
    for($i=1; $i<=5; $i++)
    {
        for($j=1; $j<=$i; $j++)
        {
            echo "* ";
        }
        echo"<br>";
    }
}

function carre_vide()
{
    ligne();
    echo"<br>";
    for($i=0;$i<3;$i++)
    {
        echo '* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* <br>';
    }
    ligne();
}

function triangle_vide()
{
    for($i=1; $i<=5; $i++)
    {
        if($i<3 or $i==5)
        {
            for ($j = 1; $j <= $i; $j++)
            {
                echo "*&nbsp;&nbsp;";
            }
        }

        elseif($i==3)
        {
            echo "* &nbsp;&nbsp;&nbsp;&nbsp; *";
        }
        else
            {
                echo "* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*";
            }

        echo "<br>";
    }

}

function triangle_vide_inv()
{
    for($i=5; $i>=0; $i--)
    {
        if($i<3 or $i==5)
        {
            for ($j = 1; $j <= $i; $j++)
            {
                echo "*&nbsp;&nbsp;";
            }
        }

        elseif($i==3)
        {
            echo "* &nbsp;&nbsp;&nbsp;&nbsp; *";
        }
        else
        {
            echo "* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*";
        }

        echo "<br>";
    }
}


ligne();
echo "<hr>";
carre_plein();
echo "<hr>";
triangle_iso();
echo "<hr>";
carre_vide();
echo "<hr>";
triangle_vide();
echo "<hr>";
triangle_vide_inv();

echo "<hr>";

echo "<h2>Ex5</h2>";
echo"<hr>";

$alpha=array('A','B', 'C', 'D', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M','N',
    'O', 'P','Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

$string="ATTAQUEZ ASTERIX";

function chiffrement($alpha, $string)
{
    for ($j=0;$j<sizeof($string);$j++)
    {
        for($i=0;$i<sizeof($alpha);$i++)
        {
            if($string[$j]==$alpha[$i])
            {
                $string[$j]=$alpha[(($i+3)%26)];
                continue;
            }
        }
    }
    echo $string;
}

chiffrement($alpha,$string);