<?php 
        require_once "./ObjectDao/CategoryDao.php";

        $action ="list";

        if(isset($_REQUEST['action'])){
                $action= $_REQUEST["action"];
        };
        if($action === "delete"){
                $id = $_POST["id"];
                        $resultDelete = CategoryDao::deleteCategory($id);
                        //response
                        if($resultDelete["rescode"] === 1){
                                echo "<div class='alert alert-success mt-2'>". $resultDelete["resdes"]."</div>";
                        }else{
                                echo "<div class='alert alert-danger mt-2'>". $resultDelete["resdes"]."</div>";
                        }                       
                        // this is what we get back and it's result parameter in function after success
        }
        else{
                $arrCategories = CategoryDao::getListCategory();
                foreach ($arrCategories as $t=>$objkh){
                        $idcate = "'".$objkh['categoryId']."'";
                        $idcatecov = trim($idcate);
                        $status = ($objkh["categoryStatus"] == 1) ? true : false;
                        $stausClasses = $status ? 'text-success' : 'text-danger';
                        echo '<tr>';          
                               echo "<th style='padding-left:15px;'>".($t + 1)."</th>";  
                                echo "<th>".$objkh["categoryId"]."</th>";            
                                echo "<th>".$objkh["categoryName"]."</th>";   
                                echo "<th class='$stausClasses'>".($status ? "Active" : "Unactive") ."</th>";           
                                echo '<th class="d-flex justify-content-center">';
                                echo '<a href="createCategory.php?id='.$objkh['categoryId'].'" class="btn-modify-table btn-edit mr-1">';
                                                echo '<img class="d-block" src="./assets/icons/edit_black_18dp.svg">';
                                        echo '</a>';
                                        echo '<button onClick="deleteCategory('.$idcatecov.')" class="btn-modify-table btn-delete ml-1">';
                                                echo '<img src="./assets/icons/delete_black_18dp.svg">';
                                        echo '</button>';
                                echo "</th>"    ;      
                        echo '</tr>'; 
                    }
        }
?>