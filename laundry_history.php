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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry History</title>
    <link rel="stylesheet" href="./css/history.css">
  
</head>
<body>
    <header>
        <div class="head-logo">
            <img src='./images/logo.png'>
         </div>
        
        <div class="logo-profile">
          <div class="userimg">
             <a href="#1234"><img src="./images/user.png"></a>
             <a><span style="color:#0ec4e1; margin-left:6px;"><?php echo $name ;?></span></a>

            </div>
        </div>
       
    </header>
    <aside>
        <div class="dashboard">
            <div class="dashhead">
                <h3><span>Dashboard</span></h3>
            </div>
            <div class="item"><a href="dashboard.php"><span>Request Status</span></a></div>
            <div class="item" ><a  href="us_laundryrequest.php" "><span>Laundry Request</span></a>
            <div class="item"><a href="laundry_history.php" style="background-color:white; color:rgb(6, 208, 244);"><span>Laundry History</span></a></div>
            <div class="item"><a href="report.php"><span>Feedbacks / Complaints</span></a></div>
            

            
        </div>
    </div>

    </aside>

    <main>
        <div class="history">
            <table style=" width:75%;">
                <tr>
                     <th>Name</th>
                    <th>Date of Laundry</th>
                    <th>Type of Service</th>
                    <th>Number of Top</th>
                    <th>Number of Bottom</th>
                    <th>Number of Woollen</th>
                    <th>Number of Other</th>
                    <th>Status</th>
                    <th>View Detais</th>
                    
             </tr>
           <tbody>
            <?php
            $histsql="SELECT  
            laundry_request.pickupdate,
            laundry_request.top,
            laundry_request.bottom,
            laundry_request.woollen,
            laundry_request.other,
            laundry_request.service_type,
            laundry_request.request_id,
            laundry_request.status,
            bill.bill_id,
            bill.request_id,
            bill.bill_date
            FROM laundry_request
            INNER JOIN bill ON laundry_request.request_id = bill.request_id and laundry_request.us_id='$us_id'
            
            ";
            
            $data=mysqli_query($conn,$histsql);
                                    if(mysqli_num_rows($data) != 0 ){
                                    while($row=mysqli_fetch_assoc($data)){
                                        $GLOBALS['bill']=$row['bill_id'];
                                        
                                        echo "
                                        
                                <tr>
                                    <td>{$name}</td>
                                    <td>{$row['pickupdate']}</td>
                                    <td>{$row['service_type']}</td>
                                    <td>{$row['top']}</td>
                                    <td>{$row['bottom']}</td>
                                    <td>{$row['woollen']}</td>
                                    <td>{$row['other']}</td>
                                    <td>{$row['status']}</td>
                                   <td><a href=view_details.php?id=".$row['request_id']." ><button name='view'>View Details</button></a></td>
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