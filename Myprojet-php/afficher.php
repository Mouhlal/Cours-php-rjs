<?php
try{
    $con = new PDO('mysql:host=localhost;dbname=Wydad','root','');
    //echo "connexion avec succes";
}catch(Exception $e){
    exit('Erreur :'.$e->getMessage());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher</title>
</head>
<body>
<?php
$sql = "SELECT * FROM equipe";
$lister = $con->query($sql);
$lister = $lister->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
<h1>Les joueurs convoquées à la liste africains :</h1>
<form action="" method="POST">
<table border="2">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Poisition</th>
        <th>Pays</th>
        <th>Numero</th>
    </tr>
    <?php
    foreach($lister as $row) : ?>
    <tr>
        <td><?= $row["Nom"]?></td>
        <td><?= $row["Prénom"]?></td>
        <td><?= $row["position"]?></td>
        <td><?= $row["pays"]?></td>
        <td><?= $row["numero"]?></td>
    </tr>
    <?php endforeach ?>
</table>
</form>
</div>
</body>
</html>