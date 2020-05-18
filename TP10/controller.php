<?php

include "connexpdo.php";

    function adduser()
    {
        $base = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
        $user = 'postgres';
        $password = 'isen2018';

        $idcon=connexpdo($base,$user,$password);

        if(isset($_POST['inscription']) && !empty($_POST['id']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
        {
            echo 'blbl';
            $id=$_POST['id'];
            $login=$_POST['login'];
            $password1=$_POST['password'];
            $mail=$_POST['mail'];
            $nom=$_POST['nom'];
            $prenom= $_POST['prenom'];

            $query1 = "SELECT id from utilisateur where (id='$id')";
            $result1 = $idcon->query($query1)->fetchAll();
            if(empty($result1))
            {
                $sql="INSERT INTO utilisateur (id, login, password, mail, nom, prenom) VALUES (?,?,?,?,?,?)";
                $sqlR = $idcon->prepare($sql);
                $sqlR->execute([$id, $login, $password1, $mail, $nom, $prenom]);

                header("Location : http://localhost/PHP/TP10/index.php");
                exit;
            }

            else {echo "Id déjà utilisé, veuillez en rentrer un autre";}
        }
    }


    function authentification()
    {
        $base = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
        $user = 'postgres';
        $password = 'isen2018';

        $idcon=connexpdo($base,$user,$password);

        if(isset($_POST['connexion']) && !empty($_POST['login']) && !empty($_POST['password']))
        {
            $login=$_POST['login'];
            $password1=$_POST['password'];

            $query2 = "SELECT (*) from utilisateur where (login='$login') and (password='$password1')";
            $result2 = $idcon->query($query2)->fetchAll();

            if(!empty($result2))
            {
                header("Location : http://localhost/PHP/TP10/viewadmin.php");
                exit;
            }

            else {echo "Login ou mdp incorrect";}
        }
    }

    function addstudent()
    {
        $base = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
        $user = 'postgres';
        $password = 'isen2018';

        $idcon=connexpdo($base,$user,$password);

        if(isset($_POST['ajouter']) && !empty($_POST['idE']) && !empty($_POST['idU'])  && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['note']))
        {
            echo 'blbl';
            $idE=$_POST['idE'];
            $idU=$_POST['idU'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $note=$_POST['note'];

            $query1 = "SELECT id from etudiant where (id='$idE')";
            $result1 = $idcon->query($query1)->fetchAll();
            if(empty($result1))
            {
                $sql="INSERT INTO etudiant (id, user_id, nom, prenom, note) VALUES (?,?,?,?,?)";
                $sqlR = $idcon->prepare($sql);
                $sqlR->execute([$idE, $idU, $nom, $prenom, $note]);

                header("Location : http://localhost/PHP/TP10/viewadmin.php");
                exit;
            }

            else {echo "Id déjà utilisé, veuillez en rentrer un autre";}
        }
    }