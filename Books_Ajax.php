<?php
        require_once "./ObjectDao/BookDao.php";      
        //Get another action if exist
        if(isset($_REQUEST["action"])){
                $action = $_REQUEST["action"];
        }
        //
        //handle action delete item
        if($action === "delete"){
                $id = $_POST["id"];
                if($id > 0){
                        $resultDelete = BookDao::deleteBook($id);
                        //response
                        if($resultDelete["rescode"] === 1){
                                echo "<div class='alert alert-success mt-2'>". $resultDelete["resdes"]."</div>";
                        }else{
                                echo "<div class='alert alert-danger mt-2'>". $resultDelete["resdes"]."</div>";
                        } 
                        
                        // this is what we get back and it's result parameter in function after success
                }
        }
        //handle action add item
        if($action ==="list"){
                $searchTerm = $_REQUEST["search"];
                $pageStart =(int) $_REQUEST["start_form"];
                $pageSize =(int) $_REQUEST["pageSize"];
                $arrBooks = BookDao::getListBook($searchTerm,$pageStart,$pageSize);
                        if($arrBooks->num_rows == 0){
                                echo '<div class="position-absolute text-center w-100 p-3 pt-5">
                                <i class="fas fa-archive fa-3x" style="color:#777;"></i>
                                <p class="mt-2">No data
                                </p> </div>';
                        }else{
                                foreach ($arrBooks as $t=>$objkh){
                                        $status =( $objkh["status"] == 1) ? true : false; 
                                        $statusClasses = $status ? 'text-success' : 'text-danger';
                                        echo '<tr>';          
                                               echo "<th style='padding-left:15px;'>".($t + 1)."</th>";  
                                                echo "<th>".$objkh["name"]."</th>";            
                                                echo "<th>".$objkh["author"]."</th>";             
                                                echo "<th>".$objkh["yearOfPublication"]."</th>";  
                                                echo "<th>".$objkh["category"]."</th>";            
                                                echo "<th class='$statusClasses'>".($status ? "Active" :"Unactive") ."</th>";  
                                                echo '<th style="border-left:0;border-right:0; border-bottom:0;" class="d-flex justify-content-center">';
                                                echo '<a href="createBook.php?id='.$objkh["id"].'"class="btn-modify-table btn-edit mr-1">';
                                                                echo '<img class="d-block" src="./assets/icons/edit_black_18dp.svg">';
                                                        echo '</a>';
                                                        echo '<button onClick="deleteBook('.$objkh["id"].')" class="btn-modify-table btn-delete ml-1">';
                                                                echo '<img src="./assets/icons/delete_black_18dp.svg">';
                                                        echo '</button>';
                                                echo "</th>" ;   
                                        echo '</tr>'; 
                                    }   
                        }                
        }     
        //handle action get all book
        if($action === "aaa"){
                $totalpages = BookDao::getTotalPage();
                if($totalpages > 0){//5 12 13
                        $pages = $totalpages / $_REQUEST['numberofpage'] +  (($totalpages % $_REQUEST['numberofpage']) != 0 ? 1 : 0);
                        for($i = 1; $i <=$pages;$i++){
                                echo '<button class="pagination_item" onclick="goToPage('. $i.')">';
                                echo $i;
                                echo '</button>';
                        }
                }
        }
?>