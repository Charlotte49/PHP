<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 3</h1>

<form action="Ex3.php" method="post">

    Nom : <input type="text" name="nom" value="<?php if (!empty($_POST['nom'])) echo $_POST['nom']?>"/>
    Prénom : <input type="text" name="prenom" value="<?php if (!empty($_POST['prenom'])) echo $_POST['prenom']?>"/>
    Age : <input type="text" name="age" value="<?php if (!empty($_POST['age'])) echo $_POST['age']?>"/>


    <br>  <br>

    <p>Langues pratiquées (choisir au minimum 2) : </p>
    <select name="langues[]" multiple="multiple">
        <option value="français">Français</option>
        <option value="anglais">Anglais</option>
        <option value="allemand">Allemand</option>
        <option value="espagnol">Espagnol</option>
    </select>


    <p>Compétences informatiques (choisir au minimum 2) :</p>

    HTML <input type="checkbox"  name="competences[]"  value="HTML">


    CSS <input type="checkbox"  name="competences[]" value="CSS">

    PHP <input type="checkbox" name="competences[]"  value="PHP" >

    SQL <input type="checkbox" name="competences[]"  value="SQL" >

    C <input type="checkbox"  name="competences[]"  value="C">

   C++ <input type="checkbox" name="competences[]"  value="C++">

    JS <input type="checkbox" name="competences[]"  value="JS">

    Python <input type="checkbox"  name="competences[]"  value="Python">

    <br>  <br>

    <input type="submit"  value="EFFACER">
    <input type="submit" name="send" value="ENVOI" >

</form>
</body>
</html>

<?php

if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']))
{
    if(!empty($_POST['send']) )
    {
        $temp = "Vous êtes ".$_POST['nom'] . " " . $_POST['prenom']."<br>Vous avez ".$_POST['age']." ans";
        echo "<h2>Récapitulatif de votre fiche d'informations personnelles : </h2>".$temp;
        echo "<br> Vous parlez : <br>";
        echo"<br>";
        if(sizeof($_POST['competences'])>=2 && sizeof($_POST['langues'])>=2)
        {
            foreach ($_POST['langues'] as $cle=>$value)
            {
                echo "<li>".$value."</li>";            }
            echo"<br>";
            echo "Vous avez des compétences informatiques en : <br>";
            echo"<br>";
            foreach ($_POST['competences'] as $cle=>$value)
            {
                echo "<li>".$value."</li>";
            }

        }

    }
}
