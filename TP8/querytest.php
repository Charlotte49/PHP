

<?php
    include "connexpdo.php";

   $base = 'pgsql:host=localhost;port=5432;dbname=citations;';
   $user = 'postgres';
   $password = 'isen2018';

   $idcon=connexpdo($base,$user,$password);

    $query1 = "SELECT nom, prenom from auteur";
    $result1 = $idcon->query($query1)->fetchAll(PDO::FETCH_OBJ);

    echo "<h1>Auteurs de la BD</h1>";
    echo "<table> <thead><td>Nom</td>  <td>Prénom</td></thead> <tbody>";
    foreach($result1 as $data)
    {

        echo "<tr><td>$data->nom</td>";
        echo "<td>$data->prenom</td></tr>";
    }

    echo "</tbody></table>";

    echo "<h1>Citations de la BD</h1>";


    $query2 = "SELECT phrase from citation";
    $result2 = $idcon->query($query2)->fetchAll(PDO::FETCH_OBJ);

    foreach($result2 as $data)
    {

        echo $data->phrase."<br>";
    }



    echo "<h1>Siècles de la BD</h1>";

    $query3 = "SELECT numero from siecle";
    $result3 = $idcon->query($query3)->fetchAll(PDO::FETCH_OBJ);

    foreach($result3 as $data)
    {

        echo $data->numero."<br>";
    }
