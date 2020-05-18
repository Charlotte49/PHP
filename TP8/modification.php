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
<h1>Ajout</h1>

<form action="modification.php" method="post">
    <div class="form-group">
        <label>ID de l'auteur</label>
        <input name="idAuteur" class="form-control" >
    </div>
    <div class="form-group">
        <label>Nom de l'auteur</label>
        <input name="nomAuteur" class="form-control" >
    </div>
    <div class="form-group">
        <label>Prénom de l'auteur</label>
        <input name="prenomAuteur" class="form-control" >
    <div class="form-group">
        <label>ID du siècle</label>
        <input name="idSiecle" class="form-control" >
    </div>
    <div class="form-group">
        <label>Siècle</label>
        <input name="siecle" class="form-control" >
    </div>
    <div class="form-group">
        <label>Citation</label>
        <input name="citation" class="form-control" >
    </div>

    <button name="ajout" class="btn btn-primary">Ajouter</button>

<?php
include "connexpdo.php";

$base = 'pgsql:host=localhost;port=5432;dbname=citations;';
$user = 'postgres';
$password = 'isen2018';


$idcon=connexpdo($base,$user,$password);

if(isset($_POST["ajout"]))
{
    $idAuteur=$_POST['idAuteur'];
    $nomAuteur=$_POST['nomAuteur'];
    $prenomAuteur=$_POST['prenomAuteur'];
    $idSiecle=$_POST['idSiecle'];
    $siecle=$_POST['siecle'];
    $citation= $_POST['citation'];

    $query1 = "SELECT id from auteur where (id='$idAuteur')";
    $result1 = $idcon->query($query1)->fetchAll();
    if(empty($result1))
    {
        $sql="INSERT INTO auteur (id, nom, prenom) VALUES (?,?,?)";
        $sqlR = $idcon->prepare($sql);
        $sqlR->execute([$idAuteur, $nomAuteur, $prenomAuteur]);
    }


    $query2 = "SELECT id from siecle where (id='$idSiecle')";
    $result2 = $idcon->query($query2)->fetchAll();

    if(empty($result2))
    {
        $sql1="INSERT INTO siecle (id, numero) VALUES (?,?)";
        $sqlR = $idcon->prepare($sql1);
        $sqlR->execute([$idSiecle, $siecle]);
    }
    $idCitation=$idAuteur+$idSiecle;
    $sql2="INSERT INTO citation (id, phrase, auteurid, siecleid) VALUES (?,?,?,?)";
    $sqlR = $idcon->prepare($sql2);
    $sqlR->execute([$idCitation,$citation, $idAuteur,$idSiecle]);

}
?>
</form>

<br><br><h1>Suppression</h1>

<form action="modification.php" method="post">
<?php

$query3 = "SELECT id from citation";
$result3 = $idcon->query($query3)->fetchAll();

echo "<select class=\"custom-select mr-sm-2\" name='IDCit'><option selected>Sélectionnez l'ID d'une citation</option>";
foreach($result3 as $data)
{
   echo "<option value='$data[0]'> $data[id] </option>";
}
echo "</select><br><br><button name='supp' class='btn btn-primary'>Supprimer</button></form>";

if(isset($_POST["supp"]))
{
    $idCitation=$_POST['IDCit'];
    var_dump($idCitation);
    $deleteQ = 'DELETE from citation WHERE id=?';
    $deleteR = $idcon->prepare($deleteQ);
    $deleteR->execute([$idCitation]);

}

