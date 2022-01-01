<?php 
require_once './ObjectDao/RentBookDetailDao.php';
require_once './ObjectDao/BookDao.php';
        $action = $_REQUEST["action"];
           if($action === "detail"){
                $id = $_GET['idBook'];
                $arrBook = RentBookDetailDao::getBookDetailByOrderId($id);
                for($i =0 ; $i < count($arrBook);$i++){
                        $objBook = BookDao::getBookById(0,$arrBook[$i]['bookId']);
                                echo '<tr>';          
                                       echo "<th style='padding-left:15px;'>".($i + 1)."</th>";  
                                        echo "<th>".$objBook->bookName."</th>";            
                                        echo "<th>".$objBook->bookAuthor."</th>";             
                                        echo "<th>".$objBook->bookPub."</th>";  
                                        echo "<th>".$objBook->bookCategory."</th>";                          
                                echo '</tr>'; 
                }
        }

?>