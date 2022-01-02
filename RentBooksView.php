<?php require_once "./components/partials/header.php" ?>
<?php   
//Default start date
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = date('Y-m-d');
//override date start

?>
        <section class="rentbooks__container">
                        <div class="rentbooks__container-header d-flex justify-content-between">
                                <h4>List Book Borrow</h4>
                                <a href="createRentBook.php" class="btn btn-primary">Borrow Book</a>
                        </div>
                        <div class="container_filter d-flex">
                                <div class="form-control-custom mr-2">
                                        <label for="">Date Start</label>
                                        <input type="date" id="filter_date-rentStart" name="dateStart" >
                                </div>
                                <div class="form-control-custom">
                                        <label for="">Date End</label>
                                        <input type="date" id="filter_date-rentEnd" name="dateEnd"/>
                                </div>
                        </div>
                        <div class="rentbooks-message"></div>
                        <div class="rentbook__container-content mt-3" style="height: 270px;">
                                <table id="rentbooks__table">
                                <thead>
                                                <tr>
                                                        <th>RentBookID</th>
                                                        <th>Person ID</th>   
                                                        <th>Date Rent</th>   
                                                        <th>Date Return</th>  
                                                        <th>Details</th>  
                                                        <th>Actions</th>
                                                </tr>
                                </thead> 
                                <tbody class="position-relative"></tbody> 
                                </table>
                        </div>
                        <div id="rentbook_pagination" class="d-flex justify-content-end">
                                <!-- generate pages number -->
                        </div>
        </section>
<?php require_once "./components/partials/footer.php" ?>