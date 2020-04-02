<!DOCTYPE html>
<html>
<head>
    <title>TP7</title>
</head>

<body>

<h1>Ex 2</h1>


</body>
</html>
<?php

    /*interface Shape {
        function getArea();
    }

    class Square implements Shape {
        private $width=5;
        private $height=5;

        function getArea()
        {
            echo"Square Area = ".$this->height*$this->width."<br>";
        }
    }

    class Circle implements Shape{
        private $radius=2;

        function getArea()
        {
            echo"Circle Area = ".(3.14*$this->radius)."<br>";
        }
    }


    //TEST1

    $square=new Square();
    $circle=new Circle();
    $tab= array($square,$circle);

    foreach ($tab as $value)
    {
        get_class($value);
        $value->getArea();
    }
*/

    //Question 5

    abstract class Shape {
        abstract function getArea();
    }

    class Square extends Shape {
        private $width=5;
        private $height=6;

        function getArea()
        {
            echo"Square Area = ".$this->height*$this->width."<br>";
        }
    }

    class Circle extends Shape{
        private $radius=4;

        function getArea()
        {
            echo"Circle Area = ".(3.14*$this->radius)."<br>";
        }
    }

    //TEST2

    $square=new Square();
    $circle=new Circle();
    $tab= array($square,$circle);

    foreach ($tab as $value)
    {
        get_class($value);
        $value->getArea();
    }