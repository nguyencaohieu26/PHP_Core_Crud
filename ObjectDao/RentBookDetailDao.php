<?php 
        require_once "./utils/Connection.php";
        require_once "./Entity/RentBookDetail.php";
        
        class RentBookDetailDao{

                //create book detail
                static function createRentBookDetail($rentbookdetail){
                        $result = ["rescode"=>0,"resdes"=>"Execute Error!"];
                        //check null and is category type
                        if($rentbookdetail == null || $rentbookdetail instanceof RentBookDetail == false){
                                return ['rescode'=>0,'resdes'=>"Input Is Not Rent Book Detail Type!"];
                        }
                        //Connect
                        $conn = Connection::getConnection();
                        if($conn == false){
                                die ("Error Connection!");
                                return;
                        }else if($conn->connect_error !== null){
                                die ("Connect Fail: ".$conn->connect_error);
                                return;
                        }
                        //sql query
                        $sql ="insert into rentdetail(rentbookId,bookId) values(?,?)";
                        //execute
                        $st = $conn->prepare($sql);
                        $st->bind_param("is",$rentbookdetail->rentbookID,$rentbookdetail->bookID);
                        $res = $st->execute();
                        //result
                        if($res === true){
                                $result = array("rescode"=>1,"resdes"=>"Add Successfully");
                        }else{
                                $result =array("rescode"=>0, "resdes"=>$conn->error);
                        }
                        //close
                        $st->close();
                        Connection::closeConnection($conn);
                        return $result;
                }
                //get bookdetail by orderid
                static function getBookDetailByOrderId($orderid){
                        $listRentBook = [];
                        //connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                die("Error Connection");
                                return;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return;
                        }
                        // create sql
                        $sql = "select bookId from rentdetail where rentbookId=".$orderid;
                        $result = $conn->query($sql);
                        //result
                        if($result->num_rows >0){
                                while($row = $result->fetch_assoc()){
                                        //return list book id
                                        $listRentBook[] = $row;
                                }
                        }
                        //close connection
                        Connection::closeConnection($conn);
                        return $listRentBook;
                }
                //delete rentdetail by order id
                static function deleteBookDetailByOrderId($orderid){
                        $result = ['rescode'=>0,'resdes'=>"Execute Error!"];     
                        //connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                die("Error Connection");
                                return;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return;
                        }
                        // create sql
                        $sql = "delete from rentdetail where rentbookId=".$orderid;
                        $st = $conn->prepare($sql);
                        $res = $st->execute();
                        //check result
                        if($res === true){
                          $result = array("rescode"=>1,"resdes"=>"Add Successfully");
                          }else{
                                  $result =array("rescode"=>0, "resdes"=>$conn->error);
                          }
                          //close
                          $st->close();
                          Connection::closeConnection($conn);
                          return $result;
                }
        }
?>