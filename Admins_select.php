

<?php 
 session_start();
include 'backend/DataBase.php';

 $data = new adminDAO() ; 

 $AdminData = $data->getadmin('*','','id ASC') ;
 $num = count($AdminData);






?>
    <div id="num_Admins" class="alert alert-primary  mb-0 " role="alert">
              Liste des Admins (<?= $num ?>)
              </div>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr >
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Email</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Password</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Opérations</div></th>
                 
                    </tr>
                </thead>
                <tbody class="table-group-divider" >
                
               
              
             
<?php
                  if (!empty($AdminData)) {
                   
                
                  foreach ($AdminData as  $value) {
                   if ( $value ->getSuper_admin() === 1 ) { ?>
                     <tr>
                     <th  scope="row"><div style=" width: 190px;  word-wrap: break-word;  white-space: normal;"><?= $value ->getEmail() ?></div></th>
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value ->getPassword()?></div></td>
                    
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">SUPER Admin

                    </div>

                    </td>
                    </tr>
                  
          <?php    }else {      ?>
            
       
                    <tr>
                    <th  scope="row"><div style=" width: 190px;  word-wrap: break-word;  white-space: normal;"><?= $value ->getEmail()  ?></div></th>
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value ->getPassword() ?></div></td>
                    
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">
                    <button  onclick="makeRequest(<?=  $value ->getId() ?>,'Dashboard/back_userAdmin.php?id=')" class="btn btn-danger mb-2 ms-2" type="button" >Reject</button>

                    </div>

                    </td>
                    </tr>
                    <?php    }   ?>
                    <?php    } }  ?>


                     
                </tbody>
                </table>