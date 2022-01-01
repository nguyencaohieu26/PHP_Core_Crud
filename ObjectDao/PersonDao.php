<?php 
        require_once './Entity/Person.php';
        require_once './utils/Connection.php';

        class PersonDao{

                //Create person
                static function creatPerson($person){
                        //create result
                        $result = ["rescode"=>0,"resdes"=>"Execute Error!"];
                        //check null & person type
                        if($person == null || $person instanceof Person == false){
                                return ['rescode'=>0,'resdes'=>"Input Is Not Book Type!"];
                        }
                        //connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                die("Error Connection!");
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return $result;
                        }
                        //sql query
                        $sql = "insert into person (personid,personName,personAddress,email,phone,birthday)
                        values(?,?,?,?,?,?) ";
                        //execute
                        $st = $conn->prepare($sql);
                        $st->bind_param("ssssss",$person->personCode,$person->personName,$person->personAddress,$person->personEmail,$person->personPhone,$person->personBirthday);
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
               
                //Update person
                static function updatePerson($person,$id){
                        $result = ['rescode'=>0,'resdes'=>"Execute Error!"];
                        //check param
                        if($person == null || intval($id) == 0 || ($person instanceof Person === false)){
                                return ['rescode'=>0,'resdes'=>"Input Is Not Book Type!"];
                        }
                        //connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                die ("Error Connection!");
                                return $result;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return $result;
                        }
                        //create sql
                        $sql = "update person set personName =?, personAddress=? where id=?";
                        //bind param
                        $st = $conn->prepare($sql);
                        $st->bind_param("ssi",$person->personName,$person->personAddress,$id);
                        $res = $st->execute();
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
               
                //delete person
                static function deletePerson($id){
                      $result = ['rescode'=>0,'resdes'=>"Execute Error!"];     
                      //connect
                      $conn = Connection::getConnection();
                      if($conn === false){
                              die ("Error Connection!");
                              return $result;
                      }else if($conn->connect_error !== null){
                              die ("Connection Fail: ".$conn->connect_error);
                              return $result;
                      }
                      //create sql
                      $sql = "delete from person where id =".$id;
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

                //get list person
                static function getListPerson(){
                        $listPerson = [];
                        //connect
                        $conn = Connection::getConnection();
                        //check connection
                        if($conn === false){
                                die("Error Connection");
                                return $listPerson;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                        }
                        //create sql
                        $sql = "select id,personid,personName,phone,email from person";
                        $result = $conn->query($sql);
                        //result
                        if($result->num_rows >0){
                                while($row = $result->fetch_assoc()){
                                        $listPerson[] = $row;
                                }
                        }
                        //close connection
                        Connection::closeConnection($conn);
                        return $listPerson;
                }
               
                //get person by id
                static function getPersonById($id){
                        $personfind = null;
                        $conn = Connection::getConnection();
                        //check connect
                        if($conn === false){
                                die("Error Connection");
                                return $personfind;
                        }else if($conn->connect_error !== null){
                                die("Connection Fail: ".$conn->connect_error);
                                return $personfind;
                        }
                        //create sql
                        $sql = "select id,personid,personName,personAddress,email,phone,birthday from person where id=".$id;
                        $result = $conn->query($sql);
                        //result
                        if($result->num_rows > 0){
                                //convert to object person
                                if($row = $result->fetch_assoc()){
                                        $personfind = new Person($row["personid"],$row["personName"],$row['personAddress'],$row['email'],$row['phone'],$row['birthday']);
                                }
                        }
                        //close connect
                        Connection::closeConnection($conn);
                        return $personfind;
                }
        }
?>