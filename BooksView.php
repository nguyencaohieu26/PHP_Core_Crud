<?php include_once "./components/partials/header.php";?>
        <section class="books__container mt-2">
                <div class="books__container-header d-flex justify-content-between">
                        <h4>List Books</h4>
                        <a href="createBook.php" class="btn btn-primary">AddBook</a>
                </div>
                <div>
                        <form id="formbook-search">
                                <input type="text" id="booksearch" placeholder="Search book by name..." />
                        </form>
                </div>
                <div class="books-message"></div>
                <div class="book__container-content mt-3">
                        <div class="div_table table-responsive-md">
                                <div class="overlay">
                                        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                                </div>
                                <table id="books__table">
                                        <thead>
                                                        <tr>
                                                        <th>Stt</th>   
                                                        <th>Name</th>   
                                                        <th>Author</th>   
                                                        <th>Year</th>   
                                                        <th>Category</th>   
                                                        <th>Status</th>   
                                                        <th>Actions</th>
                                                        </tr>
                                        </thead> 
                                <tbody></tbody> 
                                </table>
                        </div>
                        <div id="pagination" class="mt-3 text-right"></div>
                </div>
        </section>
        <script>
                  const form = document.getElementById("formbook-search");
                        form.addEventListener('submit',(e)=>{
                                e.preventDefault();
                        })
                        const input = document.getElementById('booksearch');
                        input.addEventListener('input',(e)=>{
                                inputFile = e.target.value;
                                getDataBook(inputFile)
                                getPagination();
                        })
        </script>
<?php require_once "./components/partials/footer.php"; ?>