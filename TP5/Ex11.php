<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 11</h1>


</body>
</html>




<?php

$id_file = fopen('contact.txt', 'r+');
echo "<table rules='all'>";
while ($line=fgets($id_file))
{
    echo "<tr><td>";
    echo str_replace(";","</td><td>",$line);
}
echo "</table>";