<?php
require_once './ObjectDao/RentBookDao.php';
require_once './ObjectDao/RentBookDetailDao.php';
require_once './ObjectDao/BookDao.php';
        //handle filter list
        if(isset($_POST['action'])){
                if($_POST['action']["name"] === "rentbook" ){
                      //send array info filter
                      $arrRentBook = RentBookDao::getListRentBook($_POST['action']["dataSend"]);
                //       var_dump($_POST['action']["dataSend"]);
                //       var_dump($arrRentBook);
                        if($arrRentBook->num_rows == 0){
                                echo '<div class="position-absolute text-center mx-auto w-100 p-5">
                                <i class="fas fa-box-open fa-3x" ></i>
                                        <p class="font-weight-bold" style="color:#292929">No Data</p>
                                </div>';
                        }else{
                                foreach ($arrRentBook as $t=>$objkh){
                                                echo '<tr>';          
                                                        echo "<th>".$objkh["id"]."</th>";            
                                                        echo "<th>".$objkh["personId"]."</th>";             
                                                        echo "<th>".$objkh["dateStartRent"]."</th>";  
                                                        echo "<th>".$objkh["dateEndRent"]."</th>";  
                                                        echo '<th><p onclick="fillContentMode('.$objkh["id"].')" type="button" class="btn-viewdetail" data-toggle="modal" data-target="#staticBackdrop">
                                                        Detail
                                                      </p></th>';    
                                                        echo '<th style="border-left:0;border-right:0; border-bottom:0;" class="d-flex justify-content-center">';
                                                        echo '<a href="createRentBook.php?id='.$objkh["id"].'"class="btn-modify-table btn-edit mr-1">';
                                                                        echo '<img class="d-block" src="./assets/icons/edit_black_18dp.svg">';
                                                                echo '</a>';
                                                                echo '<button onClick="deleteRentBook('.$objkh["id"].')" class="btn-modify-table btn-delete ml-1">';
                                                                        echo '<img src="./assets/icons/delete_black_18dp.svg">';
                                                                echo '</button>';
                                                        echo "</th>" ;   
                                                echo '</tr>'; 
                                  }                            
                        }  
                }
                //get number of pages
                if($_POST['action']["name"] === "pagin"){
                        $arrList = $_POST['action']["dataSend"];
                        $pagePosition = $arrList['pageSize'];
                        $arr_rent_book = RentBookDao::getTotalNoLimited($_POST['action']["dataSend"]);     
                        if($arr_rent_book > $pagePosition){//5 12 13
                              $pages2 = $arr_rent_book /(int)$pagePosition+  (($arr_rent_book %  (int)$pagePosition) != 0 ? 1 : 0);
                                for($i = 1; $i <=$pages2;$i++){
                                        echo '<button class="pagination_item" onclick="goToPageRentBook('. $i.')">';
                                        echo $i;
                                        echo '</button>';
                                }
                        }  else{
                                echo "";
                        }
                }
                //delete rent book
                if($_POST['action']['name'] === "delete"){
                        $id = (int)$_POST['action']['id'];
                        RentBookDao::deleteRentBook($id);
                }
        }
