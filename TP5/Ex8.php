<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 8</h1>



</body>
</html>

<?php

$tab = array("cookie0"=> "0", "cookie1"=>"1", "cookie2"=> "2");

foreach ($tab as $key => $value)
{
    setcookie($key,$value);
}

var_dump($_COOKIE);
unset($_COOKIE);
