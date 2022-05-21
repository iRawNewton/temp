<?php

session_start();
$host = "localhost";
$user ="root";
$password ="root";
$database="cms";

try
{
    $connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["login"])) //login is from 'name=login' of login button
    {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label> All fields reqd</label>';
        }
        else
        {
            $query ="Select * from admin where username = :";
        }
    }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}

mysqli_connect($host,$user,$password);
mysql_select_db("cms");

if(isset($_POST['user'])){
    $username =$_POST['user'];
    $password=$_POST['password'];

    $sql = "SELECT * FROM admin where username = '".$username."' and password = '".$password."' limit 1";

    $result =mysql_query($sql);
    if(mysql_num_rows($result)==1){
        echo "You have successfully login";
        exit();
    }
    else {
        echo "Something went wrong";
        exit();
    }
}

?>





<!doctype html>
<html lang="en">

<head>
    <title>Login to your account</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
         :root {
            --background: #1e90ff;
            --text: #000000;
        }
        
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        
        body {
            /* background: rgb(209, 230, 230); */
            background: rgb(181, 178, 178);
        }
        
        .row {
            /* background: rgb(183, 201, 201); */
            border-radius: 30px;
            box-shadow: 12px 12px 22px rgb(65, 60, 60);
        }
        
        .row:hover {
            box-shadow: 12px 12px 22px rgb(32, 32, 32);
        }
        
        img {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        
        .btn1 {
            border: none;
            outline: none;
            height: 37px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 18px;
            letter-spacing: 1vh;
        }
        
        .btn1:hover {
            background: rgb(183, 201, 201);
            border: 1px solid;
            color: black;
        }
        
        h2 {
            font-family: 'Times New Roman', Times, serif;
            /*font-size: 28px;*/
            text-align: center;
            font-weight: bold;
        }
        
        .form-check {
            padding-top: 9px;
            text-align: right;
        }
        
        .form-check-label {
            font-size: 16px;
            font-family: garamond;
            font-weight: bold;
        }
        
        @media screen and (min-width: 992px) {
            .form-check {
                margin-right: 9vw;
            }
        }
        
        @media screen and (max-width: 991px) {
            /*h2 {
                font-size: 3vw;
            }*/
        }
        
        .form {
            /*background-color: aqua;*/
            padding-top: 1cm;
        }
    </style>
</head>

<body>
    <form name="loginFrm" action="login.php" onsubmit = "return Validation()" method="POST">

        <section class="form my-4 mx-3">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <!--<div class="login100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(300px) rotateX(0deg) rotateY(0deg);">

                    </div>-->
                        <img src="bg.jpg" class="img-fluid p-5" alt="">
                    </div>
                    <div class="col-md-7 px-5 my-auto">
                        <div class="col-md-7 mx-auto">
                            <h2><u>Admin Login</u></h2>
                        </div>

                        <form action="">
                            <div class="form-row ">
                                <div class="col-md-7 mx-auto">
                                    <input type="text" class="form-control mt-5 mb-3 p-3" placeholder="username" name="user" id="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-7 mx-auto">
                                    <input type="password" class="form-control mt-3 p-3" placeholder="password" name="pass" id="">
                                </div>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                            </div>

                            <div class="form-row">
                                <div class="col-md-7 mx-auto">
                                    <button type="submit" id="btn" value="login" name="login" class="btn1  mt-3 mb-5">Login</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- JavaScript Validation -->
    <script>
        function Validation() {
            var id = document.loginFrm.user.value;
            var pwd = document.loginFrm.pass.value;
            if (id.length == "" && pwd.length == "") {
                alert("Username and password field are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("Username is empty");
                    return false;
                }
                if (pwd.length == "") {
                    alert("Password is empty");
                    return false;
                }
            }
        }
    </script>

</body>

</html>