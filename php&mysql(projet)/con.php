<?php
// 1er Methode 
//$con = mysqli_connect('localhost' , 'root' , '' ,'Wydad' );

try{
    $con = new PDO('mysql:host=localhost;dbname=Wydad','root','');
    //echo "connexion avec succes";
}catch(Exception $e){
    exit('Erreur :'.$e->getMessage());
}
/* $sql="SELECT * FROM equipe ";
$contenutable = $con->query($sql);
echo "<table>";
while($ligne = $contenutable->fetch()){
    echo "<tr>";

    echo "<td>";
            echo $ligne['Nom'];
    echo "</td>";

    echo "<td>";
    echo $ligne['Prénom'];
    echo "</td>";

    echo "<td>";
    echo $ligne['position'];
    echo "</td>";

    echo "<td>";
    echo $ligne['pays'];
    echo "</td>";

    echo "<td>";
    echo $ligne['numero'];
    echo "</td>";

    echo "<td>";
    echo $ligne['game'];
    echo "</td>";

    echo "<td>";
    echo $ligne['goal'];
    echo "</td>";

    echo "<td>";
    echo $ligne['Assist'];
    echo "</td>";

    echo "<td>";
    echo $ligne['clean sheet'];
    echo "</td>";
}
echo "</table>"; */