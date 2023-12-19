<?php include 

'../layout/coon.php';


$id = $_GET["id"] ;

$Users_result = $conn->query("SELECT * FROM `admin` WHERE id = $id");
$UsersData = $Users_result->fetch(PDO::FETCH_ASSOC);


$Email = $UsersData["Email"] ;
$Email = $UsersData["Email"] ;
$Password = $UsersData["Password"] ;



$stmt = $conn->prepare("INSERT INTO `users`( `Email`, `Password`,`is_Active`) VALUES ('$Email','$Password' ,'1')");

$stmt->execute();



$stmt = $conn->prepare("DELETE FROM `admin` WHERE id = $id");
$stmt->execute(); 
?>