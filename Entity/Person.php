<?php 
        class Person{
                public  $personCode;
                public  $personName;
                public  $personAddress;
                public $personEmail;
                public $personPhone;
                public $personBirthday;

                function __construct($personcode,$personname,$personaddress,$personemail,$personphone,$personbirthday)
                {
                        $this->personCode = $personcode;
                        $this->personName= $personname;
                        $this->personAddress= $personaddress;
                        $this->personEmail = $personemail;
                        $this->personPhone =$personphone;
                        $this->personBirthday=$personbirthday;
                }
        }

?>