<?php
session_start();
require "con.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
</head>
<style>
  body{
    background-image: url("./images/img1.jpg");
    margin: 10%;
    padding: auto;
    background-size: 105%;
    background-repeat: no-repeat;
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
  width: 200px;
  height: 55px;
  border: none;
  border-radius: 12px;
  text-align: center;
  }
  .btn{
  position: relative;
  display: inline-block;
  margin: 10px;
  padding: 10px 20px;
  text-align: center;
  font-size: 18px;
  letter-spacing: 1px;
  text-decoration: none;
  color: black;
  background: transparent;
  cursor: pointer;
  transition: ease-out 0.5s;
  border: 2px solid black;
  border-radius: 20px;
  box-shadow: inset 0 0 0 0 palegreen;
 }
 .btn:hover {
  color: white;
  box-shadow: inset 0 -100px 0 0 grey;
}
.button:active {
  transform: scale(0.1);
}
 a{
  color: black;
  position: relative;
}
a:hover{
  color: gold;
}


 
</style>
<body>
    <form action="" method="POST">
      <div>
      <h1>Login Wc :</h1>
      <input type="email" placeholder="Taper votre email" name="email" > <br><br>
      <input type="password" placeholder="Taper votre password" name="pass" ><br><br>
      <input class="btn" type="submit" name="login" value="Login">
      <h3><p>Don't have an account?</p><a href="signup.php">Sign up</a></h3>
    </form>
</body>
</html>
<?php
try {
  $con = new PDO('mysql:host=localhost;dbname=Wydad', 'root', '');
} catch (Exception $e) {
  exit('Erreur :' . $e->getMessage());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["login"])) {
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  
  if(empty($email) || empty($pass)) {
    echo "<h2 style=color:aliceblue>Please enter both email and password</h2>";

  } else {
    $sql = "SELECT * FROM `admin` WHERE email = ? AND psw = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$email, $pass]);
    $count = $stmt->rowCount();
    $info = $stmt->fetch(PDO::FETCH_ASSOC);

    if($count > 0) {
      echo "<h2 style=color:rebeccapurple>Welcome</h2> ". "<h2>" .$_SESSION["nom"]=$info['nom'] . ' ' . $_SESSION["prenom"]=$info['prenom']."</h2>" ;
      header("REFRESH:2;search.php");
    } else {
      echo "<h2 style=color:aliceblue>Incorrect email or password</h2>";
    }
  }
}

/* if(FILTER_VALIDATE_EMAIL == true){
  echo '<h2 style=color:deeppink><script>document.write("Email is not valid")</script></h2>';
}
else{
  echo '<script>document.write("Email is valid")</script>';
} */
?>

