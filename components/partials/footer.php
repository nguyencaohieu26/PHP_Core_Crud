                        </div>
               </section>
               <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Rent Book Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                        <table class="table">
                        <thead>
                        <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Book Author</th>
                        <th scope="col">Publication Year</th>
                        <th scope="col">Category</th>
                        </tr>
                        </thead>
                        <tbody class="modal_table-body"></tbody>
                        </table>
                        </div>
                        <div class="modal-footer border-0"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                        </div>
                        </div>
                </div>
        </main>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
        //
        let page = 1;
        let per_page_record =5;
        let start_form = (page - 1)*per_page_record;
        let inputFile;
        
        //handle Submit Form Search      
        //Pagination
        function goToPage(pageNumber){
                page = pageNumber;
                start_form = (page - 1)*per_page_record;
                getDataBook(inputFile);
        }
        getPagination();
        function getPagination(){
                $.ajax({
                        url:`Books_Ajax.php?action=aaa&numberofpage=${per_page_record}`,
                        success:(result)=>{
                                $('#pagination').html(result);
                        }
                });
        }
        //Filter Book By array
        getDataBook();
        function getDataBook(searchTerm =""){
                //Mo phong loading data
                $(".overlay").addClass("active");
                setTimeout(()=>{
                        $.ajax({
                                        url: `Books_Ajax.php?action=list&search=${searchTerm}&start_form=${start_form}&pageSize=${per_page_record}`, 
                                        success: function(result){
                                        $("#books__table tbody").html(result);
                                        $(".overlay").removeClass("active");
                        }});
                },500)
                getPagination();
        };
        
        //
        function deleteBook(id){
                $.confirm({
                title:'',
                content: '' + `
                        <div class="text-center p-2">
                                <p>Do you sure want to delete?</p>
                        </div>
                        `,
                        buttons: {
                                confirm: function () {
                                        //confirm -> do something
                                        let obj = {id,action:"delete"};
                                        $.ajax(
                                                {
                                                        url:"Books_Ajax.php",
                                                        method:"POST",
                                                        data:obj,
                                                        success:function (result){
                                                                    //show mess -> delete success
                                                                   $(".books-message").html(result);                     
                                                                   //load data again
                                                                   getDataBook();
                                                                   //clear mess after
                                                                   setTimeout(() => {
                                                                        $(".books-message").html("");
                                                                   }, 3000);
                                                        }
                                                }
                                        )       
                                          $.alert('Confirmed!');
                                },
                                cancel: function () {console.log("cancel")},//cancel -> do nothing
                        }
                });
        }   
        getDataCategory();
        function getDataCategory(){
                $.ajax(
                        {
                                url:"Category_Ajax.php?action=list",
                                success:function(result){
                                        $("#categories__table tbody").html(result);
                                }
                        }
                )
        }
        function deleteCategory(id){
                $.confirm({
                title:'',
                content: '' + `
                        <div class="text-center p-2">
                                <p>Do you sure want to delete?</p>
                        </div>
                        `,
                        buttons: {
                                confirm: function () {
                                        //confirm -> do something
                                        let obj = {id,action:"delete"};
                                        $.ajax(
                                                {
                                                        url:"Category_Ajax.php",
                                                        method:"POST",
                                                        data:obj,
                                                        success:function (result){
                                                                    //show mess -> delete success
                                                                   $(".categories-message").html(result);                     
                                                                   //load data again
                                                                   getDataCategory();
                                                                   //clear mess after
                                                                   setTimeout(() => {
                                                                        $(".categories-message").html("");
                                                                   }, 3000);
                                                        }
                                                }
                                        )       
                                          $.alert('Confirmed!');
                                },
                                cancel: function () {console.log("cancel")},//cancel -> do nothing
                        }
                });
        }
        getPersonData();
        function getPersonData(){
                $.ajax(
    			{
        			url: "Person_Ajax.php?action=list", 
        			success: function(result){
                        $("#persons__table tbody").html(result);
                    }
            	}
            );
        }
        function deletePerson(id){
                $.confirm({
                title:'',
                content: '' + `
                        <div class="text-center p-2">
                                <p>Do you sure want to delete?</p>
                        </div>
                        `,
                        buttons: {
                                confirm: function () {
                                        //confirm -> do something
                                        let obj = {id,action:"delete"};
                                        $.ajax(
                                                {
                                                        url:"Person_Ajax.php",
                                                        method:"POST",
                                                        data:obj,
                                                        success:function (result){
                                                                    //show mess -> delete success
                                                                   $(".persons-message").html(result);                     
                                                                   //load data again
                                                                   getPersonData();
                                                                   //clear mess after
                                                                   setTimeout(() => {
                                                                        $(".persons-message").html("");
                                                                   }, 3000);
                                                        }
                                                }
                                        )       
                                          $.alert('Confirmed!');
                                },
                                cancel: function () {console.log("cancel")},//cancel -> do nothing
                        }
                });
        }

        //
        let pageRent = 1;
        let pageRentSize = 5;
        let pageRentStartFrom = (pageRent - 1)*pageRentSize;
        const inputDateStart = document.querySelector("#filter_date-rentStart");
        const inputDateEnd = document.querySelector("#filter_date-rentEnd");

        let inputDateStartValue = inputDateStart.value;
        let inputDateEndValue = null;
        inputDateStart.addEventListener('change',(e)=>{
                inputDateStartValue = e.target.value;
                getListRentBook();
                console.log(inputDateStartValue);
        });
        inputDateEnd.addEventListener('change',(e)=>{
                inputDateEndValue = e.target.value;
                getListRentBook();
                console.log(inputDateEndValue);
        });
        function goToPageRentBook(number){
                pageRent = number;
                pageRentStartFrom = (pageRent - 1)*pageRentSize;
                getListRentBook();
        }
        getListRentBook();
        function getListRentBook(){
                generatePaginationRentBook();
                $.ajax({
                        url:`RentBookAjax.php`,
                        method:'POST',
                        data:{
                                action:{
                                        name:"rentbook",
                                        dataSend:{page:pageRentStartFrom,pageSize:pageRentSize,dateStart:inputDateStartValue,dateEnd: inputDateEndValue}
                                }
                        },
                        success:(result)=>{
                                $("#rentbooks__table tbody").html(result);
                        },
                })
        }
        generatePaginationRentBook();
        function generatePaginationRentBook(){
                $.ajax({
                        url:`RentBookAjax.php`,
                        method:'POST',
                        data:{
                                action:{
                                        name:"pagin",
                                        dataSend:{page:pageRentStartFrom,pageSize:pageRentSize,dateStart:inputDateStartValue,dateEnd: inputDateEndValue}
                                }
                        },
                        success:(result)=>{
                                $("#rentbook_pagination").html(result);
                        }
                })
        }
        // modal
        function fillContentMode(id){
                // const containerContent = document.getElementById('staticBackdrop');
                // containerContent.querySelector(".modal-body").innerHTML = mess;
                $.ajax({
                        url:'RentBookDetailAjax.php?action=detail',
                        data:{idBook:id},
                        success:(result)=>{
                                $("#staticBackdrop .modal-body .modal_table-body").html(result);
                        }
                })
         
        }
        //
        function showMessActions(){
                const mesContainer = document.createElement('div');
                let status1 = true;
                let mess = 'hello word';
                let classes = status1 ? 'mes_container success' : 'mes_container error';
                mesContainer.className = `${classes}`;
                mesContainer.innerHTML = `
                        <p>${mess}</p>         
                `;
                document.body.appendChild(mesContainer);
                setTimeout(()=>{
                        mesContainer.style.right = "-100%";
                        mesContainer.innerHTML="";
                },3000);
        }
</script>
</body>
</html>