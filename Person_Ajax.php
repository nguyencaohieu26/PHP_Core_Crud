<?php 
require_once "./ObjectDao/PersonDao.php";

//Default value will get all books ->action = list
$action= "list";
//Get another action if exist
if(isset($_REQUEST["action"])){
        $action = $_REQUEST["action"];
}
//action = delete
if($action === "delete"){
        $id = $_POST["id"];
        if($id > 0){
                $resultDelete = PersonDao::deletePerson($id);
                //response
                if($resultDelete["rescode"] === 1){
                        echo "<div class='alert alert-success mt-2'>". $resultDelete["resdes"]."</div>";
                }else{
                        echo "<div class='alert alert-danger mt-2'>". $resultDelete["resdes"]."</div>";
                } 
                
                // this is what we get back and it's result parameter in function after success
        }
}else{
        $arrPersons = PersonDao::getListPerson();
        foreach ($arrPersons as $t=>$objkh){
                var_dump($objkh);
                echo '<tr>';          
                       echo "<th style='padding-left:15px;'>".($t + 1)."</th>";  
                        echo "<th>".$objkh["personid"]."</th>";            
                        echo "<th>".$objkh["personName"]."</th>";             
                        echo "<th>".$objkh["email"]."</th>";    
                        echo "<th>".$objkh["phone"]."</th>";            
                        echo '<th class="d-flex justify-content-center">';
                        echo '<a href="createPerson.php?id='.$objkh["id"].'"class="btn-modify-table btn-edit mr-1">';
                                        echo '<img class="d-block" src="./assets/icons/edit_black_18dp.svg">';
                                echo '</a>';
                                echo '<button onClick="deletePerson('.$objkh["id"].')" class="btn-modify-table btn-delete ml-1">';
                                        echo '<img src="./assets/icons/delete_black_18dp.svg">';
                                echo '</button>';
                        echo "</th>"    ;      
                echo '</tr>'; 
            }
}  
?>