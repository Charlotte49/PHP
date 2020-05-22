<?php

include "connexpdo.php";
session_start();
if(isset($_GET['func']))
{
    $_GET['func']();
}
    function adduser()
    {
        $base = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
        $user = 'postgres';
        $password = 'isen2018';

        $idcon=connexpdo($base,$user,$password);

        if(isset($_POST['inscription']) && !empty($_POST['id']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
        {
            $id=$_POST['id'];
            $login=$_POST['login'];
            $password1=password_hash($_POST['password'],PASSWORD_DEFAULT);
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

                header("Location: http://localhost/PHP/TP10/index.php");
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

            $query2 = "SELECT id,password from utilisateur where login='$login'";
            $result2 = $idcon->query($query2)->fetch();

            var_dump(password_verify($password1,$result2['password']));

            var_dump($result2);

            var_dump($result2['password']);

            if(password_verify($password1,$result2['password']))
            {
                $_SESSION['id']=$result2['id'];
                header("Location: http://localhost/PHP/TP10/viewadmin.php");
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

        if(isset($_POST['ajouter']) && !empty($_POST['idE']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['note']))
        {
            $idE=$_POST['idE'];
            $idU=$_SESSION['id'];
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

                header("Location: http://localhost/PHP/TP10/viewadmin.php");
                exit;
            }

            else {echo "Id déjà utilisé, veuillez en rentrer un autre";}
        }
    }

function editstudent()
{
    $base = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'isen2018';

    $idcon=connexpdo($base,$user,$password);

    if(isset($_POST['modifier']) && !empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['note']))
    {
        $id=$_POST['id'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $note=$_POST['note'];

        $query1 ="SELECT * from etudiant where id='$id'";
        $result1 = $idcon->query($query1)->fetchAll();
        if(!empty($result1))
        {
            $sql= "UPDATE etudiant SET nom='$nom',prenom='$prenom',note='$note' where (id='$id')";
            $sqlR = $idcon->prepare($sql);
            $sqlR->execute();

            header("Location: http://localhost/PHP/TP10/viewadmin.php");
            exit;
        }

        else {echo "Id déjà utilisé, veuillez en rentrer un autre";}
    }
}

function display()
{

    $base = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'isen2018';

    $idcon=connexpdo($base,$user,$password);

    $id=$_SESSION['id'];
    $query3="SELECT id,nom, prenom, note from etudiant where user_id='$id'";
    $result3=$idcon->query($query3)->fetchAll();

    if(!empty($result3))
    {
        $moy=0;
        $count=0;
        echo "<table class='table'><thead> <tr><th scope=\"col\">ID</th><th scope=\"col\">Nom</th><th scope=\"col\">Prénom</th> <th scope=\"col\">Note</th></tr>  </thead>  <tbody>";

        foreach($result3 as $data)
        {
            $count++;
            $moy+=$data['note'];
            echo    "<tr> <td>".$data['id']."</td> <td>".$data['nom']."</td> <td>".$data['prenom']."</td><td>".$data['note']."</td> </tr>";
        }
        $moy=$moy/$count;
        echo "</tbody></table><br><h3>La note moyenne des étudiants est $moy </h3><br><br>";
    }
    else{echo "Résultat introuvable";}

}

function action()
{
    $base = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'isen2018';

    $idcon=connexpdo($base,$user,$password);

    if(isset($_POST['ajouter']))
    {
        header("Location: http://localhost/PHP/TP10/view-newetudiant.php");
        exit;
    }

    elseif (isset($_POST['modifier']))
    {
        header("Location: http://localhost/PHP/TP10/view-editetudiant.php");
        exit;
    }

    elseif (isset($_POST['supp']) && !empty($_POST['idE']))
    {
        $idE=$_POST['idE'];
        $deleteQ = 'DELETE from etudiant WHERE (id=? and user_id=? )';
        $deleteR = $idcon->prepare($deleteQ);
        $deleteR->execute([$idE, $_SESSION['id']]);
        header("Location: http://localhost/PHP/TP10/viewadmin.php");
        exit;
    }

    elseif (isset($_POST['deco']))
    {
        session_abort();
        header("Location: http://localhost/PHP/TP10/index.php");
        exit;
    }


}