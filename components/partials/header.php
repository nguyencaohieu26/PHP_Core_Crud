<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Program</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="d-flex align-items-center justify-content-between">
        <main class="bg-white m-auto d-flex main__container">
               <section class="dashboard__left border-right">
                        <div class="nav d-flex flex-column" style="height: 100%;">
                                <div class="text-center p-3 mb-2">
                                        <a href="#">
                                                <img width="30px" src="./assets/icons/home.png" alt="home_icon">
                                        </a> 
                                </div>
                                <ul class="list-unstyled nav-dashboard" style="margin-top: 3px;">
                                        <li class="py-1 px-3 position-relative active">
                                                <a class="text-decoration-none d-block" href="./">Overview</a>
                                        </li>
                                        <li class="py-1 px-3 position-relative">
                                                <a class="text-decoration-none d-block" href="CategorysView.php">Categorys</a>
                                        </li>
                                        <li class="py-1 px-3 position-relative">
                                                <a class="text-decoration-none d-block" href="BooksView.php">Books</a>
                                        </li>
                                        <li class="py-1 px-3 position-relative">
                                                <a class="text-decoration-none d-block" href="PersonsView.php">Persons</a>
                                        </li>
                                        <li class="py-1 px-3 position-relative">
                                                <a class="text-decoration-none d-block" href="RentBooksView.php">RentBook</a>
                                        </li>
                                </ul>
                                <div class="mt-auto p-3 text-center">
                                        <div style="cursor: pointer;">
                                                <img src="assets/icons/help_outline_black_24dp.svg"/>
                                        </div>
                                        <div class="mt-1" style="cursor: pointer;">
                                                <img src="assets/icons/settings_black_24dp.svg" alt="">
                                        </div>
                                </div>
                        </div>
               </section>
               <section class="dashboard__right  flex-grow-1" style="overflow-x: auto;">
                        <div class="dashboard__right-header d-flex align-items-center justify-content-between border-bottom py-3 px-4">
                                <div class="avatar d-flex align-items-center">
                                        <p class="avatar__header">My Dashboard</p>
                                </div>
                                <div class="d-flex">
                                        <div class="notifycation__icon mr-3">
                                                <img class="" src="./assets/icons/notifications_black_18dp.svg"/>
                                                <span class="position-absolute">0</span>
                                                <div>

                                                </div>
                                        </div>
                                        <div class="user__icon" style="cursor: pointer;">
                                                <img src="./assets/icons/user.svg"/>
                                                <div>Logout</div>
                                        </div>
                                </div>
                        </div>
                        <div class="dashboard__right-main px-4 py-3">