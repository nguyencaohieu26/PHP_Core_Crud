<?php 
        class Connection {
                private const SERVERNAME ="127.0.0.1:4306";
                private const USERNAME ="root";
                private const PASSWORD="";
                private const DATABASE="assginment_phpcore";

                static function getConnection(){
                        $connection = mysqli_connect(self::SERVERNAME,self::USERNAME,self::PASSWORD,self::DATABASE);
                        return $connection;
                }
                static function closeConnection($con){
                        if($con != null){
                                $con->close();
                        }
                }
        }
?>