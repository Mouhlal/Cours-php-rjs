<?php
session_start();
require "con.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Suppression :</title>
</head>
<style>
    body{
        text-align: center;
        background-color: cornflowerblue;
    }
    div{
        border: 4px solid black;
        border-radius: 8px;
        width: 400px;
        height: 395px;
        margin-top: 177px;
        margin-left: 520px;
        padding: 20px;
        
    }
    
</style>
<body>
    <div>
    <h1>Suppression d'une user :</h1><br><br>
    <form action="" method="post">
        <h3>Taper iduser qui vous voulez Supprimer :</h3><br>
        <input type="text" name="iduser"><br><br>
        <input type="submit" name="supid" value="Supprimer">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["supid"])){
   $id = $_POST["iduser"];
   $supp = $_POST["supid"];
   if(empty($_POST["iduser"])){
        echo "<h2>Taper id</h2>";
   }else{
    $sql = "DELETE FROM user WHERE iduser = $id";
    $d = $con->prepare($sql);
    if($d->execute()){
        if($d->rowCount() > 0){
            echo "<h2>Suppression with succes</h2>";
            header("REFRESH:2;insere.php");
    }
    else{
        echo "<script>alert('ID non trouvé dans la base de données');</script>";
    }
}
    else{
        echo "<h2>Erreur de suppression</h2>";
    }
   }
}

?>

    </form>
    </div>
</body>
</html>