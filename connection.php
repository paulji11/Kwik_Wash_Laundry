<?php
$host="localhost";
$user="root";
$pass="";
$db="laundry_management";
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    echo "not connected";
}
else{
    //echo"connected";
}
?>