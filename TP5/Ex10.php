<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 10</h1>


</body>
</html>




<?php

$id_file = fopen('test-fic.txt', 'r+');
while ($line=fgets($id_file))
{
    echo $line."<br>";
}
fwrite($id_file,"<br>Charlotte MOUGENOT");
