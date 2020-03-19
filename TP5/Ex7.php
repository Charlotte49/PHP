<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 7</h1>



</body>
</html>

<?php
setcookie('cookie0',"test0");

setcookie('cookie1',"test1",time()+14*86400);
var_dump($_COOKIE);
echo $_COOKIE['cookie0']."<br>";
echo $_COOKIE['cookie1']."<br>";

print_r($_COOKIE);

setcookie('cookie0',"");
unset($_COOKIE['cookie1']);
var_dump($_COOKIE);
unset($_COOKIE);

?>
