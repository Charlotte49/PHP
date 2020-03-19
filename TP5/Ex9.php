<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 9</h1>

<a href="page.php"">Cliquer<br></a>



</body>
</html>

<?php

session_start();
echo session_id();

$_SESSION['nom']= "CM";
$_SESSION['date']= time();
$_SESSION['site']= "<a href=\"Ex5.php\">Cliquer pour aller à mon super site<br></a>";
