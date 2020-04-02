<!DOCTYPE html>
<html>
<head>
    <title>TP7</title>
</head>

<body>

<h1>Ex 3</h1>


</body>
</html>

<?php
    trait Un {
        function small($string)
        {
            echo "<small>$string</small>";
        }

        function big($string)
        {
            echo "<h4>$string</h4>";
        }
    }


    trait Deux {
        function small($string)
        {
            echo "<i>$string</i>";
        }

        function big($string)
        {
            echo "<h2>$string</h2>";
        }
    }

    class Texte {
        use Un, Deux {
            Un::big insteadof Deux;
            Un::small as petit;
            Deux::small insteadof Un;
            Deux::big as gros;
        }
    }

    $text=new Texte();
    $text->big("Il était ");
    $text->petit("une fois,");
    $text->gros("un petit ");
    $text->small("homme vert.");
