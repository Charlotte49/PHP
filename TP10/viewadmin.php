<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP10</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>Liste des étudiants</h1>
    <br>
 <?php
    include "controller.php";
    display();
    ?>
    <form action="controller.php?func=action" method="post">
    <div class="form-group">
        <button name="ajouter" class="btn btn-primary" >Ajouter un étudiant</button>
        <br>
        <br>
        <br>
        <label>ID de l'élève à supprimer</label>
        <input name="idE" class="form-control" >
        <br>
        <button name="supp" class="btn btn-primary" >Supprimer un étudiant</button>
        <br>
        <br>
        <br>
        <button name="modifier" class="btn btn-primary" >Modifier les informations d'un étudiant</button>
        <br>
        <br>
        <button name="deco" class="btn btn-primary" >Se déconnecter</button>
    </div>


    </form>

</div>