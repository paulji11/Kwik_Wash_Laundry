<?php
session_start();
include 'connection.php';

if(isset($_POST['submit']))
{
$email = $_POST['email'];
$passw = $_POST['passw'];

$sqllog= "SELECT us_fstname,us_lastname,us_password FROM tb_user WHERE us_email = '$email'";

$result = mysqli_query($conn,$sqllog);

if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        $depassw=base64_decode($row['us_password']);
        $fstname=$row['us_fstname'];
        $lstname=$row['us_lastname'];
        if($passw == $depassw)
        {
          header("Location:http://localhost/Kwik_Wash_Laundry/dashboard.php");
        }
        else
        {
          echo"<script>
               alert('No User Found ! ');
                window.location = 'http://localhost/Kwik_Wash_Laundry/userlogin.php';
                </script>";
        }
    }
 }
 $_SESSION['fstname']=$fstname;
 $_SESSION['lstname']=$lstname;

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body class="container">
    <div class="logo">
    <img src="./images/logo.png">
        
    </div>
    <div class="inside">
        <div class="sideleft">
            <div class="center">
                <span class="head">SORTING OUT LIFE<br>ONE LOAD AT TIME</span><br>
                <span class="subhead">WELCOME</span>
    
            </div>

            
        </div>
        <div class="sideright">
            <div class="signform">
               <h2>Login</h2>
               <form id="signup"class="logform" method="post">
                  <input type="email" class="input_form" placeholder="email-id" name="email" required><br><br>
                  <input type="password" class="input_form" placeholder="password" name="passw" required><br><br>
                  <button class="form-submit-button" type="submit"   value="submit" name="submit"><H3>SIGNUP</H3></button><br><br>
                  <span>Don't have an account? </span><a href="./usersignup.php" style="color: #1739aa; text-decoration: none;">Register</a>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>