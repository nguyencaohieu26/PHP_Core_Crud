<?php require_once "./components/partials/header.php" ?>
<?php require_once "./Enums/Variable.php"?>
        <section class="mt-2">
                <div><h5>Information Details</h5>
                </div>
                <form autocomplete="false">
                        <div class="container">
                                <div class="row">
                                        <div class="col-md-6 form-control-custom form-control-custom--space">
                                                <label for="">Name / Surname</label>
                                                <input type="text" name="name" value="Nguyen Van A"/>
                                                <p class="error-text"></p>
                                        </div>
                                        <div class="col-md-6 form-control-custom form-control-custom--space">
                                                <label for="">Email</label>
                                                <input type="text" name="email" value="nguyenvana@gmail.com">
                                                <p class="error-text"></p>
                                        </div>                                              
                                        <div class="col-md-6 form-control-custom form-control-custom--space">
                                                <label for="">Address</label>
                                                <input type="text" name="address" value="125 Tran Phu, Ha Noi">
                                                 <p class="error-text"></p>
                                        </div>
                                        <div class="col-md-6 form-control-custom form-control-custom--space">
                                                <label for="">PhoneNumber</label>
                                                <input type="text" name="phone" value="0906299368">
                                                 <p class="error-text"></p>
                                        </div>
                                        <div class="col-12 col-lg-6 d-flex">
                                                <div>   
                                                        <img class="rounded" width="110px" src="https://images.unsplash.com/photo-1557296387-5358ad7997bb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=457&q=80"/>
                                                </div>
                                                <div class="pl-2 flex-grow-1 d-flex flex-column">
                                                        <div class="form-control-custom">
                                                                <label for="">Birthday</label>
                                                                <input type="date" name="birthday">
                                                                <p class="error-text"></p>
                                                        </div>
                                                        <div class="d-flex mt-auto">
                                                                <div class="form-control-custom">
                                                                        <label for="">Languages</label>
                                                                        <select name="language">
                                                                                <option value="">Choose language</option>
                                                                                <option value="">Vietnamese</option>
                                                                                <option value="">English</option>
                                                                                <option value="">Japan</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-control-custom pl-2" >
                                                                        <label for="">Gender</label>
                                                                        <select name="gender">
                                                                                <option value="Male">Male</option>
                                                                                <option value="Male">Female</option>
                                                                        </select>
                                                                </div>
                                                       </div>
                                                </div>
                                        </div>
                                        <div class="col -12 col-lg-6 d-flex flex-column">
                                                <div class="form-control-custom">
                                                        <label for="">City Code</label>
                                                        <input type="text" name="citycode">
                                                        <p class="error-text"></p>
                                                </div>
                                                <div class="form-control-custom mt-auto">
                                                        <label for="">Nationality</label>
                                                        <select name="nationality">
                                                                <option value="">Choose Nationality</option>
                                                                <option value="">VietNam</option>
                                                                <option value="">United State</option>
                                                                <option value="">Japan</option>
                                                        </select>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="form-actions text-right mt-4">
                                <button class="btn-submit">Submit</button>
                        </div>
                </form>
        </section>
<?php require_once "./components/partials/footer.php" ?>