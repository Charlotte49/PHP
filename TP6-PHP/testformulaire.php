
<!DOCTYPE html>
<html>
<head>
    <title>TP6</title>
</head>

<body>

<h1>Ex 2</h1>


</body>
</html>

<?php

include "formulaire.php";

$form=new formulaire("POST","testformulaire.php");
$form->ajouterzonetexte("Votre nom","nom");
$form->ajouterzonetexte("Votre code","code");
$form->ajouterbouton("ENVOYER");
$form->getform();

if(!empty($_POST['nom']) && !empty($_POST['code']) && isset($_POST['ENVOYER']) )
{
    echo "<br>";
    echo "Nom :".$_POST["nom"]."<br>";
    echo "Code :".$_POST["code"]."<br>";
}