<?php 
//  include '../layout/coon.php';
  include '../DataBase.php';
  $Database = new Database();
  session_start();

if (isset($_POST["valid_commend"]) && isset($_SESSION["user"])) {
    $valid_commend = $_POST["valid_commend"];
    $randomNumber = $_POST["randomNumber"];
    $user_id = $_SESSION["user"] ;

 

$panierData =  $Database->selectData('panier','*',"client_id = $user_id",'');
}
$names = [];
$total = 0 ; 
 foreach ($panierData as $value) {
    array_push($names, $value["Etiquette"]);
    $total += $value["OffreDePrix"] ;
 }
$implodarray = implode(" || ", $names);

 if (!empty($total)) {


 $sql = "INSERT INTO details_commande ( `names`, `prix_total`, `commande_id`, `id_user`) VALUES ('$implodarray','$total','$randomNumber','$user_id')";

$Database->updateData($sql);

  }

  $sql = "DELETE FROM `panier` WHERE client_id = $user_id";

  $Database->updateData($sql);









 header("Location: ../index.php");