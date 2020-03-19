<?php
echo"<h1>TP1</h1>";
echo"<hr>";

echo "<h2>Ex1</h2>";
echo"<hr>";

echo "<h3>1.</h3>";

echo "1 - le livre 'ma vie' est terrible !! <br>";
echo "2 - le livre \"ma vie\" est terrible !! <br>";
echo '3 - le livre "ma vie" est terrible !! <br>';
echo "4 - le livre \"ma vie\" est terrible !! et le public l'apprécie<br><br>";
$mavie = "ma vie";
echo "5 - le livre $mavie est terrible !! <br>";
echo '6 - le livre $mavie est terrible !! <br>';

echo "<h2>Ex2</h2>";
echo "<h3>2.</h3>";

echo"<i>J'ai l'esprit large et je n'admets pas qu'on dise le 
contraire. </i>";
$f = strtoupper("<b>Citation de Coluche</b>");
echo $f;


echo "<h2>Ex3</h2>";
echo"<hr>";

echo "<h3>1.</h3>";

$citation = "<i>J'ai l'esprit large et je n'admets pas qu'on dise le contraire. </i>";
$auteur = strtoupper("<b>Citation de Coluche</b>");
echo $citation, $auteur;

echo "<h3>2.</h3>";

echo var_dump(isset($citation));

echo "<h3>3.</h3>";
define('AUTEUR',$auteur);
echo AUTEUR;

echo "<h3>4.</h3>";

unset($auteur,$citation);
echo var_dump($citation,$auteur);

echo "<h2>Ex4</h2>";

echo "$_SERVER,$GLOBALS";

echo "<h2>Ex5</h2>";


?>