<?php  require_once "./components/partials/header.php" ?>
<?php
        require_once "./Entity/Person.php";
        require_once "./ObjectDao/PersonDao.php";
        require_once "./utils/ValidateRules.php";

        //Error Array
        $errors = [];
        //Check form submit
        if(isset($_POST["isSubmit2"])){
                //Change custom mess for each field
                $fields = [
                    'personcode' => 'required | length5:5',
                    'personname' => 'required | alphanumeric',
                    'personemail' => 'required',
                    'personaddress' => 'required | alphanumeric',
                    'personphone' => 'required',
                    'personbirthday' => 'required',
                ];
                $errors = validate($_POST,$fields);
                //If have no error -> create new book
                if(count($errors) == 0){
                    $obj = new Person($_POST["personcode"],$_POST["personname"],$_POST["personaddress"],$_POST["personemail"],$_POST["personphone"],$_POST["personbirthday"]);
                    //save value
                    $personID = $_POST["personcode"];
                    $personName = $_POST["personname"];
                    $personEmail = $_POST["personemail"];
                    $personAddress = $_POST["personaddress"];
                    $personPhone = $_POST["personphone"];
                    $personBirthday = $_POST["personbirthday"];
                    //chose method
                    if(isset($_GET["id"])>0){
                            PersonDao::updatePerson($obj,$_GET['id']);
                    }else{
                            var_dump($obj);
                            PersonDao::creatPerson($obj);
                    }
                    //redirect
                    echo ' <script> location.replace("PersonsView.php"); </script> ';
            }
    }
    //
    if(isset($_GET["id"]) && intval($_GET["id"])){
            $personupdate = PersonDao::getPersonById($_GET["id"]);
            if($personupdate != null && $personupdate instanceof Person){
                    $personID = $personupdate->personCode;
                    $personName = $personupdate->personName;
                    $personEmail = $personupdate->personEmail;
                    $personAddress =$personupdate->personAddress;
                    $personPhone = $personupdate->personPhone;
                    $personBirthday = $personupdate->personBirthday;
            }
    };
?>
         <section class="mt-3">
                <div>
                        <div>
                                <h4>Create New Person</h4>
                        </div>
                        <form action="" method="POST" class="form__createBook">
                                <div class="<?php if((isset($errors["personcode"]))){echo "form-control-custom"." invalid";} else{echo "form-control-custom";} ?>">
                                        <label for="">PersonCode</label>
                                        <input type="text" name="personcode" value="<?php if(isset($personID)){echo $personID;} else {echo "";}; ?>">
                                        <p class="error-text"><?php if((isset($errors["personcode"]))) echo $errors["personcode"]  ?></p>
                                </div>
                                <div class="<?php if((isset($errors["personname"]))){echo "form-control-custom"." invalid";} else{echo "form-control-custom";} ?>">
                                        <label for="">Person Name</label>
                                        <input type="text" name="personname" value="<?php if(isset($personName)){echo $personName;} else {echo "";}; ?>">
                                        <p class="error-text"><?php if((isset($errors["personname"]))) echo $errors["personname"]  ?></p>
                                </div>
                                <div class="<?php if((isset($errors["personemail"]))){echo "form-control-custom"." invalid";} else{echo "form-control-custom";} ?>">
                                        <label for="">Email</label>
                                        <input type="text" name="personemail"  value="<?php if(isset($personEmail)){echo $personEmail;} else {echo "";}; ?>">
                                        <p class="error-text"><?php if((isset($errors["personemail"]))) echo $errors["personemail"]  ?></p>
                                </div>
                                <div class="<?php if((isset($errors["personaddress"]))){echo "form-control-custom"." invalid";} else{echo "form-control-custom";} ?>">
                                        <label for="">Address</label>
                                        <input type="text" name="personaddress" value="<?php if(isset($personAddress)){echo $personAddress;} else {echo "";}; ?>">
                                        <p class="error-text"><?php if((isset($errors["bookyear"]))) echo $errors["personaddress"]  ?></p>
                                </div>
                                <div class="<?php if((isset($errors["personphone"]))){echo "form-control-custom"." invalid";} else{echo "form-control-custom";} ?>">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="personphone" value="<?php if(isset($personPhone)){echo $personPhone;} else {echo "";}; ?>">
                                        <p class="error-text"><?php if((isset($errors["personphone"]))) echo $errors["personphone"]  ?></p>
                                </div>
                                <div class="<?php if((isset($errors["personbirthday"]))){echo "form-control-custom"." invalid";} else{echo "form-control-custom";} ?>">
                                        <label for="">Birthday</label>
                                        <input type="date" name="personbirthday" value="<?php if(isset($personBirthday)){echo $personBirthday;} else {echo "";}; ?>">
                                        <p class="error-text"><?php if((isset($errors["personbirthday"]))) echo $errors["personbirthday"]  ?></p>
                                </div>
                                <div class="form-actions text-right" style="grid-column: span 2;">
                                        <button class="btn-submit" name="isSubmit2">Submit</button>
                                </div>
                        </form>
                </div>
        </section>


<?php require_once "./components/partials/footer.php" ?>