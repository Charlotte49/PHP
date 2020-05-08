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
<h1>La citation du jour</h1>

<?php
include "connexpdo.php";

$base = 'pgsql:host=localhost;port=5432;dbname=citations;';
$user = 'postgres';
$password = 'isen2018';

$idcon=connexpdo($base,$user,$password);

$nbCitation="SELECT count(*) from citation";
$res1=$idcon->query($nbCitation)->fetch(PDO::FETCH_OBJ);
echo "Il y a <strong>$res1->count</strong> citations répertoriées<br><br>Et voici l'une d'entre elles qui est générée aléatoirement :<br><br>";

$id=rand(1,$res1->count);

$citation="SELECT phrase from citation where id=$id";
$res2=$idcon->query($citation)->fetch(PDO::FETCH_OBJ);

$auteur="SELECT prenom, nom from auteur where id=(SELECT auteurid from citation where id=$id)";
$res3=$idcon->query($auteur)->fetch(PDO::FETCH_OBJ);

$siecle="SELECT numero from siecle where id=(SELECT siecleid from citation where id=$id)";
$res4=$idcon->query($siecle)->fetch(PDO::FETCH_OBJ);

echo "<strong>$res2->phrase</strong><br>$res3->prenom $res3->nom ($res4->numero ème siècle)";


