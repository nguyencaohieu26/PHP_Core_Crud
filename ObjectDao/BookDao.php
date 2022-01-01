<?php
        require_once "./utils/Connection.php";
        require_once "./Entity/Book.php";

        class BookDao {

                //create new book
                static function createBook($book){
                        $result = ['rescode'=>0,'resdes'=>"Execute Error!"];
                        //Check null and is book type
                        if($book == null || ($book instanceof Book === false)){
                                return ['rescode'=>0,'resdes'=>"Input Is Not Book Type!"];
                        }
                        //Connect
                        $conn = Connection::getConnection();
                        //Check connect
                        if($conn === false){
                                die ("Error Connection");
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail ".$conn->connect_error);
                                return $result;
                        }
                        //Sql query
                        $sql = "insert into book(bookid,name,author,yearOfPublication,status,category)"
                        ."values(?,?,?,?,?,?)";
                        //execute
                        $st = $conn->prepare($sql);
                        $st->bind_param("sssiis",$book->bookId,$book->bookName,$book->bookAuthor,$book->bookPub,$book->bookStatus,$book->bookCategory);
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

                //upate book by id
                static function updateBook($book,$id){
                        $result = ['rescode'=>0,'resdes'=>"Execute Error!"];
                        if($book == null || intval($id) == 0 || ($book instanceof Book === false)){
                                return ['rescode'=>0,'resdes'=>"Input Is Not Book Type!"];
                        }
                        //Connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                die ("Error Connection");
                                return $result;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail ".$conn->connect_error);
                                return $result;
                        }
                        //Sql query
                        $sql = "update book set name=?, author=?,yearOfPublication=?,status=?,category=? where id = ?";
                        //Bind param
                        $st = $conn->prepare($sql);
                        $st->bind_param("ssiisi",$book->bookName,$book->bookAuthor,$book->bookPub,$book->bookStatus,$book->bookCategory,$id);
                        $res = $st->execute();
                        if($res === true){
                                $result = array("rescode"=>1,"resdes"=>"Add Successfully");
                        }else{
                                $result =array("rescode"=>0, "resdes"=>$conn->error);
                        }
                        $st->close();
                        Connection::closeConnection($conn);
                        return $result;
                }

                //delete book
                static function deleteBook($id){
                        $result = ['rescode'=>0,'resdes'=>"Execute Error!"];
                        //Connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                die ("Error Connection");
                                return $result;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return $result;
                        }
                        //Create Sql
                        $sql = "delete from book where id =?";
                        $st = $conn->prepare($sql);
                        $st->bind_param("i",$id);
                        $res = $st->execute();
                        //check result
                        if($res === true){
                                $result = array("rescode"=>1,"resdes"=>"Add Successfully");
                        }else{
                                $result =array("rescode"=>0, "resdes"=>$conn->error);
                        }
                        //Close
                        $st->close();
                        Connection::closeConnection($conn);
                        return $result;
                }

                //get list book
                static function getListBook($condition ="",$page,$pageSize){
                        $listBook = [];
                        //Connect
                        $conn = Connection::getConnection();
                        //Check connection
                        if($conn === false){
                                die ("Error Connection");
                                return $listBook;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                        }
                        //Create sql
                        if($condition){
                                $sql= "select id,bookid,name,author,yearOfPublication,status,category from book where name="."'$condition';";
                        }else{
                                $sql = "select id,bookid,name,author,yearOfPublication,status,category from book";
                                $sql.=' Limit '.$page.','.$pageSize.';';
                        }
                        $result = $conn->query($sql);
                        //result
                        if($result->num_rows > 0){
                                //output data of each row
                                while($row = $result->fetch_assoc()){
                                        $listBook[] = $row;
                                }
                        }

                        //close connect
                        Connection::closeConnection($conn);
                        return $result;
                }
                
                static function getListBook2(){
                        $listBook = [];
                        //Connect
                        $conn = Connection::getConnection();
                        //Check connection
                        if($conn === false){
                                die ("Error Connection");
                                return;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return;
                        }
                        //Create sql
                        $sql = "select bookid,name from book";
                        $result = $conn->query($sql);
                        //result
                        if($result->num_rows > 0){
                                //output data of each row
                                while($row = $result->fetch_assoc()){
                                        $listBook[] = $row;
                                }
                        }
                        //close connect
                        Connection::closeConnection($conn);
                        return $listBook;
                }

                //get book by id
                static function getBookById($id,$bookget=""){
                        $khfind = null;
                        $conn = Connection::getConnection();
                        //
                        if($conn === false){
                                die ("Error Connection");
                                return $khfind;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return $khfind;
                        }
                        //Create sql
                        $sql = "select id,bookid,name,author,yearOfPublication,status,category from book where id = ".$id;
                        if($bookget != ""){
                        $sql =  "select id,bookid,name,author,yearOfPublication,status,category from book where bookid = "."'".$bookget."' ";
                        }
                        $result = $conn->query($sql);
                       //xu ly ket qua
                       if($result->num_rows > 0){
                               if($row = $result->fetch_assoc()){
                                       //Convert to object book
                                       $khfind = new Book($row["bookid"],$row["name"],$row["author"],$row["yearOfPublication"],$row["status"],$row["category"]);
                               }
                       }
                       //Close connect
                       Connection::closeConnection($conn);
                       return $khfind;
                }
                //count number of pages
                static function getTotalPage(){
                        $conn = Connection::getConnection();
                          //
                          if($conn === false){
                                die ("Error Connection");
                                return;
                        }else if($conn->connect_error !== null){
                                die ("Connection Fail: ".$conn->connect_error);
                                return;
                        }
                        $sql = "SELECT * FROM book";
                        $result = mysqli_query($conn, $sql);
                                $row =mysqli_num_rows($result);
                        
                        return $row;
                }
        }

?>