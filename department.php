<?php


// session_start();
// $username=$_SESSION['name'];

// if(!$username){
//     header("Location:index.html");
// }



$host = "localhost";
$dbusername ="root";
$dbpassword ="root";
$dbname="cms";


//create connection
$cn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

$idInput = "";
$nameInput = "";
$dnameInput = "";

$btnname="";
$disabled = "readonly";
$showdiv="none";
$btnname="save";

if (isset($_POST['submit']))
{
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $dname = $_POST['dname'];
    $saveorUpdate = $_POST['submit'];

    if($saveorUpdate === "save")
    {
        if (!empty ($id) || !empty ($name) || !empty ($dname))
        {
            $insert = "INSERT into department values ('$id','$name','$dname')";
            $run_insert = mysqli_query($cn, $insert);
            if($run_insert === true)
            {
                echo "<script>alert('Record inserted successfully');</script>";
            }
            else
            {
            echo "<script>alert('Cannot insert dublicate values');</script>";
            }
        }
    }
    else
    {
        if (!empty ($id) || !empty ($name) || !empty ($dname))
        {
            $update = "UPDATE department SET c_name='$name',dept='$dname' where c_id='$id'";
            $run_insert = mysqli_query($cn, $update);
            if($run_insert === true)
            {
                echo "<script>alert('Record updated successfully');</script>";
            }
            else
            {
            echo "<script>alert('Cannot update dublicate values');</script>";
            }
        }
    }
    
}

if (isset($_POST['update']))
{
    $id = $_POST['update'];
    $update = "SELECT * from department where c_id = '$id'";
    $result = mysqli_query($cn, $update);
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $showdiv=true;
            $btnname="update";
            $disabled="readonly";
            $idInput = $row['c_id'];
            $nameInput = $row['c_name'];
            $dnameInput = $row['dept'];
        }
    }
    else
    {
        echo "";
    }
}

if (isset($_POST['delete']))
{
    $id = $_POST['delete'];
    $delete = "DELETE from department where c_id = '$id'";
    $run_insert = mysqli_query($cn, $delete);
}

if (isset($_POST['add']))
{
   $showdiv=true;
   $btnname="save";
   $disabled="";
}

?>








<!doctype html>
<html lang="en">

<head>
    <title>Department</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!-- All CSS start here -->
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    <style>
        /* CSS code here */
        @import url('https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap');
        
    </style>
    <style>
        /* CSS code here */
        
        .footer_color {
            background-color: #3F729B;
        }
        
        .padIN {
            padding-left: -10px;
        }
        
        .row1 {
            background: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0 10px 30px 0px rgba(0, 0, 0, 0.2);
            /* box-shadow: 12px 12px 22px rgb(65, 60, 60); */
        }
        
        .gender_row {
            border-radius: 10px;
            box-shadow: 0px 0px 0px rgb(255, 255, 255);
            color: grey;
        }
        
        .text_color {
            color: grey;
        }
        
        h2 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        
        @media screen and (max-width: 767px) {
            .row1 {
                padding: 0.5cm;
            }
        }
    </style>

</head>

<body>

    <form name="department" id="deptFORM" method="POST">
    <!-- Navigation Bar starts here -->
    <nav class="navbar navbar-expand-lg navbar-dark footer_color">
        <a class="navbar-brand" style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px" href="#">College Management System &ensp; </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <div class="collapse navbar-collapse" id="navbarNav" data-toggle="collapse" data-target=".navbar-collapse"> -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Department <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" onclick='resetform()'> Clear Form </a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="mb-0">
        <h2 class="h1-responsive font-weight-bold text-center mt-4 mb-5">Department Information</h2>
    </section>

    <section class="mb-5">
        <div class="container">
            <div class="row no-gutters mx-1 mb-4 text-center border-bottom" style="display:<?= $showdiv ?>;">
                <div class="md-form col-md-3 mx-auto">
                    <input type="text" id="id" class="form-control" name="ID" value="<?= $idInput ?>" <?= $disabled ?>>
                    <label for="id">Course ID</label>
                </div>
                <div class="md-form col-md-3 mx-auto">
                    <input type="text" id="name" class="form-control" name="name" value="<?= $nameInput ?>">
                    <label for="name">Course Name</label>
                </div>
                <div class="md-form col-md-3 mx-auto">
                    <input type="text" id="dname" class="form-control" name="dname" value="<?= $dnameInput ?>">
                    <label for="dname">Department</label>
                </div>
                <div class="md-form form-group col-md-8 mx-auto text-center">
                    <button class="btn btn-elegant w-25 mx-4" id="insertBtnID" type="submit" name="submit" style="font-family: 'STIX Two Text', serif; color:white;" value= <?= $btnname ?> ><?= $btnname ?></button>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row row1 no-gutters mx-1 mb-4">
            <div class="md-form col-md-5 mx-auto text-center">
                <table class="table" style="white-space: nowrap;">
                    <thead class="thead-dark">
                        <tr>
                            <!-- <th scope="col">Sl no.</th> -->
                            <th scope="col">Course ID</th>
                            <th scope="col">Course name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $sql = "SELECT * FROM department";
                        $result = mysqli_query($cn,$sql);
                        if($result) {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                $id = $row['c_id'];
                                $name = $row['c_name'];
                                $dept = $row['dept'];
                                echo '
                                <tr>
                                
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$name.'</td>
                                    <td>'.$dept.'</td>
                                    <td>  
                                        <button class="btn btn-elegant btn-sm" id="updateBtnID" type="submit" name="update" value="'.$id.'" style="color:white;">Update</button>
                                        <button class="btn btn-danger btn-sm" id="DeleteBtnID" type="submit" name="delete" value ="'.$id.'">Delete</button>
                                    </td>
                                 </tr>';
                            }

                        }

                    ?>
                    </tbody>
                </table>
                <div class="container mx-auto text-center">
                    <button class="btn btn-elegant w-75" id="addBtnID" type="submit" name="add" style="font-family: 'STIX Two Text', serif; color:white;"> <i class="fas fa-plus-circle"></i> &nbsp; Add</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer class="page-footer font-small footer_color" style="position:relative;bottom:0;width: 100%;">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="#"> xxxxxxxxxxxxxx</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>