<?php require_once "./components/partials/header.php" ?>
<?php require_once "./Entity/Category.php" ?>
<?php require_once "./ObjectDao/CategoryDao.php" ?>
<?php require_once "./utils/ValidateRules.php" ?>
        <?php          
                        // Custom error message
                        $errors =[];
                        $listStatus =[
                                "1"=>"Active",
                                "0"=>"Unactive"
                        ];
                        //Check form submit
                        if(isset($_POST["isSubmit1"])){
                                    $fields = [
                                        'categoryid' => 'required | length5:5',
                                        'categoryname' => 'required',
                                    ];
                                    $errors = validate($_POST,$fields);
                                    //If have no error -> create new book
                                    if(count($errors) == 0){
                                        $obj = new Category($_POST["categoryid"],$_POST["categoryname"],(int)$_POST["categorystatus"]);
                                        //save value
                                        $categoryID = $_POST["categoryid"];
                                        $categoryName = $_POST["categoryname"];
                                        $categorySTATUS = $_POST["categorystatus"];
                                        //chose method
                                        if(is_string($_GET["id"])){                
                                                echo "in";
                                               $check = CategoryDao::updateCategory($obj,$_GET['id']);
                                                echo $check;
                                        }else{
                                                CategoryDao::createCategory($obj);
                                        }
                                        //redirect
                                        echo ' <script> location.replace("CategorysView.php"); </script> ';
                                }
                        }
                        //
                        if(isset($_GET["id"]) && ($_GET["id"]) !== null){
                                $categoryUpdate = CategoryDao::getCategoryById($_GET["id"]);
                                if($categoryUpdate != null && $categoryUpdate instanceof Category){
                                        $categoryID = $categoryUpdate->categoryCode;
                                        $categoryName = $categoryUpdate->categoryName;
                                        $categorySTATUS = $categoryUpdate->categoryStatus;
                                }
                        };
        ?>
        <section class="mt-3">
                <div>
                        <div>
                                <h4>Create New Category</h4>
                        </div>
                        <form action="" method="POST">
                                <div class="<?php if((isset($errors["categoryid"]))){echo "form-control-custom mb-4"." invalid";} else{echo "form-control-custom mb-4";} ?>">
                                        <label for="">Category Code</label>
                                        <input type="text" name="categoryid" value="<?php if(isset($categoryID)){echo $categoryID;} else {echo "";}; ?>">
                                        <p class="error-text"><?php if((isset($errors["categoryid"]))) echo $errors["categoryid"]  ?></p>
                                </div>
                                <div class="<?php if((isset($errors["categoryname"]))){echo "form-control-custom mb-4"." invalid";} else{echo "form-control-custom mb-4";} ?>">
                                        <label for="">Category Name</label>
                                        <input type="text" name="categoryname" value="<?php if(isset($categoryName)){echo $categoryName;} else {echo "";}; ?>">
                                        <p class="error-text"><?php if((isset($errors["categoryname"]))) echo $errors["categoryname"]  ?></p>
                                </div>    
                                <div class="form-control-custom mb-3">
                                        <label for="">Status</label>
                                        <select name="categorystatus">
                                                <?php 
                                                         foreach($listStatus as $k => $v){
                                                                echo "<option value='$k'";
                                                                if(isset($categorySTATUS) && $categorySTATUS == $k){
                                                                        echo "selected='selected'";
                                                                } else {echo "";}; 
                                                                echo ">$v</option>";
                                                            }
                                                ?>
                                        </select>
                                </div>  
                                <div class="form-actions text-right" style="grid-column: span 2;">
                                        <button class="btn-submit" name="isSubmit1">Submit</button>
                                </div>
                        </form>
                </div>
        </section>
<?php require_once "./components/partials/footer.php" ?>

