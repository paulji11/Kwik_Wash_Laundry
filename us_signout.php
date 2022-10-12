<?php
session_start();

include 'connection.php';

session_destroy();
header("Location:userlogin.php");

?>