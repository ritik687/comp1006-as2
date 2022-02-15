<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting Shoes</title>
</head>
<body>
<?php


// get the selected shoeId from the url parameter using the $_GET array because get array will show you the shoeId in the URL
$shoeId = $_GET['shoeId'];

if (is_numeric($shoeId)) {

    // connect
    // $db = new PDO('mysql:host=172.31.22.43;dbname=Ram200495974', 'Ram200495974', 'y4O4M_hDnR');
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    require "database.php";

    // running the sql delete command
    $sql = "DELETE FROM shoes WHERE shoeId = :shoeId"; // : the parameters
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':shoeId', $shoeId, PDO::PARAM_INT);
    $cmd->execute();

    // disconnect
    $db = null;
}

// redirect again to the page shoes.php
header('location:shoes.php');
?>
</body>
</html>