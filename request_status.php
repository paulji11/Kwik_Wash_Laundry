<?php
session_start();
include 'connection.php';


if(!isset($_SESSION['loggedin'])){
    header("location:adminlogin.php");
    
}


$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$name=$fname." ".$lname;

$newsqlcount="select count(*) as newcount from laundry_request where status='New Request'";
$newresult_count=mysqli_query($conn,$newsqlcount);
$newdata=mysqli_fetch_assoc($newresult_count);

$acceptsqlcount="select count(*) as acceptcount from laundry_request where status='Accepted'";
$acceptresult_count=mysqli_query($conn,$acceptsqlcount);
$acceptdata=mysqli_fetch_assoc($acceptresult_count);

$processsqlcount="select count(*) as processcount from laundry_request where status='Processing'";
$processresult_count=mysqli_query($conn,$processsqlcount);
$processdata=mysqli_fetch_assoc($processresult_count);

$completedsqlcount="select count(*) as completedcount from laundry_request where status='Completed'";
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
    <link rel="stylesheet" href="./css/status.css">
    <script>
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }

       window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
             var dropdowns = document.getElementsByClassName("dropdown-content");
             var i;
             for (i = 0; i < dropdowns.length; i++) {
                 var openDropdown = dropdowns[i];
                 if (openDropdown.classList.contains('show')) {
                     openDropdown.classList.remove('show');
                   }
               }
           }
       }
    </script>
</head>
<body>
<header>
        <div class="logo-img">
            <a href="index.php"><img src="./images/logo.png"></a>
        </div>
        <div class="logo-profile">
            <div class="profile-icon">
                <a href="1234"><img src="./images/user.png"></a>
                <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn" ><?php echo $name ;?></button>
                <div id="myDropdown" class="dropdown-content">
                     <a href="edit.php">Edit Profile</a>
                    <a href="ad_signout.php">Sign Out</a>
                    
                      </div>
                   </div>
            </div>
            
        </div>
    </header>

    <aside>
    <div class="dash">
            <div class="dashhead">
                <h3>Dashboard</h3>
            </div>
            
                <a href="user-manage.php">User Management</a>
            
            
                <a href="request_status.php"  style="background-color:white; color:rgb(6, 208, 244);">Request Status</a>
            
                <a href="price_manage.php">Price Management</a>
            
                <a href="ad_report.php">Feedbacks / Complaints</a>
            
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
            <a href="Processing.php"> <span class="count"><?php if($processdata['processcount']){echo $processdata['processcount'];}else{ echo "0";} ?></span><br></a>
                <a href="Processing.php"><span class="count-text">Processing</span></a>
            </div>
            <div class="onebox green">
            <a href="Completed.php"><span class="count"><?php if($completeddata['completedcount']){echo $completeddata['completedcount'];}else{ echo "0";} ?></span><br></a>
            <a href="Completed.php"> <span class="count-text">Completed</span></a>
            </div>
            

        </div>

    </main>
</body>
</html>