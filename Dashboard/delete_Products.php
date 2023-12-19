<?php 
session_start();
include '../backend/DataBase.php';
$Database = new Database();

 $id = $_GET["id"] ;


$sql = "DELETE FROM produit WHERE Reference = $id";
$Database->updateData($sql);

header("Location: ../dashboard_Products.php");
exit; 




?>
