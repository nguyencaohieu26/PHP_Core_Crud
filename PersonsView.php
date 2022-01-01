<?php require_once "./components/partials/header.php" ?>
<section class="person__container mt-2">
        <div class="person__container-header d-flex justify-content-between">
                <h4>List Persons</h4>
                <a href="createPerson.php" class="btn btn-primary">AddPerson</a>
        </div>
        <div class="persons-message"></div>
        <div class="persons__container-content mt-3">
                <table id="persons__table">
                        <thead>
                                <tr>
                                        <th>Stt</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                </tr>
                        </thead>
                        <tbody></tbody>
                </table>
        </div>
</section>
<?php require_once "./components/partials/footer.php" ?>