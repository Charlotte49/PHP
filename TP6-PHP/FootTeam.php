<!DOCTYPE html>
<html>
<head>
    <title>TP6</title>
</head>

<body>

<h1>Ex 1</h1>


</body>
</html>

<?php


class FootTeam
{
    //Attributs
    private $nom;
    private $nbTitres;
    private static $nbEq = 0;

    //Const & destruc

    public function __construct($nom, $nbTitres)
    {
        $this->setNbTitres($nbTitres);
        $this->setNom($nom);
        self::$nbEq+=1;
        echo "Constructor<br>";
    }
    function __destruct(){
        echo "Destructor<br>";
    }

    //Méthodes

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getNbTitres()
    {
        return $this->nbTitres;
    }
    public function setNbTitres($nbTitres)
    {
        $this->nbTitres = $nbTitres;
    }

    public function display()
    {
        echo "L'équipe ".$this->nom." a ".$this->nbTitres." titres.<br>";
    }

    const MESSAGE =  "Nombre d'équipe : ";

    static function nbEq(){
        echo self::MESSAGE;
        echo self::$nbEq."<br><br>";
    }


}

$eq1 = new FootTeam("Mannschaft",15);
$eq2 = new FootTeam("FC Barcelone",10);
$eq3 = new FootTeam("Equipe de France",5);
$eq4 = new FootTeam("Manchester United",12);
echo "<br>";
$eq1->display();
$eq2->display();
$eq3->display();
$eq4->display();
echo "<br>";
FootTeam::nbEq();