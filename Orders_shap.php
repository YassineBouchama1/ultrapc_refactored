

<?php 
session_start();
include 'backend/DataBase.php';
$Database = new Database();


$commandeData =  $Database->selectData('details_commande','*','confirm_achter = 1','details_id ASC');





$num = count($commandeData);


?>
    <div id="num_Admins" class="alert alert-info  mb-0 " role="alert">
             Orders Shipping  (<?= $num ?>)
              </div>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr >
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Commande_id</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">name de Client</div></th>
                    <th ><div style=" width: 200px;  word-wrap: break-word;  white-space: normal;">Achats Clients</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Prix Total</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Statut </div></th>
                 
                    </tr>
                </thead>
                <tbody class="table-group-divider" >
                
               
              
             
<?php
                  if (!empty($commandeData)) {
                   
                
                  foreach ($commandeData as  $value) {
                    $id =  $value["id_user"] ; 
                    $UsersData =  $Database->selectData('users','name',"id = $id",'',"1");

                   ?>
                     <tr>
                     <th  scope="row"><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value["commande_id"] ?></div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $UsersData["name"] ?></div></th>

                    <th ><div style=" width: 200px;  word-wrap: break-word;  white-space: normal;"><?= $value["names"] ?></div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value["prix_total"] ?> MAD</div></th>
                    
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">
                                 Shipped
                    </div>

                    </th>
                    </tr>
                
                    <?php    } }else {    ?>

                  <th class="text-center p-3" colspan="5">No Orders Shipped</th>



                  <?php   }  ?>


                     
                </tbody>
                </table>