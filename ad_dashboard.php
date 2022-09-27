<?php
session_start();
include 'connection.php';

$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$name=$fname." ".$lname;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/ad_dash.css">
</head>
<body>
    <header>
        <div class="logo-img">
            <img src="./images/logo.png">
        </div>
        <div class="logo-profile">
            <div class="profile-icon">
                <a href="1234"><img src="./images/user.png"></a>
                <a href="5678"><span style="color:#0ec4e1;"><?php echo $name ;?></span></a>
            </div>
            
        </div>
    </header>

    <aside>
        <div class="dash">
            <div class="dashhead">
                <h3>Dashboard</h3>
            </div>
            <div class="dash-content">
                <a href="user-manage.php">User Management</a><br>
            </div>
            <div class="dash-content">
                <a>Request Status</a><br>
            </div>
            <div class="dash-content">
                <a>Price Managemant</a><br>
            </div>
            <div class="dash-content">
                <a>Feedbacks or Complaints</a><br>
            </div>
        </div>
    </aside>

</body>
</html>