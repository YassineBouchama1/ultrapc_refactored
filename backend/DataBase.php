<?php

include "class/Users.php" ;
include "class/Admin.php" ;
include "class/Product.php" ;
include "class/Categorie.php" ;
include "class/Cart.php" ;
include "class/Orders.php" ;

class Database {
    private $host = 'localhost';
    private $dbname = 'best_électroniques_2';
    private $username = 'root';
    private $password = '';
    public $connection;
    private static $instance;
    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

        try {
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $this->connection = null;
        }
    }
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnection() {
        return $this->connection;
    }


    

    public function selectData($tableName, $columns = '*', $where = '', $orderBy = '', $limit = 'all') {
        if (!$this->connection) {
            echo "No database connection!";
            return false;
        }

        try {
           
            $sql = "SELECT $columns FROM $tableName";

            
            if (!empty($where)) {
                $sql .= " WHERE $where";
            }

            if (!empty($orderBy)) {
                $sql .= " ORDER BY $orderBy";
            }

         
           
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            if ($limit === 'all') {
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            }else {
                $result = $statement->fetch(PDO::FETCH_ASSOC);

            }

            return $result;
        } catch (PDOException $e) {
            echo "Selection failed: " . $e->getMessage();
            return false;
        }
    }


    public function insertData($tableName, $columns, $values) {
        if (!$this->connection) {
            echo "No database connection!";
            return false;
        }
        try {
            $values1 = implode(",",$values);
            $columns1 = implode(",",$columns);
           

            $sql = "INSERT INTO $tableName ( $columns1) VALUES ( $values1)";
          
           
            
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            return true; 
        } catch (PDOException $e) {
            throw new Exception("Insertion failed: " . $e->getMessage());
        }
    }


    public function updateData($sql) {
        if (!$this->connection) {
            echo "No database connection!";
            return false;
        }
        try {
          
            
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            return true; 
        } catch (PDOException $e) {
            throw new Exception("Insertion failed: " . $e->getMessage());
        }
    }

   


    public function deleteData($tableName, $where = '') {
        if (!$this->connection) {
            echo "No database connection!";
            return false;
        }

        try {
            $sql = "DELETE FROM $tableName";

            if (!empty($where)) {
                $sql .= " WHERE $where";
            } else {
                echo "Specify a condition to delete.";
                return false;
            }

            $statement = $this->connection->prepare($sql);
            $statement->execute();

            return true;
        } catch (PDOException $e) {
            error_log("Deletion failed: " . $e->getMessage());
            throw new Exception("Deletion failed: " . $e->getMessage());
        }
    }



}


            //<<<< Users >>>>//

class Users extends Database {

    public function getUsers(  $columns = '*', $where = '', $orderBy = '', $limit = 'all') {
        $connection = $this->getConnection();

        $usersData = $this->selectData('users', $columns, $where , $orderBy , $limit ); 

     
  
        $users = array();
       
           
     
        foreach ($usersData as $B) {
           
           
            $users[] = new User($B["id"],$B["name"],$B["prénom"],$B["phone"], $B["Email"],$B["adresse"],$B["ville"],$B["Password"],$B["is_Active"]);
        } 
        return $users;
     

    }

    public function CreateUser($User)  {
        $this->getConnection();

         return $this->insertData('users', ["name", "prénom", "phone", "Email", "adresse", "ville", "Password", "is_Active"], [$User->getName(),$User->getPrenom(),$User->getPhone(),$User->getEmail(),$User->getAdresse(),$User->getVille(),$User->getPassword(),$User->getIsActive()] ); 

    }

    public function deleteUser($tableName , $where = '') {
        $connection = $this->getConnection();

        $this->deleteData('users' , $where );

    }

}






class AdminDAO extends Database {

    public function getadmin( $columns = '*', $where = '', $orderBy = '', $limit = 'all') {
        $connection = $this->getConnection();

        $adminData = $this->selectData('admin', $columns = '*', $where = '', $orderBy = '', $limit = 'all'); 
     
  
       
        $admin = array();
       

        foreach ($adminData as $B) {

           
            $admin[] = new Admin($B["id"],$B["Email"],$B["Password"],$B["super_admin"]);
        } 
        return $admin;
     

    }

    public function Createadmin($admin)  {
        $connection = $this->getConnection();
        $usersData = $this->insertData('admin', ["Email", "Password", "super_admin"], ["'".$admin->getEmail()."'","'".$admin->getPassword()."'","'".$admin->getSuper_admin()."'"] ); 

    }

    public function deleteadmin( $where = '') {
        $connection = $this->getConnection();

        $this->deleteData('admin' , $where );

    }

}






class ProductsDAO extends Database {

    public function getproducts( $columns = '*', $where = '', $orderBy = '', $limit = 'all') {
        $connection = $this->getConnection();

        $productsData = $this->selectData('produit', $columns , $where , $orderBy, $limit ); 
     
      
       
        $products = array();
       

        foreach ($productsData as $B) {
            $products[] = new Product($B["Reference"],$B["Etiquette"],$B["Code à barres"],$B["PrixAchat"],$B["img"],$B["PrixFinal"],$B["OffreDePrix"],$B["Description"],$B["QuantiteMin"],$B["QuantiteStock"],$B["CategorieID"],$B["deleted_at"]);
        } 
        return $products;
     

    }

