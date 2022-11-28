<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['userin'])){
    header("location:userlogin.php");
    
}
$fstname=$_SESSION['fstname'];
$lstname=$_SESSION['lstname'];
$name=$fstname." ".$lstname;
$us_id=$_SESSION['us_id'];

$newsqlcount="select count(*) as newcount from laundry_request where status='New Request'and us_id='$us_id'";
$newresult_count=mysqli_query($conn,$newsqlcount);
$newdata=mysqli_fetch_assoc($newresult_count);

$acceptsqlcount="select count(*) as acceptcount from laundry_request where status='Accepted' and us_id='$us_id'";
$acceptresult_count=mysqli_query($conn,$acceptsqlcount);
$acceptdata=mysqli_fetch_assoc($acceptresult_count);

$processsqlcount="select count(*) as processcount from laundry_request where status='Processing' and us_id='$us_id'";
$processresult_count=mysqli_query($conn,$processsqlcount);
$processdata=mysqli_fetch_assoc($processresult_count);

$completedsqlcount="select count(*) as completedcount from laundry_request where status='Completed' and us_id='$us_id'";
$completedresult_count=mysqli_query($conn,$completedsqlcount);
$completeddata=mysqli_fetch_assoc($completedresult_count);

$pricesql="SELECT * FROM price_tb WHERE price_id=1";
$priceresult=mysqli_query($conn,$pricesql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Status</title>
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
                     <a href="user_edit.php">Edit Profile</a>
                    <a href="us_signout.php">Sign Out</a>
                    
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
            <div class="item"><a href="laundry_history.php"><span>Laundry History</span></a></div>
            <div class="item"><a href="report.php"><span>Feedback / Complaints</span></a></div>
        </div>

    </aside>

    <main>
        <div class="content">
            <div class="onebox red">
            <a href="user_request.php"><span class="count"><?php if($newdata['newcount']){echo $newdata['newcount'];}else{ echo "0";} ?></span><br></a>
            <a href="user_request.php"><span class="count-text">New Request</span></a>
            </div>
            <div class="onebox orange">
            <a href="user_accept.php"><span class="count"><?php if($acceptdata['acceptcount']){echo $acceptdata['acceptcount'];}else{ echo "0";} ?></span><br></a>
            <a href="user_accept.php"> <span class="count-text">Accepted</span></a>
            </div>
            <div class="onebox yellow">
            <a href="user_process.php"><span class="count"><?php if($processdata['processcount']){echo $processdata['processcount'];}else{ echo "0";} ?></span><br></a>
            <a href="user_process.php"><span class="count-text">Processing</span></a>
            </div>
            <div class="onebox green">
            <a href="user_completed.php"><span class="count"><?php if($completeddata['completedcount']){echo $completeddata['completedcount'];}else{ echo "0";} ?></span><br></a>
            <a href="user_completed.php"><span class="count-text">Completed</span></a>
            </div>
        </div>

        <div class="table-from">
            <h2>Price Details</h2>
            <table style="border-spacing: 0px;">
                <thead>
                    <tr>
                        <th>Items</th>
                        <th>Price</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($priceresult) != 0){
                        while($row=mysqli_fetch_assoc($priceresult)){
                        echo"<tr>
                                <td>Top Wear</td>
                                <td>{$row['top_wear']}</td>
                            </tr>
                            <tr>
                                <td>Bottom Wear</td>
                                <td>{$row['bottom_wear']}</td>
                            </tr>
                            <tr>
                                <td>Woollen Wear</td>
                                <td>{$row['woollen_wear']}</td>
                            </tr>
                            <tr>
                                <td>Other Wear</td>
                                <td>{$row['other_wear']}</td>
                            </tr>";
                        }
                    
                    }
                    
                    ?>
                    
                </tbody>
                
            </table>

        </div>

    </main>

</body>
</html>