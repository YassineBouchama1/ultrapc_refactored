      <?php 
      session_start();
      include '../DataBase.php';
      $Database = new Database();


      if (isset($_GET["id_add"]) && isset($_SESSION["user"])) {
        

      $id_add = $_GET["id_add"] ; 
     

 
      $produitData =  $Database->selectData('produit','*',"Reference = $id_add",'',"1");


      $Reference = $produitData["Reference"] ;
      $Etiquette = $produitData["Etiquette"] ;
      $img = $produitData["img"] ;
      $OffreDePrix = $produitData["OffreDePrix"] ;
      $QuantiteStock = $produitData["QuantiteStock"] ;



      if ( empty($_SESSION["user"]) ) {  
      echo "no" ; 
      }else {
        $user_id = $_SESSION["user"] ;


        $panierData =  $Database->selectData('panier','*',"",'');


         
     
        $found = false;
foreach ($panierData as $item) {
    if ($item["Etiquette"] === $Etiquette && $item["client_id"] === $user_id) {
        // Matching product found in the cart
        $found = true;
        $panier_id =$item["panier_id"] ;
        $total =  $item["Stock"] + 1 ;
        $update_query = $conn->prepare("UPDATE `panier` SET `Stock` = :total WHERE panier_id = :id_product");
        $update_query->bindParam(':total', $total, PDO::PARAM_INT);
        $update_query->bindParam(':id_product', $panier_id, PDO::PARAM_INT);
        $update_query->execute();
        break; // Exit loop since product is found
    }
}

if (!$found) {
   
  $user_id = $_SESSION["user"] ;



$sql = "INSERT INTO panier ( `Etiquette`, `img`, `OffreDePrix`,`QuantiteStock`,  `client_id`) VALUES ('$Etiquette','$img','$OffreDePrix','$QuantiteStock' ,'$user_id')";

$Database->updateData($sql);
}
    
      }
        
        ?>

      <?php } else {
        echo "0";
      } ?>