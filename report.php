<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['userin'])){
    header("location:userlogin.php");
    
}

$fstname=$_SESSION['fstname'];
$lstname=$_SESSION['lstname'];
$name=$fstname." ".$lstname;
$user_id=$_SESSION['us_id'];

if(isset($_POST['repsubmit'])){
    $repdate=$_POST['repdate'];
    $report=$_POST['report'];
    if(!empty($report)){
    $sqlrep="INSERT INTO report(report_date,report_desc,us_id) VALUES ('$repdate','$report','$user_id')";
	 $result=mysqli_query($conn,$sqlrep);
     if(!$result)
    {
        echo"not inserted";
    }
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks / Complaints</title>
    <link rel="stylesheet" href="./css/report.css">  
</head>
<body>
<header>
        <div class="head-logo">
            <a href="index.html"><img src='./images/logo.png'></a>
         </div>
        
        <div class="logo-profile">
          <div class="userimg">
             <a href="#1234"><img src="./images/user.png"></a>
                <a><?php echo $name ;?></a>
        </div>
</div>
    </header>

    <aside>
        <div class="dashboard">
            <div class="dashhead">
                <h3><span>Dashboard</span></h3>
            </div>
            <div class="item"><a href="dashboard.php"><span>Request Status</span></a></div>
            <div class="item"><a href="us_laundryrequest.php" ><span>Laundry Request</span></a></div>
            <div class="item"><a href="laundry_history.php"><span>Laundry History</span></a></div>
            <div class="item"><a href="report.php"  style="background-color:white; color:rgb(6, 208, 244);"><span>Feedback / Complaints</span></a></div>
            

            
        </div>

    </aside>

    <?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>

<main>
   <div class="repmain">
    <form class="report-form" method="post">
    <label class="report-label">Feedback / Complaints:</label><br>
    <input type="date" name="repdate" placeholder="Current Date"value="<?php echo $today; ?>" min="<?php echo $today; ?>" max="<?php echo $today; ?>" required>
    <textarea name="report" rows="10" cols="50" id="report" placeholder="Desribe your feedback:" required></textarea><br><br>
    <div class="submit-btn">
    <button type='submit' value='submit' name='repsubmit'>Report Submit</button><br><br>
    </div>
    </form>
</div>

<div class="report-update">
    
        <!-- <h3 style="margin-left:10px">Report Accepted / Not </h3> -->
        <?php
        $resql="SELECT  user.us_id,
        report.report_date,
        report.report_desc,
        report.report_status
        FROM user
        INNER JOIN report ON user.us_id=report.us_id 
        WHERE report_status='Reviewed' and user.us_id='$user_id'";

        $sql=mysqli_query($conn,$resql);
        if(mysqli_num_rows($sql) != 0){
        while($rows=mysqli_fetch_assoc($sql)){

        $date = date_create(($rows['report_date'])); 
        $publishDate = date_format($date,"d-m-Y");

        echo " 
               <div class='rep-cards'>
               <div class='rep-card'
               <p>$publishDate</p>
               <p>{$rows['report_desc']}</p>
               </div>
               <div class='rep-status'>
               <p><span style='color:blue'>{$rows['report_status']}</span><p>
               </div>
               </div>
            ";
        }
        }
        ?>
        
</diV>


    </main>
</body>
</html>