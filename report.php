<?php
session_start();
include 'connection.php';

$fstname=$_SESSION['fstname'];
$lstname=$_SESSION['lstname'];
$name=$fstname." ".$lstname;
$user_id=$_SESSION['us_id'];

if(isset($_POST['reportsubmit'])){
    $report=$_POST['report'];
    if(!empty($report)){
    $sqlreport="insert into report(report,us_id) values ('$report','$user_id')";
	 $result=mysqli_query($conn,$sqlreport);
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
    <title>user</title>
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
   <div class="repmain">
    <form class="report-form" method="post">
    <label class="report-label">report or feedback:</label><textarea name="report" rows="10" cols="50" id="report" placeholder="Desribe your feedback:"></textarea><br><br>
    <button class='report-form-submit-button'type='submit' value='submit' name='reportsubmit'><H3>Submit</H3></button><br><br>

    </form>
</div>

</main>

</body>
</html>