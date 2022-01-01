<?php 
        class Category{
                public $categoryCode;
                public $categoryName;
                public $categoryStatus;

                function __construct($categorycode,$categoryname,$categorystatus)
                {
                        $this->categoryCode = $categorycode;
                        $this->categoryName=$categoryname;
                        $this->categoryStatus=$categorystatus;
                }
        }
?>