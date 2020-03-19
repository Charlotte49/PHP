<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 14</h1>

<form action="Ex14.php" method="post">

    Nom : <input type="text" name="nom" value="<?php if (!empty($_POST['nom'])) echo $_POST['nom']?>"/>

    Prénom : <input type="text" name="prenom" value="<?php if (!empty($_POST['prenom'])) echo $_POST['prenom']?>"/>
    Note : <input type="text" name="note" value="<?php if (!empty($_POST['note'])) echo $_POST['age']?>"/>
    <br><br>
    <input type="submit"  value="EFFACER">
    <input type="submit" name="send" value="ENVOI" >


</form>

<table>

</table>

</body>
</html>


<?php //Passer par les sessions