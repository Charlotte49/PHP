<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 13</h1>

<form action="Ex13.php" method="post">

    <h3><strong>Choisir votre délégué</strong></h3>

    <input type="radio" name="delegue" value="E1">
    Etudiant 1
    <br><br>

    <input type="radio" name="delegue" value="E2" >
    Etudiant 2

    <br><br>

    <input type="radio" name="delegue" value="E3">
    Etudiant 3

    <br><br>

    <input type="submit" name="send" value="Voter" />
    <input type="submit" name="send" value="Afficher les résultats" />
    <br>


</form>
<br><br>


<?php

$id_file = fopen('ex13FILE.txt', 'a+');


if(isset($_POST['delegue']) && $_POST['send']=='Voter')
{
    fwrite($id_file,$_POST['delegue']."; \n");
    fclose($id_file);
}
$id_file = fopen('ex13FILE.txt', 'r+');
$vote1=0;
$vote2=0;
$vote3=0;
if(isset($_POST['send']) && $_POST['send']=="Afficher les résultats")
{
    while ($line=fgets($id_file))
    {
        if($line=="E1; \n")
        {
            $vote1++;
        }
        else if($line=="E2; \n")
        {
            $vote2++;
        }
        else {$vote3++;}
    }

    $total=$vote1+$vote2+$vote3;
    echo "<strong>Résultat de votes : </strong> <br>";
    echo "L'étudiant 1 a ".$vote1." voix soit ".(100*$vote1)/$total."% <br>";
    echo "L'étudiant 2 a ".$vote2." voix soit ".(100*$vote2)/$total."% <br>";
    echo "L'étudiant 3 a ".$vote3." voix soit ".(100*$vote3)/$total."% <br>";

}


?>

</body>
</html>

