<?php
include("includes/config.php");

$un = $_GET['username'];
$cc = $_GET['code'];

$query = mysqli_query($con,"SELECT activation_code FROM users WHERE username ='$un'");
$row = mysqli_fetch_array($query);
    $dbCode = $row['activation_code'];
if($cc == $dbCode)
{
    mysqli_query($con,"UPDATE users set activation_status=1 where username='$un'");
    mysqli_query($con,"UPDATE users set activation_code=0 where username='$un'");
    echo "User verified!! Now you can login <a href='$ROOT_URL'>Here</a><br>";
}
else
{
    echo "Invalid Link!!";
}
?>