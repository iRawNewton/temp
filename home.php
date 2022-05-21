<?php

// session_start();
// $username=$_SESSION['name'];

// if(!$username){
//     header("Location:index.html");
// }

// if (isset($_POST['logout']))
// {
//     echo "<script>alert('Record deleted');</script>";
//     unset($_SESSION["name"]);
//     header("Location:index.html");
//     die;
// }


?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>Welcome to admin panel</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body {
                /*background: url(homebodybg.jpg);*/
                background-size: cover;
                height: 100vh;
                background-position: center;
                background-color: black;
            }
            /* navigation body*/
            
            .navbar {
                padding-top: 10px;
                padding-bottom: 10px;
            }
            /*cms styling*/
            
            .navbar-brand {
                /*word-spacing: 0.2cm;*/
                letter-spacing: 2px;
                font-family: Georgia, 'Times New Roman', Times, serif;
                font-size: 20px;
            }
            /*menu option*/
            
            .collapse {
                font-family: Georgia, 'Times New Roman', Times, serif;
                font-size: 20px;
                word-spacing: 20px;
            }
            
            .nav-link {
                padding-inline-start: 5cm;
                /*background-color: black;*/
                margin-left: 0.2cm;
                margin-right: 0.2cm;
            }
        </style>
    </head>

    <body style="background-image: url('img/background.jpeg'); background-position: center;">
    <form name="home" id="homeID" method="POST">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="#">College Management System</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportContent">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class=" collapse navbar-collapse" id="navbarSupportContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Student.php">Students</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Faculty.php">Faculty</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="department.php">Department</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" name="logout" href="index.html">Logout</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Services</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">contacts</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Dublicate</a>
                    </div>
                </li> -->
                    <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Heeelo</a>
                </li> -->

                </ul>
            </div>
        </nav>

        <!--<section class="form my-4 mx-3">
        <img src="homebodybg.jpg" class="img-fluid" alt="Image">
        <div class="container-fluid"> <img src="homebodybg.jpg" class="img-fluid" alt="Image"> </div> 
    </section>-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>