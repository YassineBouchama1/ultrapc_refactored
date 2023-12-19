<?php 
session_start();
include '../backend/DataBase.php';
$Database = new Database();

 $id = $_GET["id"] ;


$sql = "DELETE FROM details_commande WHERE details_id =$id ";
$Database->updateData($sql);




?>
