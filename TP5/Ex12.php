<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 12</h1>

<form action="Ex12.php" method="post">

    <strong>Enregistrez vos informations personnelles </strong>
    <br><br>
    <strong>Votre nom : </strong><input type="text" name="nom" />
    <br><br>
    <strong>Votre prénom : </strong> <input type="text" name="prenom"/>
    <br><br>

    <input type="submit" name="send" value="Enregistrer" />
    <input type="submit" value="Effacer" />
    <br>


</form>
<br><br>


<table rules="all">
    <thead>
            <th><strong>Numéro</strong></th>
            <th><strong>Prénom</strong></th>
            <th><strong>Nom</strong></th>
            <th><strong>Date</strong></th>
    </thead>

<?php
$temp=0;
$id_file = fopen('exo12FILE.txt', 'a+');


if(!empty($_POST['nom']) && !empty($_POST['prenom']) && isset($_POST['send']))
{
    echo "Merci ".$_POST['prenom']." ".$_POST['nom']."<br><br>";
    fwrite($id_file,$_POST['prenom'].";".$_POST['nom'].";".date('d/m/Y G:i')."; \n");
    fclose($id_file);
}
$id_file = fopen('exo12FILE.txt', 'r+');

while ($line=fgets($id_file))
{
    $temp +=1;
    echo "<tr><td>$temp</td><td>";
    echo str_replace(";","</td><td>",$line)."</td></tr>";
}


?>
    
    
</table>
</body>
</html>

