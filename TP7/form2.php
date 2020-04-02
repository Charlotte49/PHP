<!DOCTYPE html>
<html>
<head>
    <title>TP7</title>
</head>

<body>

<h1>Ex 1</h1>


</body>
</html>

<?php

include "form1.php";

class form2 extends form1
{
    final function ajouterradio($text,$value)
    {
        echo "<strong>$text : </strong><input type='radio' name='genre' value='$value'/><br>";
    }

    function ajoutercase($text)
    {
        echo "<strong>$text : </strong><input type='checkbox' name='activite' value='$text'/><br>";

    }
}


$form=new form2("POST","form2.php");
$form->ajouterzonetexte("Votre nom","nom");
$form->ajouterzonetexte("Votre code","code");
$form->ajouterbouton("ENVOYER");
$form->ajouterradio("Homme","H");
$form->ajouterradio("Femme","F");
$form->ajoutercase("Tennis");
$form->ajoutercase("Equitation");
$form->getform();