<?php
session_start();
include 'connection.php';

$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$name=$fname." ".$lname;

$newsqlcount="select count(*) as newcount from laundry_request where status='New Request'";
$newresult_count=mysqli_query($conn,$newsqlcount);
$newdata=mysqli_fetch_assoc($newresult_count);

$acceptsqlcount="select count(*) as acceptcount from laundry_request where status='Accepted'";
$acceptresult_count=mysqli_query($conn,$acceptsqlcount);
$acceptdata=mysqli_fetch_assoc($acceptresult_count);

$processsqlcount="select count(*) as processcount from laundry_request where status='proccessing'";
$processresult_count=mysqli_query($conn,$processsqlcount);
$processdata=mysqli_fetch_assoc($processresult_count);

$completedsqlcount="select count(*) as completedcount from laundry_request where status='completed'";
$completedresult_count=mysqli_query($conn,$completedsqlcount);
$completeddata=mysqli_fetch_assoc($completedresult_count);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Status</title>
    <link rel="stylesheet" href="./css/req.css">
</head>
<body>
<header>
        <div class="logo-img">
            <a href="index.php"><img src="./images/logo.png"></a>
        </div>
        <div class="logo-profile">
            <div class="profile-icon">
                <a href="1234"><img src="./images/user.png"></a>
                
                <a><span style="color:#0ec4e1; margin-left:6px;"><?php echo $name ;?></span></a>
                
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
                <a style="background-color:white; color:rgb(6, 208, 244);">Request Status</a><br>
            </div>
            <div class="dash-content">
                <a href="price_manage.php">Price Managemant</a><br>
            </div>
            <div class="dash-content">
                <a>Feedbacks or Complaints</a><br>
            </div>
        </div>
    </aside>

    <main>
        <div class="content">
            <div class="onebox red">
               <a href="newrequest.php"> <span class="count"><?php if($newdata['newcount']){echo $newdata['newcount'];}else{ echo "0";} ?></span><br></a>
               <a href="newrequest.php"><span class="count-text">New Request</span></a>
            </div>
            <div class="onebox orange">
               <a href="accepted.php"> <span class="count"><?php if($acceptdata['acceptcount']){echo $acceptdata['acceptcount'];}else{ echo "0";} ?></span><br></a>
                <a href="accepted.php"><span class="count-text">Accepted</span></a>
            </div>
            <div class="onebox yellow">
                <span class="count"><?php if($processdata['processcount']){echo $processdata['processcount'];}else{ echo "0";} ?></span><br>
                <span class="count-text">Proccessing</span>
            </div>
            <div class="onebox green">
                <span class="count"><?php if($completeddata['completedcount']){echo $completeddata['completedcount'];}else{ echo "0";} ?></span><br>
                <span class="count-text">Completed</span>
            </div>
            

        </div>

    </main>
</body>
</html>