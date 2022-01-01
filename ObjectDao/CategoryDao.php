<?php 
        require_once "./Entity/Category.php";
        require_once "./utils/Connection.php";

        class CategoryDao{

                //create category
                static function createCategory($category){
                        $result = ["rescode"=>0,"resdes"=>"Execute Error!"];
                        //check null and is category type
                        if($category == null || $category instanceof Category == false){
                                return ['rescode'=>0,'resdes'=>"Input Is Not Book Type!"];
                        }
                        //Connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                die("Error Connection!");
                        }else if($conn->connect_error !== null){
                                die("Connect Fail: ".$conn->connect_error);
                                return $result;
                        }
                        // sql query
                        $sql = "insert into category(categoryId,categoryName,categoryStatus)"."values(?,?,?)";
                            //execute
                            $st = $conn->prepare($sql);
                            $st->bind_param("ssi",$category->categoryCode,$category->categoryName,$category->categoryStatus);
                            $res = $st->execute();
                            //check result query
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

                static function updateCategory($category,$id){
                        var_dump($category);
                        var_dump($id);
                        $result = ['rescode'=>0,'resdes'=>"Execute Error!"];
                        $conn = Connection::getConnection(); 
                        if($conn === false){
                                die("Error Connection");
                                return $result;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return $result;
                        }
                        $sql = "Update category Set categoryName=?,categoryStatus=? Where categoryId=?";
                        $st = $conn->prepare($sql);
                        $st->bind_param("sis",$category->categoryName,$category->categoryStatus,$id);
                        $res = $st->execute();
                        return $res;

                }
                //delete category
                static function deleteCategory($id){
                        $result = ['rescode'=>0,'resdes'=>"Execute Error!"];
                        //connect
                        $conn = Connection::getConnection(); 
                        if($conn === false){
                                die("Error Connection");
                                return $result;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return $result;
                        }
                        //create sql
                        $sql = "delete from category where categoryId=?";
                        $st= $conn->prepare($sql);
                        $st->bind_param("s",$id);
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
                //get list category
                static function getListCategory(){
                        $listCategory = [];
                        //Connect
                        $conn = Connection::getConnection();
                        //check connection
                        if($conn === false){
                                die ('Error Connection');
                                return $listCategory;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                        }
                        //Create sql
                        $sql = "select categoryId,categoryName,categoryStatus from category";
                        $result = $conn->query($sql);
                        //result
                        if($result->num_rows > 0){
                                //output data of each row
                                while($row = $result->fetch_assoc()){
                                        $listCategory[] = $row;
                                }
                        }
                        //close connect
                        Connection::closeConnection($conn);
                        return $listCategory;
                }
                //get category by id
                static function getCategoryById($id){
                        $categoryfind = null;
                        $conn = Connection::getConnection();
                        //check connect
                        if($conn === false){
                                die("Error Connection");
                                return $categoryfind;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return $categoryfind;
                        }
                        //Create sql
                        $sql = "select categoryId,categoryName,categoryStatus from category where categoryId ='".$id."'";
                        $result = $conn->query($sql);
                        //result
                        if($result->num_rows > 0){
                                //Convert to object category
                                if($row = $result->fetch_assoc()){
                                        $categoryfind = new Category($row["categoryId"],$row["categoryName"],$row["categoryStatus"]);
                                }
                        }
                        //close connect
                        Connection::closeConnection($conn);
                        return $categoryfind;
                }
        }
?>