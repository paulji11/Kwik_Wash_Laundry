<?php

session_start();
include 'connection.php';

if(!isset($_SESSION['loggedin'])){
    header("location:adminlogin.php");
    
}

$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$name=$fname." ".$lname;



$innersql="SELECT  user.us_id,
                   user.us_fstname,
                   user.us_lastname, 
                   laundry_request.pickupdate,
                   laundry_request.top,
                   laundry_request.bottom,
                   laundry_request.woollen,
                   laundry_request.other,
                   laundry_request.request_id,
                   laundry_request.status
FROM user
INNER JOIN laundry_request ON user.us_id=laundry_request.us_id 
 where laundry_request.status='Completed';";

 $data=mysqli_query($conn,$innersql);
 
if(isset($_POST['submit'])) {
   $req=$_POST['req'];
    while($rows=mysqli_fetch_assoc($data)){
        
        $updsql="UPDATE laundry_request 
        SET status='Completed' where request_id='$req'" ;
        $updata=mysqli_query($conn,$updsql);
        header("Location:Completed.php");
    }
  
   
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Request</title>
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
                <a href="request_status.php " style="background-color:white; color:rgb(6, 208, 244);">Request Status</a><br>
            </div>
            <div class="dash-content">
                <a href="price_manage.php">Price Managemant</a><br>
            </div>
            <div class="dash-content">
                <a href="ad_report.php">Feedbacks / Complaints</a><br>
            </div>
        </div>
    </aside>

    <main>
        <div class="table-req">
            <table style=" width:125vh;">
                <tr>
                    <th>User-id</th>
                    <th >Name </th>
                    <th>Requested Date</th>
                    <th>No: of Top</th>
                    <th>No: of Bottom</th>
                    <th>No: of Woollen</th>
                    <th>No: of Other Clothes</th>
                    <th>Status</th>
                </tr>
                <tbody>
                    <?php
                        if(mysqli_num_rows($data) != 0 ){
                        while($row=mysqli_fetch_assoc($data)){

                            $fstname=$row['us_fstname'];
                            $lstname=$row['us_lastname'];
                            $username=$fstname." ".$lstname;
                            $date = date_create(($row['pickupdate'])); 
                            $publishDate = date_format($date,"d-m-Y");
                            $GLOBALS['req']=$row['request_id'];
                            echo"
                            
                    <tr>
                        <td>{$row['us_id']}</td>
                        <td >$username</td>
                        <td>$publishDate</td>
                        <td>{$row['top']}</td>
                        <td>{$row['bottom']}</td>
                        <td>{$row['woollen']}</td>
                        <td>{$row['other']}</td>
                        <form method='post'>
                        <input type='text' name='req' value='$req' hidden>
                    <td><button type='submit' id='update' name='submit' value='submit' class='update-btn'>Completed</button></td>
                    </tr>
                    </form>";
                }
            }
            ?>
                </tbody>
                
            </table>
        </div>
    </main>
</body>
</html>