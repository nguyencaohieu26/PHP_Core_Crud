<?php 
        require_once './Entity/RentBook.php';
        require_once './ObjectDao/RentBookDetailDao.php';
        require_once './Entity/RentBookDetail.php';
        require_once './utils/Connection.php';

        class RentBookDao{

                //create rent book
                static function createRentBook($rentbook){
                        $result = ["rescode"=>0,"resdes"=>"Execute Error!"];
                        //check null and is rent book type
                        if($rentbook == null || $rentbook instanceof RentBook == false){
                                return ['rescode'=>0,'resdes'=>"Input Is Not RentBook Type!"];
                        }
                        //connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                die ("Error Connection!");
                        }else if($conn->connect_error !== null){
                                die ("Connect Fail: ".$conn->connect_error);
                                return $result;
                        }
                        //sql query
                        $sql = "insert into rentbook(id,personId,dateStartRent,dateEndRent) values(?,?,?,?)";
                        //execute
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $currentDateTime = date('Y-m-d');
                        $st = $conn->prepare($sql);
                        $st->bind_param("iiss",$rentbook->id,$rentbook->personId,$currentDateTime,$rentbook->dateReturn);
                        $res = $st->execute();
                        if($res === true){
                                $result = array("rescode"=>1,"resdes"=>"Add Successfully");
                        }else{
                                $result =array("rescode"=>0, "resdes"=>$conn->error);
                        }
                        //create 
                                if(isset($rentbook->bookId1)){
                                         $rentdetail1 = new RentBookDetail($rentbook->id,$rentbook->bookId1);
                                         RentBookDetailDao::createRentBookDetail($rentdetail1);
                                }
                                if($rentbook->bookId2 != null){
                                        $rentdetail2 = new RentBookDetail($rentbook->id,$rentbook->bookId2);
                                        RentBookDetailDao::createRentBookDetail($rentdetail2);
                                }
                                if($rentbook->bookId3 != null){
                                        $rentdetail3 = new RentBookDetail($rentbook->id,$rentbook->bookId3);
                                        RentBookDetailDao::createRentBookDetail($rentdetail3);
                                }
                        //close
                        $st->close();
                        Connection::closeConnection($conn);
                        return $result;
                }
                static function updateRentBook($rentbook,$id){

                }
                //delete rentbook
                static function deleteRentBook($id){
                        
                }
                //list rentbook
                static function getListRentBook($condition){
                        $listRentBook =[];
                         //connect
                         $conn = Connection::getConnection();
                         if($conn === false){
                                 die ("Error Connection!");
                                 return;
                         }else if($conn->connect_error !== null){
                                 die ("Connect Fail: ".$conn->connect_error);
                                 return;
                         }
                         //sql
                        $conditionkey = array_keys($condition);
                        //default sql query
                        $sql="";
                        $sql = "select id,personId,dateStartRent,dateEndRent from rentbook ";
                        //sql query date start
                         $sql .="WHERE dateStartRent >= '".$condition[$conditionkey[2]];
                         if($condition[$conditionkey[3]] != null){
                         $sql.="' and dateStartRent < '".$condition[$conditionkey[3]];
                         }
                         $sql.="' Limit ".$condition[$conditionkey[0]].",".$condition[$conditionkey[1]].";";
                        //sql query date end
                        $result = $conn->query($sql);
                        //result
                        if($result->num_rows > 0){
                                //output data of each row
                                while($row = $result->fetch_assoc()){
                                        $listRentBook[] = $row;
                                }
                        }
                        //close connection
                        Connection::closeConnection($conn);
                        return $result ;
                }
                static function getTotalNoLimited($condition){
                          //connect
                          $conn = Connection::getConnection();
                          if($conn === false){
                                  die ("Error Connection!");
                                  return;
                          }else if($conn->connect_error !== null){
                                  die ("Connect Fail: ".$conn->connect_error);
                                  return;
                          }
                           //sql
                        $conditionkey = array_keys($condition);
                        //default sql query
                        $sql = "select * from rentbook ";
                        //sql query date start
                         $sql .="WHERE dateStartRent >= '".$condition[$conditionkey[2]]."'";
                         if($condition[$conditionkey[3]] != null){
                         $sql.=" and dateStartRent < '".$condition[$conditionkey[3]]."';";
                         }
                        //sql query date end
                        $result = $conn->query($sql);
                        //close connection
                        Connection::closeConnection($conn);
                        return $result->num_rows;
                }
        }
?>