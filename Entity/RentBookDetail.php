<?php 
        class RentBookDetail{
                public $rentbookID;
                public $bookID;

                function __construct($rentbookid,$bookid)
                {
                        $this->rentbookID = $rentbookid;
                        $this->bookID = $bookid;
                }
        }
        
?>