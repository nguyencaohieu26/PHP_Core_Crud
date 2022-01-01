<?php include_once  "../login/components/partials/header.php" ?>
<?php require_once "./Entity/Book.php" ?>
<?php require_once "./ObjectDao/BookDao.php" ?>
<?php require_once "./utils/ValidateRules.php" ?>
<?php require_once './ObjectDao/CategoryDao.php' ?>
<?php require_once './Enums/Variable.php'?>
<?php

$errors = [];
//get list category from database
$listCategory = CategoryDao::getListCategory();
//Check form submit
if (isset($_POST["isSubmit"])) {
        $fields = [
                'bookid' => 'required | length5:5',
                'bookname' => 'required | alphanumeric',
                'bookauthor' => 'required | alphanumeric',
                'bookyear' => 'required | number',
                'bookcategory' => 'ChooseCategory',
        ];
        $errors = validate($_POST, $fields);
        //If have no error -> create new book
        $bookID = $_POST["bookid"];
        $bookNAME = $_POST["bookname"];
        $bookAUTHOR = $_POST["bookauthor"];
        $bookYEAR = $_POST["bookyear"];
        $bookSTATUS = $_POST["bookstatus"];
        $bookCATEGORY = $_POST["bookcategory"];
        if (count($errors) == 0) {
                $obj = new Book($_POST["bookid"], $_POST["bookname"], $_POST["bookauthor"], (int)$_POST["bookyear"], (int)$_POST["bookstatus"], $_POST["bookcategory"]);
                //save value
                $bookID = $_POST["bookid"];
                $bookNAME = $_POST["bookname"];
                $bookAUTHOR = $_POST["bookauthor"];
                $bookYEAR = $_POST["bookyear"];
                $bookSTATUS = $_POST["bookstatus"];
                $bookCATEGORY = $_POST["bookcategory"];
                //chose method
                if (isset($_GET["id"]) > 0) {
                        BookDao::updateBook($obj, $_GET['id']);
                } else {
                        BookDao::createBook($obj);
                }
                //redirect
                // echo ' <script> location.replace("BooksView.php"); </script> ';
        }
}
//
if (isset($_GET["id"]) && intval($_GET["id"])) {
        $bookupdate = BookDao::getBookById($_GET["id"]);
        if ($bookupdate != null && $bookupdate instanceof Book) {
                $bookID = $bookupdate->bookId;
                $bookNAME = $bookupdate->bookName;
                $bookAUTHOR = $bookupdate->bookAuthor;
                $bookYEAR = $bookupdate->bookPub;
                $bookSTATUS = $bookupdate->bookStatus;
                $bookCATEGORY = $bookupdate->bookCategory;
        }
};
?>
<section class="mt-3">
        <div>
                <div>
                        <h4>Create New Book</h4>
                </div>
                <form action="" method="POST" class="form__createBook">
                        <div class="<?php if ((isset($errors["bookid"]))) {
                                                echo "form-control-custom" . " invalid";
                                        } else {
                                                echo "form-control-custom";
                                        } ?>">
                                <label for="">BookID</label>
                                <input type="text" name="bookid" value="<?php if (isset($bookID)) {
                                                                                echo $bookID;
                                                                        } else {
                                                                                echo "";
                                                                        }; ?>"></?>
                                <p class="error-text"><?php if ((isset($errors["bookid"]))) echo $errors["bookid"]  ?></p>
                        </div>
                        <div class="<?php if ((isset($errors["bookname"]))) {
                                                echo "form-control-custom" . " invalid";
                                        } else {
                                                echo "form-control-custom";
                                        } ?>">
                                <label for="">BookName</label>
                                <input type="text" name="bookname" value="<?php if (isset($bookNAME)) {
                                                                                        echo $bookNAME;
                                                                                } else {
                                                                                        echo "";
                                                                                }; ?>">
                                <p class="error-text"><?php if ((isset($errors["bookname"]))) echo $errors["bookname"]  ?></p>
                        </div>
                        <div class="<?php if ((isset($errors["bookauthor"]))) {
                                                echo "form-control-custom" . " invalid";
                                        } else {
                                                echo "form-control-custom";
                                        } ?>">
                                <label for="">BookAuthor</label>
                                <input type="text" name="bookauthor" value="<?php if (isset($bookAUTHOR)) {
                                                                                        echo $bookAUTHOR;
                                                                                } else {
                                                                                        echo "";
                                                                                }; ?>">
                                <p class="error-text"><?php if ((isset($errors["bookauthor"]))) echo $errors["bookauthor"]  ?></p>
                        </div>
                        <div class="<?php if ((isset($errors["bookyear"]))) {
                                                echo "form-control-custom" . " invalid";
                                        } else {
                                                echo "form-control-custom";
                                        } ?>">
                                <label for="">YearOfPublication</label>
                                <input type="text" name="bookyear" value="<?php if (isset($bookYEAR)) {
                                                                                        echo $bookYEAR;
                                                                                } else {
                                                                                        echo "";
                                                                                }; ?>">
                                <p class="error-text"><?php if ((isset($errors["bookyear"]))) echo $errors["bookyear"]  ?></p>
                        </div>
                        <div class="form-control-custom">
                                <label for="">Status</label>
                                <select name="bookstatus">
                                        <?php
                                        foreach ($listStatus as $k => $v) {
                                                echo "<option value='$k'";
                                                if (isset($bookSTATUS) && $bookSTATUS == $k) {
                                                        echo "selected='selected'";
                                                } else {
                                                        echo "";
                                                };
                                                echo ">$v</option>";
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="form-control-custom">
                                <label for="">Category</label>
                                <select name="bookcategory">
                                        <?php
                                        foreach ($listCategory as $k => $v) {
                                                echo "<option value='" . $v['categoryId'] . "'";
                                                if (isset($bookSTATUS) && $bookSTATUS == $k) {
                                                        echo "selected='selected'";
                                                } else {
                                                        echo "";
                                                };
                                                echo ">" . $v['categoryName'] . "</option>";
                                        }
                                        ?>
                                </select>
                                <p class="error-text"><?php if (isset($errors['bookcategory'])) echo $errors['bookcategory'];  ?></p>
                        </div>
                        <div class="form-actions text-right" style="grid-column: span 2;">
                                <button class="btn-submit" name="isSubmit">Submit</button>
                        </div>
                </form>
        </div>
</section>
<?php require_once "./components/partials/footer.php" ?>