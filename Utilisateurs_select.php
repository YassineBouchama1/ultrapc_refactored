

<?php 
 session_start();
include 'backend/DataBase.php';

 $data = new Users() ; 

 $UsersData = $data->getUsers('*','is_Active = 1','id DESC') ;
 $num = count($UsersData);






// $UsersData =  $Database->selectData('users','*','is_Active = 1','id DESC');
// $num = count($UsersData);


?>
       <div id="num_Utilisateurs" class="alert alert-success  mb-0 " role="alert">
                   Liste des Client (<?= $num ?>)
                  </div>
                <table class="table table-striped table-hover " >
                <thead >
                <tr >
                    <th ><div style=" width: 90px;  word-wrap: break-word;  white-space: normal;">Name</div></th>
                    <th ><div style=" width: 140px;  word-wrap: break-word;  white-space: normal;">Email</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Password</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Ville</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Opérations</div></th>
                 
                    </tr>
                </thead>
                <tbody class="table-group-divider" >
                
               
              
              
               
<?php
                  if (!empty($UsersData)) {
                   
                
                  foreach ($UsersData as  $value) {
                  
                 ?>
                    <tr>
                    <th  scope="row"><div style=" width: 90px;  word-wrap: break-word;  white-space: normal;"><?= $value ->getPrenom() ?></div></th>
                    <th  scope="row"><div style=" width: 190px;  word-wrap: break-word;  white-space: normal;"><?= $value ->getEmail() ?></div></th>
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value ->getPassword()?></div></td>
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value ->getVille() ?></div></td>
                    
                    <td ><div style=" width: 120px;  word-wrap: break-word;  white-space: normal;">
                    <button  onclick="makeRequest(<?= $value ->getId() ?>,'Dashboard/Accept_userAdmin.php?id=')" type="button" class="btn btn-success mb-2 ms-2">is admin</button>
                    <button onclick="makeRequest(<?= $value ->getId() ?>,'Dashboard/delete_Visiteurs.php?id=')" class="btn btn-danger mb-2 ms-2" type="button" >delete</button>

                    </div>

                    </td>
                   

                    </tr>
                    <?php  

                  }   }?>

                    </tbody>
                </table>