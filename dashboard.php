<?php
session_start();
include 'connection.php';

$fstname=$_SESSION['fstname'];
$lstname=$_SESSION['lstname'];
$name=$fstname." ".$lstname;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  
</head>
<body>
    <header>
        <div class="head-logo">
            <img src='./images/logo.png'>
         </div>
        
        <div class="logo-profile">
          <div class="userimg">
             <a href="#1234"><img src="./images/user.png"></a>
             <a href="#"><?php
                            echo"$name";?></a>
            </div>
        </div>
       
    </header>
    <aside>
        <div class="dashboard">
            <div class="dashhead">
                <h3><span>Dashboard</span></h3>
            </div>
            <div class="item"><a href="#"><span>Request Status</span></a></div>
            <div class="item">
                <a class="subbtn" href="#"><span>Laundry Request</span></a>
            </div>
            <div class="item"><a href="#"><span>Laundry History</span></a></div>
            <div class="item"><a href="#"><span>History</span></a></div>
            

            
        </div>

    </aside>

    <main>
        <div class="content">
            <div class="onebox red">
                <span class="count">01</span><br>
                <span class="count-text">New Request</span>
            </div>
            <div class="onebox orange">
                <span class="count">05</span><br>
                <span class="count-text">Accepted</span>
            </div>
            <div class="onebox yellow">
                <span class="count">09</span><br>
                <span class="count-text">Proccessing</span>
            </div>
            <div class="onebox green">
                <span class="count">10</span><br>
                <span class="count-text">Completed</span>
            </div>
            

        </div>

    </main>

</body>
</html>