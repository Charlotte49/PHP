<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 4</h1>

<form action="Ex4.php" method="post">

    <p><strong>Nombre 1</strong></p> <input type="number" name="x" value="<?php if (!empty($_POST['x'])) echo $_POST['x']?>" />
    <br>
    <p><strong>Nombre 2</strong></p>  <input type="number" name="y" value="<?php if (!empty($_POST['y'])) echo $_POST['y']?>"/>
    <br>
    <p><strong>Résultat</strong></p>  <input type="number" name="resultat"

    value="<?php if(!empty($_POST['x']) && !empty($_POST['y']) && !empty($_POST['send']))
{
    $res=0;
    if($_POST['send']=="Addition x+y" )
    {
        $res=$_POST['x']+$_POST['y'];
        echo $res;
    }

    else if($_POST['send']=="Soustraction x-y" )
    {
        $res=$_POST['x']-$_POST['y'];
        echo $res;
    }

    else if($_POST['send']=="Division x/y" )
    {
        if($_POST['x']!=0)
        {$res=$_POST['x']/$_POST['y'];
        echo $res;
        }
    }

    else
    {
        $res=$_POST['x']**$_POST['y'];
        echo $res;
    }
} ?>" />


    <br>  <br>


    <p><strong>Cliquer sur un bouton ! </strong></p>

    <input type="submit"  value="Addition x+y" name="send" >


    <input type="submit"  value="Soustraction x-y" name="send">

    <input type="submit" value="Division x/y" name="send" >

    <input type="submit" value="Puissance x^y"  name="send">


</form>
</body>
</html>
