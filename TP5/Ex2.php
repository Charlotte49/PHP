<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 2</h1>

<form action="Ex2.php" method="post">

    Nom : <input type="text" name="nom" value="<?php if (!empty($_POST['nom'])) echo $_POST['nom']?>"/>
    Prénom : <input type="text" name="prenom" value="<?php if (!empty($_POST['prenom'])) echo $_POST['prenom']?>"/>

    <br>  <br>

    <input type="radio" name="niveau" value="debutant"
           checked="<?php if ($_POST['niveau']=="debutant") echo $_POST['niveau']?>">
    <label for="debutant">Débutant</label>

    <input type="radio" name="niveau" value="avancé"
           checked="<?php if ($_POST['niveau']=="avancé") echo $_POST['niveau']?> ">
    <label for="avancé">Avancé</label>
    <br>  <br>

    <input type="submit" value="Effacer" />
    <input type="submit" name="send" value="Envoyer" />
    <br>


</form>

</body>

</html>

<?php

if(!empty($_POST['nom']) && !empty($_POST['prenom']))
{
    if(!empty($_POST['send']))
    {
        $temp = $_POST['nom'] . " " . $_POST['prenom'];
        $niv= $_POST['niveau'];
        echo "Bonjour ".$temp .". Vous avez un niveau ".$niv. "<br>";
    }
}
