<?php 
        //import connect
        require_once './utils/Connection.php';
        /**
         *  $table: table name
         *  $field: list field
         * 
         */
        class Crud{
                public $table;
                public $field;
                public $value;
                public $additional_condition;

                function __construct($tablename,$listfield,$conditions = "",$value){
                        $this->table = $tablename;
                        $this->field   =$listfield;
                        $this->additional_condition = $conditions;
                        $this->value = $value;
                }
                public function create(){
                        $result = ["rescode"=>0,"resdes"=>"Execute Error!"];
                        //Connect
                        $conn = Connection::getConnection();
                        if($conn === false){
                                $result = ["rescode"=>0,"resdes"=>"Connect Error!"];
                        }else if($conn->connect_error !== null){
                                $result = ["rescode"=>0,"resdes"=>$conn->connect_error];
                        }
                        //Create sql
                        $sql ="Insert into ".$this->table." (";
                        //get all field
                        for($i = 0; $i < count($this->field);$i++){
                                //append  param for each field
                                if($i + 1 == count($this->field)){
                                        $sql .= ($this->field)[$i]." = ?) "; 
                                }else{
                                        $sql .= ($this->field)[$i]." = ? ,";
                                }
                        }
                        // append value
                        $sql .= "values (";
                        for($j= 0; $j < count($this->field);$j++){
                                if($j + 1 == count($this->field)){
                                        $sql .= "?); "; 
                                }else{
                                        $sql .= "? ,";
                                }
                        }
                        //get all value
                        // $result = $conn->query($sql);
                        //close
                        Connection::closeConnection($conn);
                        return $sql;
                }
        }
?>