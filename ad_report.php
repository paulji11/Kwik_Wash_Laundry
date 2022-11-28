<?php
session_start();
include 'connection.php';

$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$name=$fname." ".$lname;


$repsql="SELECT  user.us_id,
user.us_fstname,
user.us_lastname, 
report.report_id,
report.report_date,
report.report_desc
FROM user
INNER JOIN report ON user.us_id=report.us_id 
WHERE report_status='Not Reviewed' ";

$data=mysqli_query($conn,$repsql);

if(isset($_POST['upbtn'])){
    $rep_id=$_POST['rep_id'];
    $updatesql="UPDATE report 
    SET 
    report_status='Reviewed'
    WHERE report_id='$rep_id'";

    $updatedata=mysqli_query($conn,$updatesql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks / Complaints</title>
    <link rel="stylesheet" href="./css/ad_rep.css">
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
            
                <a href="user-manage.php" >User Management</a>
            
            
                <a href="request_status.php">Request Status</a>
            
                <a href="price_manage.php">Price Management</a>
            
                <a href="ad_report.php" style="background-color:white; color:rgb(6, 208, 244);" >Feedbacks / Complaints</a>
            
        </div>
    </aside>
    
    <main>
        <h2>Feedbacks / Complaints</h2>
        <div class="report_cards">

                <?php
              
                    while($row=mysqli_fetch_assoc($data)){
                        $fstname=$row['us_fstname'];
                        $lstname=$row['us_lastname'];
                        $username=$fstname." ".$lstname;
                        $date = date_create(($row['report_date'])); 
                        $publishDate = date_format($date,"d-m-Y");
                        $GLOBALS['rep_id']=$row['report_id'];

                      
                        echo "
                            <div class='report_card'>
                            <div class='report_header'>
                            <p> <span style='font-weight:bold;font-size: 17px; margin-top: 0px;margin-bottom: 0px;'>User-Id : </span>{$row['us_id']}</p><br>
                            <p><span style='font-weight:bold;font-size: 17px; margin-top: 0px;margin-bottom: 0px;'>User-Name : </span>$username</p><br> 
                            <p><span style='font-weight:bold;font-size: 17px; margin-top: 0px;margin-bottom: 0px;'>Report-Date : </span>$publishDate</p><br>
                            </div>
                            <div class='report_info'>
                             <p>{$row['report_desc']}</p>
                            </div>
                            <div class='check'>
                            <form method='post'>
                            <input type='text' name='rep_id' value='$rep_id' hidden>
                            <button name='upbtn' value='upbtn'><img src='./images/check.png' class='check-icn'></button>
                            </form>
                            </div>
                            </div>
                            ";
                        }
                    
                
                ?>
        </div>
</main>
</body>
</html>