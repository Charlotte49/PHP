
<?php


class form1
{
    function __construct($meth, $url) {
        echo "<form method='".$meth."' action='".$url."'>";
    }

    function ajouterzonetexte($text,$name)
    {
        echo "<strong>$text : </strong> <input type='text' name='$name'/><br><br>";
    }

    function ajouterbouton($value)
    {
        echo "<input type='submit' name='$value'/><br>";
    }

    function getform() {
        echo "</form>";

    }

}