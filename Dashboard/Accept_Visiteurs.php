<?php 
include '../layout/coon.php';

 $id = $_GET["id"] ;

$stmt = $conn->prepare("UPDATE `users` SET `is_Active`='1' WHERE id =$id ");
$stmt->execute(); 






?>
