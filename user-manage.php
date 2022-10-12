<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['loggedin'])){
    header("location:adminlogin.php");
    
}

$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$name=$fname." ".$lname;

$sql="SELECT * FROM user";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="./css/user-man.css">
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
                <a href="user-manage.php" style="background-color:white; color:rgb(6, 208, 244);">User Management</a><br>
            </div>
            <div class="dash-content">
                <a href="request_status.php">Request Status</a><br>
            </div>
            <div class="dash-content">
                <a href="price_manage.php">Price Managemant</a><br>
            </div>
            <div class="dash-content">
                <a>Feedbacks / Complaints</a><br>
            </div>
        </div>
    </aside>
    
    <main>
        <div class="table-from">
            <h2>User Details</h2>
            <table style="border-spacing: 0px; width:100vh;">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phon Number</th>
                        <th>Housename</th>
                        <th>City</th>
                        <th>Pincode</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($result) > 0){
                        while($row=mysqli_fetch_assoc($result)){
                        echo"<tr>
                                <td>{$row['us_fstname']}</td>
                                <td>{$row['us_lastname']}</td>
                                <td>{$row['us_email']}</td>
                                <td>{$row['us_phone']}</td>
                                <td>{$row['us_housename']}</td>
                                <td>{$row['us_city']}</td>
                                <td>{$row['us_pincode']}</td>";
                        }
                    
                    }
                    
                    ?>
                    
                </tbody>
                
            </table>
        </div>
    </main>
</body>
</html>