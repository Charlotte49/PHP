
<!DOCTYPE html>
<html>
<head>
    <title>TP6</title>
</head>

<body>

<h1>Ex 3</h1>

<form method='POST' action='Ex3.php'>

    Nom : <input type='text' name='nom'/>
    <br>    <br>

    Prenom : <input type='text' name='prenom'/>
    <br>    <br>

    Mail : <input type='text' name='mail'/>
    <br>    <br>

    Age :  <select name="age">
        <option value="">--Age--</option>
        <option value="0-20">0-20</option>
        <option value="20-40">20-40</option>
        <option value="40-60">40-60</option>
        <option value="60-80">60-80</option>
    </select>
    <br>  <br>

    Monsieur : <input type="radio" name="genre" value="Monsieur">
    Madame : <input type="radio" name="genre" value="Madame">

    <br>  <br>

    <input type='submit' name='submit'/>

</form>
</body>
</html>


<?php

class form
{
    //Attribut
    private $nom;
    private $prenom;
    private $mail;


    private $age;
    private $genre;

    function __construct()
    {
        $this->nom = $_POST['nom'];
        $this->prenom = $_POST['prenom'];
        $this->mail = $_POST['mail'];
        $this->age = $_POST['age'];
        $this->genre = $_POST['genre'];
    }

    public function getNom()
    {
        return $this->nom=$_POST['nom'];
    }

    public function getPrenom()
    {
        return $this->prenom= $_POST['prenom'];
    }

    public function getMail()
    {
        return $this->mail= $_POST['mail'];
    }

    public function getAge()
    {
        return $this->age= $_POST['age'];
    }

    public function getGenre()
    {
        return $this->genre= $_POST['genre'];
    }


    function display()
    {
        if(!empty($this->nom) && !empty($this->prenom) && !empty($this->mail) && !empty($this->age) && !empty($this->genre) && isset($_POST['submit']))
        {
            echo "<br>".$this->nom." ". $this->prenom." " . $this->mail." " . $this->age." " . $this->genre;
        }
    }
}

$form=new form();
$form->display();