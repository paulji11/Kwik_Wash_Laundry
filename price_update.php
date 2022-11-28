<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['loggedin'])){
    header("location:adminlogin.php");
    
}

$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$name=$fname." ".$lname;

if(isset($_POST['submit'])){
    $top=$_POST['top'];
    $bottom=$_POST['bottom'];
    $woollen=$_POST['woollen'];
    $other=$_POST['other'];

    $sql="UPDATE price_tb 
         SET 
         top_wear='$top' ,
         bottom_wear='$bottom' ,
         woollen_wear='$woollen' ,
         other_wear='$other'
         WHERE price_id=1";

    $data=mysqli_query($conn,$sql);
    if($data){
        header("Location:price_manage.php");
    }
    else{
        echo"not updated";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Management</title>
    <link rel="stylesheet" href="./css/price_style.css">
    
</head>
<body>
    <header>
        <div class="logo-img">
            <a href="index.php"><img src="./images/logo.png"></a>
        </div>
        <div class="logo-profile">
            <div class="profile-icon">
                <a><img src="./images/user.png"></a>
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
            
                <a href="price_manage.php" style="background-color:white; color:rgb(6, 208, 244);">Price Management</a>
            
                <a href="ad_report.php">Feedbacks / Complaints</a>
            
        </div>
    </aside>
    
    <main>
        
        
        <div class="update_form">
        <h2>Update Price</h2>
         <form method="post">
            <label style="font-weight:bold;">Price of Top-Wear:</label><br>
              <input type="text" name="top" placeholder="Price of TopWear"  pattern='[0-9]{0,2}'  required ><br>
            <label style="font-weight:bold">Price of Bottom-Wear:</label><br>
              <input type="text" name="bottom" placeholder="Price of BottomWear" pattern='[0-9]{0,2}'  required><br>
            <label style="font-weight:bold">Price of Woollen-Wear:</label><br>
             <input type="text" name="woollen" placeholder="Price of WoollenWear" pattern='[0-9]{0,2}'  required><br>
            <label style="font-weight:bold">Price of Other-Wear:</label><br>
             <input type="text" name="other" placeholder="Price of OtherWear" pattern='[0-9]{0,2}'  required><br>
            
             <button type="submit" name="submit" value="submit">Submit</button>
        
         </form>
     </div>    
  
    </main>
</body>
</html>