<?php
session_start();
include 'connection.php';

$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$name=$fname." ".$lname;

$sql="SELECT * FROM price_tb WHERE price_id=1";
$result=mysqli_query($conn,$sql);
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
                <a>Request Status</a><br>
            </div>
            <div class="dash-content">
                <a href="price_manage.php" style="background-color:white; color:rgb(6, 208, 244);">Price Managemant</a><br>
            </div>
            <div class="dash-content">
                <a>Feedbacks or Complaints</a><br>
            </div>
        </div>
    </aside>
    
    <main>
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
                    if(mysqli_num_rows($result) != 0){
                        while($row=mysqli_fetch_assoc($result)){
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
        <div class="button">
                <a href="price_update.php">
                 <button type="submit" name="submit" value="submit" class="update_btn" >
                 Update Price</button>
                </a>
            </div>     
    </main>
</body>
</html>