<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserer </title>
</head>
<style>
    body{
    background-image: url("img3.jpg");
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
    border-radius: 7px;
    text-align: center;
    margin: auto;
}
.btn{
    cursor: pointer;
    background-color: white;
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
    <form action="" method="POST">
        <div>
      <h1><Label>Ajouter une user</Label>:</h1>
      <table border="1">
        <tr>
            <th><label for="">iduser</label></th> <th><input type="text" name="iduser" required></th> </tr>
            <tr><th><label for="">Loginuser</label></th> <th><input type="email" name="loginuser" required></th></tr>
            <tr><th><label for="">password_user</label></th> <th><input type="password" name="pswuser" required></th></tr>
            <tr>
                <th colspan="2"><input style=width:100% type="submit" value="Add" name="add" class="btn"></th>
            </tr>
            <?php
try {
    $con = new PDO('mysql:host=localhost;dbname=Wydad', 'root', '');
    //echo "connexion avec succes";
} catch (Exception $e) {
    exit('Erreur :' . $e->getMessage());
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['add'])){
    if(!empty($_POST['iduser']) && !empty($_POST['loginuser']) && !empty($_POST['pswuser'])){
        $iduser = $_POST['iduser'];
        $loginuser = $_POST['loginuser'];
        $pswuser = $_POST['pswuser'];
        $sql = "INSERT INTO `user`(iduser,loginuser,pswuser) VALUES ($iduser,'$loginuser','$pswuser') ";
        $resultat = $con->exec($sql);
        echo "<h1 style=color:blue> - Ajoutation with succes  </h1>";
        header("REFRESH:2;search.php");
    }
    else{
        echo "<h2 style=color:red>!!!!! AUCUN USER AJOUTEE !!!!!</h2>";
    }
}
?>

      </table>
      </div>
    </form>
</body>
</html>
