<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP8</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="citation.php">Informations <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recherche.php">Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modification.php">Modification</a>
            </li>
        </ul>
    </div>

</nav>
<h1>Rechercher une citation</h1>
<form action="recherche.php" method="post">

<?php
include "connexpdo.php";

$base = 'pgsql:host=localhost;port=5432;dbname=citations;';
$user = 'postgres';
$password = 'isen2018';

$idcon=connexpdo($base,$user,$password);

$query1 = "SELECT nom from auteur";
$result1 = $idcon->query($query1)->fetchAll();

echo "<label>Auteur</label><select class='custom-select' name='auteur'>";
foreach($result1 as $data)
{
   echo "<option value=$data[0]> $data[nom] </option>";
}
echo "</select><br><br>";


$query2 = "SELECT numero from siecle";
$result2 = $idcon->query($query2)->fetchAll();

echo "<label>Siècle</label><select class='custom-select' name='siecle'> ";

foreach($result2 as $data)
{
    echo "<option value=$data[0]> $data[numero] </option>";
}
echo "</select><br><br>";
echo "<button class='btn btn-primary' type='submit' name='rechercher'>Rechercher</button><br><br>";

if(isset($_POST['rechercher']))
{
    $nom=$_POST['auteur'];
    $annee=$_POST['siecle'];
    $query3="SELECT phrase from citation where auteurid=(SELECT id from auteur where nom=$nom) and siecleid=(SELECT id from citation where numero=$annee)";

    if($idcon->query($query3))
    {
        $result3=$idcon->query($query3)->fetchAll();
        echo "<table class='table'><thead> <tr><th scope=\"col\">Citation</th><th scope=\"col\">Auteur</th><th scope=\"col\">Siècle</th></tr>  </thead>  <tbody>";

        foreach($result3 as $data)
        {
            echo    "<tr> <td>$data->phrase</td> <td>$nom</td> <td>$annee</td> </tr>";
        }
        echo "</tbody></table>";
    }
    else{echo "Résultat introuvable";}
}



