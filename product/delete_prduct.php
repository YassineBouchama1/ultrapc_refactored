<?php
   session_start();
   include '../DataBase.php';
   $Database = new Database();


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    
$sql = "DELETE FROM  panier  WHERE panier_id = $id";

$Database->updateData($sql);
}
?>
