<?php require_once './components/partials/header.php' ?>
<?php require_once './ObjectDao/BookDao.php'?>
<?php require_once './Entity/RentBook.php' ?>
<?php require_once './ObjectDao/RentBookDao.php' ?>
<?php require_once './utils/ValidateRules.php';?>
<?php 
//get list books
        $testlistbook  = BookDao::getListBook2();
        if (isset($_POST["isSubmit3"])) {
                //basic validation rules
                $fields = [
                        'personid' => 'required',
                        'date-return' => 'required',
                        'bookid' => 'required',
                        'rentbookid'=>'required',
                ];
                //Check errors by using validate function
                $errors = validate($_POST, $fields);
                //If have no error -> create new book
                        $personID = $_POST["personid"];
                        $datereturn = $_POST["date-return"];
                        $bookID = $_POST["bookid"];
                        $rentbookID= $_POST['rentbookid'];
                        if(isset($bookID1)){$bookID1 = $_POST["bookid1"];}
                        if(isset($bookID2)){$bookID2 = $_POST["bookid2"];}
                        //check duplicate
                        if(isset($_POST["bookid1"]) || isset($_POST["bookid2"])){ 
                                if(isset($_POST["bookid1"])){
                                        if(strcmp($bookID,$_POST["bookid1"]) == 0){
                                                $errors['bookid'] = "Please don't choose book duplicate";
                                        }
                                        if(isset($_POST["bookid2"])){
                                              if ( strcmp($_POST["bookid1"],$_POST["bookid2"]) == 0) {
                                                $errors['bookid'] = "Please don't choose book duplicate";
                                              }
                                        }
                                }
                                if(isset($_POST["bookid2"])){
                                        if(strcmp($bookID,$_POST["bookid2"]) == 0){
                                                $errors['bookid'] = "Please don't choose book duplicate";
                                        }
                                        if(isset($_POST["bookid1"])){
                                              if ( strcmp($_POST["bookid1"],$_POST["bookid2"]) == 0) {
                                                $errors['bookid'] = "Please don't choose book duplicate";
                                              }
                                        }
                                }
                        }
                        //check date return & date today
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $currentDateTime = date('Y-m-d');
                        $date1= strtotime($currentDateTime);
                        $date2 = strtotime($datereturn);
                        if(!($date2 > $date1)){
                                $errors["date-return"] = "Please enter date-return end after today";
                        }
                //check all fields correct
                if (count($errors) == 0) {
                        //save value
                        $personID = $_POST["personid"];
                        $datereturn = $_POST["date-return"];
                        $bookID = $_POST["bookid"];
                        $bookID1 =  (isset($_POST["bookid1"]) ? $_POST["bookid1"] : null);
                        $bookID2 =  (isset($_POST["bookid2"]) ? $_POST["bookid2"] : null);
                        $rentbookID= $_POST['rentbookid'];
                        //chose method
                        $obj = new RentBook((int)$_POST['rentbookid'],(int)$_POST["personid"],$_POST["bookid"],$bookID1,$bookID2,$_POST["date-return"]);
                        if (isset($_GET["id"]) > 0) {
                                echo "<script>alert('Hello world')</script>";
                                RentBookDao::updateRentBook($obj, $_GET['id']);
                        } else {
                                var_dump($obj);
                                RentBookDao::createRentBook($obj);
                        }
                        //redirect
                        echo ' <script> location.replace("RentBooksView.php"); </script> ';
                }
        }
?>
        <section>
                <div><h4>Create New Rent Book</h4></div>
                <div>
                        <!-- form create rent book -->
                        <form action="" method="POST" class="form__createBook" id="form-rendbook">
                                <div class="form-control-custom">
                                        <label for="">RentBook ID</label>
                                        <input type="text" name="rentbookid" value="<?php echo isset($rentbookID) ? $rentbookID :"" ?>"/>
                                        <p class="error-text"><?php if ((isset($errors["rentbookid"]))) echo $errors["rentbookid"]  ?></p>
                                </div>  
                                <div class="form-control-custom">
                                        <label for="">Person ID</label>
                                        <input type="text" name="personid" value="<?php echo isset($personID) ? $personID :"" ?>"/>
                                        <p class="error-text"><?php if ((isset($errors["personid"]))) echo $errors["personid"]  ?></p>
                                </div>                       
                                <div class="form-control-custom">
                                        <label for="">DateReturn</label>
                                        <input type="date" name="date-return" value="<?php echo isset($datereturn) ? $datereturn :"" ?>">
                                        <p class="error-text"><?php if ((isset($errors["date-return"]))) echo $errors["date-return"]  ?></p>
                                </div>       
                                <div class="form-control-custom">
                                          <label for="">ListBook</label>                                        
                                                <select name="bookid">
                                                <?php
                                                        foreach ($testlistbook as $k => $v) {
                                                                echo "<option value='" . $v['bookid'] . "'";
                                                                if (isset($bookID) && $bookID == $k) {
                                                                        echo "selected='selected'";
                                                                } else {
                                                                        echo "";
                                                                };
                                                                echo ">" . $v['name'] . "</option>";
                                                        }
                                        ?>                            
                                                </select>
                                        <p class="error-text"><?php if ((isset($errors["bookid"]))) echo $errors["bookid"]  ?></p>
                                </div>
                                <div class="append-select " style="grid-column: span 2"></div>
                                <div class="text-right" style="grid-column: span 2;">
                                        <button type="button" class="btn-rentbook" id="addBookToCard" style="grid-column: span 2;">Add Book</button>
                                </div>  
                                <div class="form-actions mt-2">
                                        <button class="btn-submit " name="isSubmit3">Submit</button>
                                </div>
                        </form>
                </div>
        </section>
        <!-- Append the script to browser  -->
     <?php
        echo  ' <script>
           const buttonAddMoreBook  = document.querySelector("#addBookToCard");
          let limit = 3;
          buttonAddMoreBook.addEventListener("click",()=>{
                  --limit;
                  //add logic
                  const containerSelect = document.querySelector(".append-select");
                  const select_item = document.createElement("div");
                  select_item.innerHTML = `
                                  <div class="form-control-custom">
                                          <label for="">Choose Book${limit}</label>                                        
                                                  <select name="bookid${limit}">';
                                                  foreach ($testlistbook as $k => $v) {
                                                        echo "<option value='" . $v['bookid'] . "'";
                                                        if (isset($bookID) && $bookID == $k) {
                                                                echo "selected='selected'";
                                                        } else {
                                                                echo "";
                                                        };
                                                        echo ">" . $v['name'] . "</option>";
                                                }
                                                echo '</select>
                                          <p class="error-text"></p>
                                  </div>
                  `
                  containerSelect.insertAdjacentElement("afterend",select_item);
                  //disable button                
                  if(limit <= 1){
                          buttonAddMoreBook.disabled =true;
                          return;
                  }
          })
        </script>';                                     
     ?>
<?php require_once './components/partials/footer.php' ?>