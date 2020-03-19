<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

    <h1>Ex 1</h1>
    <a href="Ex1.php?temp=32">Cliquer pour avoir la valeur en degré</a>
    <br>
    <br>
    <form action="Ex1.php" method="post">
       Valeur en Fahrenheit : <input type="text" name="temperature" />
        <input type="submit" value="Convertir" />
        <br>
    </form>


</body>

</html>

<?php
if(isset($_GET['temp']))
{
    $temp = $_GET['temp'];

    $temp = ($temp - 32) * (5 / 9);

    echo "<p>La valeur en degré est </p>" . $temp."<br>";
}

if(empty($_POST['temperature']))
{
    echo " ! ";
}
else
    {   $temp = $_POST['temperature'];

        $temp = ($temp - 32) * (5 / 9);

        echo "<p>La valeur en degré est </p>" . $temp . "<br>";}

?>