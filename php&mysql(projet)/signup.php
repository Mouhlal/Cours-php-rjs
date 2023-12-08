<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<style>
body{
    background-image: url("./images/page.png");
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
a{
  color: red;
  position: relative;
}
a:hover{
  color: gold;
}

</style>
<body>
    <form action="" method="POST">
    <div>
        <h1 style="color:blanchedalmond;">Inscription Dans La Page :</h1>
        <input type="text" name="newnom" placeholder="Taper votre Nom"><br><br>
        <input type="text" name="newprenom" placeholder="Taper votre Prenom"><br><br>
        <input type="email" name="newemail" placeholder="Taper votre email"><br><br>
        <input type="password" name="newpass" placeholder="Taper votre password"><br><br>
        <input type="submit" value="Inscrire" name="new" class="btn" >
        <h3><p>Already have an account ?</p><a href="login.php">Log In</a></h3>
        </div>
    </form>
</body>
</html>
<?php
session_start();
try {
  $con = new PDO('mysql:host=localhost;dbname=Wydad', 'root', '');
  //echo "connexion avec succes";
} catch (Exception $e) {
  exit('Erreur :' . $e->getMessage());
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["new"])){
    if(!empty($_POST["newnom"]) && !empty($_POST["newprenom"]) && !empty($_POST["newemail"]) && !empty($_POST["newpass"])){
        $newnom = $_POST["newnom"];
        $newprenom = $_POST["newprenom"];
        $newemail = $_POST["newemail"];
        $newpass = $_POST["newpass"];
        if(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()]).{8,}$/',$newpass)){
               $errpass = "<script>alert(\"Votre password invalide\")</script>";
        }
        else{
       
        $sql = "INSERT INTO `admin` (email,psw,nom,prenom) VALUES ('$newemail','$newpass','$newnom','$newprenom')";
        $res = $con->exec($sql);
        echo "<script>alert(\"Inscription with succés\")</script>";
            header("REFRESH:2;search.php");
        }
        } else{
            echo "<h2><script>alert(\"Veuillez-vous saisir tous les champs\")</script> </h2>";
}
    
}
