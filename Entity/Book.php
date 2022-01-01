
<?php
class Book {
        //Field
                public $bookId;
                public $bookName;
                public $bookAuthor;
                public $bookPub;
                public $bookStatus;
                public $bookCategory;

                function __construct($bookI,$bookName,$bookAuthor,$bookPub,$bookStatus,$bookCategory)
                {
                        $this->bookId = $bookI;
                        $this->bookName = $bookName;
                        $this->bookAuthor = $bookAuthor;
                        $this->bookPub = $bookPub;
                        $this->bookStatus = $bookStatus;
                        $this->bookCategory = $bookCategory;
                }
}
?>