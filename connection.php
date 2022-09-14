<?php
session_start();
$host="localhost";
$user="root";
$pass="";
$db="kwik_wash";
$conn=mysqli_connect($host,$user,$pass,$db);
if($conn){
    echo "not connected";
}
?>