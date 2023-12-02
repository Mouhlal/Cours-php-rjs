<?php
session_start();
require "con.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body{
    background-image: url("./images/img1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    padding: auto;
    overflow: hidden;
}
div{
    margin:160px;
    padding: 30px;
    border-radius: 4px;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, .19);
    width: 70%;
    text-align: center;
    display: block;
}
input{
    width: 225px;
    height: 30px;
    border: none;
    border-radius: 14px;
    text-align: center;
    margin: auto;
}
.btn{
    cursor: pointer;
    background-color: powderblue;
    width: 225px;
    height: 30px;
}
.btn:hover{
    transition: all 0.5s ease;
    transform: scale(1.0);
    color: white;
    background-color: black;
}
 
</style>
<body>
    <div>
    <form action="" method="POST">
        <h1>Modifier user</h1>
        Entrez l'iduser que vous Modifier  <input type="text" name="iduser"><br>
        <hr>
        Entrer le nouveau login <input type="email" name="loginuser"><br><br>
        Entrer le nouveau password <input type="password" name="pswuser"> <br><br><br>
        <input type="submit" value="Modifier" class="btn" name="modifier">
        <?php
try {
    $con = new PDO('mysql:host=localhost;dbname=Wydad', 'root', '');
    //echo "connexion avec succes";
  } catch (Exception $e) {
    exit('Erreur :' . $e->getMessage());
  }
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

if(isset($_POST["modifier"])){

    $iduser = $_POST["iduser"];
    $loginuser = $_POST["loginuser"];
    $pswuser = $_POST["pswuser"];
    if(empty($_POST["iduser"]) && empty($_POST["loginuser"]) && empty($_POST["pswuser"])){
        echo "<h2>Please enter the status</h2>";
    }else{
        $sql = "UPDATE user SET `loginuser` = :loginuser , `pswuser` = :pswuser WHERE iduser = :iduser";
        $mo = $con->prepare($sql);
        $mo->execute([':loginuser'=>$loginuser ,':pswuser' => $pswuser , ':iduser' => $iduser ]);
        echo "<h1>Modification with succes";
        header("REFRESH:2;search.php");
    }
}
?>
        <h3><p>Go to Inscription</p> <a href="insere.php">Log In User</a> </h3>
    </form>
    </div>
</body>
</html>

