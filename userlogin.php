<?php
session_start();
include 'connection.php';

$emailerror=$passworderror=NULL;
if(isset($_POST['submit']))
{
$email = $_POST['email'];
$passw = $_POST['passw'];

if (empty($_POST['email']) && empty($_POST['passw'])){
    $emailerror="Fill the username or email field";
    $passworderror="Fill the password field";
   }
 else{

$sqllog= "SELECT us_id,us_fstname,us_lastname,us_password FROM user WHERE us_email = '$email'";

$result = mysqli_query($conn,$sqllog);

if(mysqli_num_rows($result) != 0){
    while($row=mysqli_fetch_assoc($result)){
        $depassw=base64_decode($row['us_password']);
        $fstname=$row['us_fstname'];
        $lstname=$row['us_lastname'];
        $us_id=$row['us_id'];
        if($passw == $depassw)
        {
            $_SESSION['loggedin'] = TRUE; 
            $_SESSION['fstname']=$fstname;
            $_SESSION['lstname']=$lstname;
            $_SESSION['us_id']=$us_id;
          header("Location:dashboard.php");
        }
        else
        {
            $passworderror="Incorrect Password";
        }
    }
 }
 else{
    $emailerror="Invalid Email";
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
    <title>Login</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
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
                  <input type="email" class="input_form" placeholder="email-id" name="email"><br><br>
                  <span style='color:red;font-size:small;'><?php if(isset($email))echo $emailerror ?><br></span>
                  <input type="password" class="input_form" placeholder="password" name="passw"><br><br>
                  <span style='color:red;font-size:small;'><?php if(isset($passw))echo $passworderror ?><br></span>
                  <button class="form-submit-button" type="submit"   value="submit" name="submit"><H3>Login</H3></button><br><br>
                  <span>Don't have an account? </span><a href="./usersignup.php" style="color: #1739aa; text-decoration: none;">Register</a>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>