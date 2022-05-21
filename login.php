<?php
$username = $_POST['user'];
$password = $_POST['pass'];

if(!empty($username) || !empty($password))
{
    $host = "localhost";
    $dbusername ="root";
    $dbpassword ="root";
    $dbname="cms";

    //create connection
    $cn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    
    if(mysqli_connect_error())
    {
        die( 'Connect Error ('.mysqli_connect_error().')' .mysqli_connect_error());
    }
    else
    {
    	$sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($cn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        if($count == 1)
        {
            echo "Login successfully";
        }
        else
        {
            echo "Login failed";
        }
    }
}
else{
    echo "All field are required";
    die();
}
?>