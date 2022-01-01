<?php 
        class RentBook{
                public $id;
                public $personId;
                public $bookId1;
                public $bookId2;
                public $bookId3;
                public $dateReturn;

                function __construct($id,$personid,$bookid1,$bookid2,$bookid3,$datereturn)
                {
                        $this->id = $id;
                        $this->personId = $personid;
                        $this->bookId1 = $bookid1;
                        $this->bookId2 = $bookid2;
                        $this->bookId3 = $bookid3;
                        $this->dateReturn = $datereturn;                       
                }
        }
        
?>