    public function Createproduct($products)  {
        $connection = $this->getConnection();
        $usersData = $this->insertData(
            'produit',
            [ "Etiquette", "`Code à barres`", "PrixAchat", "img", "PrixFinal", "OffreDePrix", "Description", "QuantiteMin", "QuantiteStock", "CategorieID"],
            [
              
                "'" . $products->getEtiquette() . "'",
                "'" . $products->getCodeBarres() . "'",
                "'" . $products->getPrixAchat() . "'",
                "'" . $products->getImg() . "'",
                "'" . $products->getPrixFinal() . "'",
                "'" . $products->getOffreDePrix() . "'",
                "'" . $products->getDescription() . "'",
                "'" . $products->getQuantiteMin() . "'",
                "'" . $products->getQuantiteStock() . "'",
                "'" . $products->getCategorieID() . "'"
               
            ]
        );
        
    }

    public function deleteproduct( $where = '') {
        $connection = $this->getConnection();

        $this->deleteData('produit' , $where );

    }
}


           


class CategoriesDAO extends Database {

    public function getcategories( $columns = '*', $where = '', $orderBy = '', $limit = 'all') {
      $this->getConnection();

        $categoriesData = $this->selectData('categorie', $columns, $where , $orderBy , $limit ); 
     
    
       
        $categories = array();
       

        foreach ($categoriesData as $B) {
            $categories[] = new Categorie($B["id"],$B["Nom"],$B["Description"],$B["img"],$B["deleted_at"]);
        } 
        return $categories;
     

    }

    public function Createcategories($categories)  {
        $connection = $this->getConnection();
        $usersData = $this->insertData('categorie', ["Nom", "Description", "img"], ["'".$categories->getNom()."'","'".$categories->getDescription()."'","'".$categories->getImg()."'"] ); 

    }

    public function deletecategorie( $where = '') {
        $connection = $this->getConnection();

        $this->deleteData('categorie' , $where );

    }
}


                    //<<<< Paniers >>>>//



class CartDAO extends Database {

    public function getPanier( $columns = '*', $where = '', $orderBy = '', $limit = 'all') {
        $connection = $this->getConnection();

        $CartData = $this->selectData('panier', $columns, $where , $orderBy , $limit ); 
        // echo "<pre>";
        // print_r($PanierData);
        // echo "</pre>";
    
      
        $cart = array();
       

        foreach ($CartData as $B) {
            $cart[] = new Cart($B["panier_id"],$B["Etiquette"],$B["img"],$B["OffreDePrix"],$B["QuantiteStock"],$B["Stock"],$B["client_id"],$B["valid_commend"]);        } 
        return $cart;
     

    }

    public function CreatePanier($categories)  {
        $connection = $this->getConnection();
        $PanierData = $this->insertData(
            'panier', // Table name
            ["Etiquette", "img", "OffreDePrix", "QuantiteStock", "Stock", "client_id", "valid_commend"],
            [
                "'".$categories->getEtiquette()."'", 
                "'".$categories->getImg()."'", 
                "'".$categories->getOffreDePrix()."'", 
                "'".$categories->getQuantiteStock()."'", 
                "'".$categories->getStock()."'", 
                "'".$categories->getClientId()."'", 
                "'".$categories->getValidCommend()."'", 
            ]
        );
        
    }

    public function deletePanier( $where = '') {
        $connection = $this->getConnection();

        $this->deleteData('categorie' , $where );

    }
}





                    //<<<< DetailsCommandes >>>>//



class OrdersDAO extends Database {

    public function getDetailsCommandes( $columns = '*', $where = '', $orderBy = '', $limit = 'all') {
        $connection = $this->getConnection();

        $DetailsCommandesData = $this->selectData('details_commande', $columns, $where , $orderBy , $limit ); 
     
    
       
        $DetailsCommandes = array();
       

        foreach ($DetailsCommandesData as $B) {
            $DetailsCommandes[] = new Orders($B["details_id"],$B["names"],$B["prix_total"],$B["commande_id"],$B["id_user"],$B["confirm_achter"],$B["created_at"]);      
          } 
        return $DetailsCommandes;
     

    }

    public function CreateDetailsCommandes($Commandes)  {
        $connection = $this->getConnection();
        $this->insertData(
            'details_commande', 
            ["names", "img", "prix_total", "QuantiteStock", "Stock", "id_user", "confirm_achter"],
            [
                "'" . $Commandes->getNames() . "'",
                "'" . $Commandes->getImg() . "'",
                "'" . $Commandes->getPrixTotal() . "'",
                "'" . $Commandes->getQuantiteStock() . "'",
                "'" . $Commandes->getStock() . "'",
                "'" . $Commandes->getUserId() . "'",
                "'" . $Commandes->getConfirmAchter() . "'",
            ]
        );
        
        
    }

    public function deleteDetailsCommandes( $where = '') {
        $connection = $this->getConnection();

        $this->deleteData('details_commande' , $where );

    }
}





