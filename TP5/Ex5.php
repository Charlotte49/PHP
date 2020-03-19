<!DOCTYPE html>
<html>
<head>
    <title>TP5</title>
</head>

<body>

<h1>Ex 5</h1>

<form action="Ex5.php" method="post" enctype="multipart/form-data">


    Fichier 1 <input type="file" name="file1" >
    <br>   <br>

    Fichier 2 <input type="file" name="file2">
    <br>   <br>


    <input type="submit" value="Envoi"  name="send">

    <?php
    if(isset($_FILES['file1']) && isset($_FILES['file2']))
    {
        $fichier1 = $_FILES['file1'];
        $fichier2 = $_FILES['file2'];
        move_uploaded_file($_FILES['file1']['tmp_name'], "image1.png");
        move_uploaded_file($_FILES['file2']['tmp_name'], "image2.jpeg");



echo "
    <table rules='all'>
    <thead>
    <tr>
    <td></td>
    <td>Fichier 1</td>
    <td>Fichier 2</td>
    </tr>
    </thead>
    <tr >
    <td >Name</td>
    <td >$fichier1[name]</td>
    <td >$fichier2[name]</td>
    </tr>
    <tr >
    <td >Type</td>
    <td >$fichier1[type]</td>
    <td >$fichier2[type]</td>
    </tr>
    <tr >
    <td >tmp_name</td>
    <td >$fichier1[tmp_name]</td>
    <td >$fichier2[tmp_name]</td>
    </tr>
    <tr >
    <td >Error</td>
    <td >$fichier1[error]</td>
    <td >$fichier2[error]</td>
    </tr>
    <tr >
    <td >Size</td>
    <td >$fichier1[size]</td>
    <td >$fichier2[size]</td>
    </tr>
    <tr >
    <td >Image</td>
    <td >   <img src='image1.png' width='50%'></td>
    <td >   <img src='image2.jpeg' width='50%'></td>
    </tr>
    </table>";
 
     }
    ?>
 
</form>


</body>
</html>





