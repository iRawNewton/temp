<?php
include('connection.php');
$username = $_POST['user'];
$password = $_POST['pass'];

// to prevent from mysqli injection

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);

$sql = "select * from admin where username = '$username' and password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result,Mysqli_assoc);
$count = mysqli_num_rows($result);

if($count==1){
    echo "<h1><center> Login Successful </center></h1>";
}
else{
    echo "<h1><center>Login Failed. Invalid username or password</center></h1>";
}
?>