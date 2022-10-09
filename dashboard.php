<?php
session_start();
include 'connection.php';

$fstname=$_SESSION['fstname'];
$lstname=$_SESSION['lstname'];
$name=$fstname." ".$lstname;

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
    <title>user</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
        <div class="head-logo">
            <a href="index.html"><img src='./images/logo.png'></a>
         </div>
        
        <div class="logo-profile">
          <div class="userimg">
             <a href="#1234"><img src="./images/user.png"></a>
             <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn" ><?php echo $name ;?></button>
                <div id="myDropdown" class="dropdown-content">
                     <a href="#home">Edit Profile</a>
                    <a href="#about">Sign Out</a>
                    
                      </div>
                   </div>
        </div>
       
    </header>
    <aside>
        <div class="dashboard">
            <div class="dashhead">
                <h3><span>Dashboard</span></h3>
            </div>
            <div class="item"><a href="dashboard.php" style="background-color:white; color:rgb(6, 208, 244);"><span>Request Status</span></a></div>
            <div class="item"><a href="us_laundryrequest.php" ><span>Laundry Request</span></a></div>
            <div class="item"><a href="#"><span>Laundry History</span></a></div>
            <div class="item"><a href="report.php"><span>Feedback/Complaints</span></a></div>
            

            
        </div>

    </aside>

    <main>
        <div class="content">
            <div class="onebox red">
                <span class="count"><?php if($newdata['newcount']){echo $newdata['newcount'];}else{ echo "0";} ?></span><br>
                <span class="count-text">New Request</span>
            </div>
            <div class="onebox orange">
                <span class="count"><?php if($acceptdata['acceptcount']){echo $acceptdata['acceptcount'];}else{ echo "0";} ?></span><br>
                <span class="count-text">Accepted</span>
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