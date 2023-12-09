<?php
session_start();
require "con.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Player</title>
</head>
<style>
    body{
        background-image: url("./images/img1.jpg");
        overflow: hidden;
        background-repeat: no-repeat;
        background-size: cover;
    }
    div{
        display: block;
        box-shadow: 0 6px 20px 0 rgba(0, 0, 0, .19);
        margin: 100px;
        padding: 60px;
        text-align: center;
    }
    input{
        width: 225px;
        height: 50px;
        border: none;
        border-radius: 10px;
        text-align: center;
    }
    .search-btn{
        cursor: pointer;
        background-color: palegoldenrod;
        margin: 10px;
        padding: 10px 20px;
        font-family: Arial, Helvetica, sans-serif;
    }
    .search-btn:hover{
        transition: all 0.5s ease;
        transform: scale(1.0);
        color: white;
        background-color: black;
    }
</style>
<body>
<div>
<form method="POST" action="">
    <h1>Bienvennu Sur la page Wydad_Info : </h1><br>
        <input type="text" name="position" placeholder="Choisir le poste de joueurs  :"> <br><br><br>
        <input type="submit" value="Choisissez" name="btn" class="search-btn"> <br> <br>
        <h3><p>Retour à L'acceuil</p> <a href="login.php">Back</a></h3><br>
<?php


try {
    $con = new PDO('mysql:host=localhost;dbname=Wydad', 'root', '');
    //echo "connexion avec succes";
} catch (Exception $e) {
    exit('Erreur :' . $e->getMessage());
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

$position='';
if(isset($_POST["btn"])){
    if(empty($_POST["position"])){
        echo "<h2>Taper votre poste !!!!</h2>";
    }   
    if(!empty($_POST["position"])){
        $position=$_POST['position'];
        $sql = "SELECT * FROM equipe WHERE position = '$position' ";
        $aff = $con->query($sql);
        $aff->execute();
        //echo "<h2>Les '$position' sont :</h2>";
        while($row = $aff->fetch()){
            echo "<h2>Les '$position' sont :</h2>";
            echo $row["numero"] .' - '.$row["Nom"].' '.$row["Prénom"] . "<br><br>"; 
        }
        if($position!=="GK" && $position !=="LW" && $position !=="RW" && $position !=="ST" && $position !=="CB" && $position !=="LB" && $position !=="RB" && $position !=="CM" && $position !=="CDM" && $position !=="CAM" ){
            echo "<h2>POSITION INVALIDE!!!!!!!</h2><br>";
        } 
    }
}
echo"<br><br><br>";
?>

<a href="deconnexion.php">Déconnexion?</a>

</form>
</div>
</body>
</html>

