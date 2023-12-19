<?php 
session_start();
include '../backend/DataBase.php';
$Database = new Database();

 $id = $_GET["id"] ;



$sql = "UPDATE details_commande SET confirm_achter= 1 WHERE details_id =$id ";
$Database->updateData($sql);




?>
