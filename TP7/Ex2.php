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
/*
    interface Shape {
        function getArea();
    }

    class Square implements Shape {

        private $width;
        private $height;

        function __construct($width,$height)
        {
            $this->width=$width;
            $this->height=$height;

        }

        function getArea()
        {
            echo"Square Area = ".$this->height*$this->width."<br>";
        }
    }

    class Circle implements Shape{
        private $radius;

        function __construct($radius)
        {
            $this->radius=$radius;
            echo $this->radius;
        }

        function getArea()
        {
            echo"Circle Area = ".(3.14*$this->radius)."<br>";
        }
    }


    //TEST1

    $square=new Square(5,9);
    $circle=new Circle(12);
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


        private $width;
        private $height;

         function __construct($width,$height)
        {
            $this->width=$width;
            $this->height=$height;

        }

        function getArea()
        {
            echo"Square Area = ".$this->height*$this->width."<br>";
        }
    }

    class Circle extends Shape{
        private $radius;

        function __construct($radius)
        {
            $this->radius=$radius;
        }

        function getArea()
        {
            echo"Circle Area = ".(3.14*$this->radius)."<br>";
        }
    }

    //TEST2

    $square=new Square(15,9);
    $circle=new Circle(13);
    $tab= array($square,$circle);
    foreach ($tab as $value)
    {
        get_class($value);
        $value->getArea();
    }