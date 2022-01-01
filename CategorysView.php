<?php require_once "./components/partials/header.php" ?>
<section class="categories__container mt-2">
        <div class="categories__container-header d-flex justify-content-between">
                <h4>List Categories</h4>
                <a href="createCategory.php" class="btn btn-primary">AddCategory</a>
        </div>
        <div class="categories-message"></div>
        <div class="categories__container-content mt-3">
                <table id="categories__table">
                        <thead>
                                <tr>
                                        <th>Stt</th>
                                        <th>Category Code</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                </tr>
                        </thead>
                        <tbody></tbody>
                </table>
        </div>
</section>
<?php require_once "./components/partials/footer.php" ?>