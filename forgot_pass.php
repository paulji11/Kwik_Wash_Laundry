<?php
include 'connection.php';

$emailerror=$passworderror=NULL;
if(isset($_POST['submit']))
{
$email = $_POST['email'];
$newpassw = $_POST['newpassw'];
$confpassw =$_POST['confpassw'];

if (empty($_POST['email'])){
    $emailerror="Fill the username or email field";
    
   }
   if(empty($_POST['newpassw'])){
    $passworderror="Fill the password field";
   }
   if(empty($_POST['confpassw'])){
    $confirmerror="Fill the confirm password field";
   }
   if(!$emailerror && !$passworderror && !$confirmerror ){
    $enpassw=base64_encode($confpassw);
$sqllog= "SELECT us_id,us_fstname,us_lastname,us_password FROM user WHERE us_email = '$email'";

$result = mysqli_query($conn,$sqllog);

if(mysqli_num_rows($result) != 0){
    while($row=mysqli_fetch_assoc($result)){
        $depassw=base64_decode($row['us_password']);
        $fstname=$row['us_fstname'];
        $lstname=$row['us_lastname'];
        $us_id=$row['us_id'];
        if($newpassw == $depassw)
        {
            $passwup="update user set us_password='$enpassw' where us_email='$email'";
            $submitresult=mysqli_query($conn,$passwup);
            if($submitresult){
                header("location:./userlogin.php");
            }
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
    <title>Forgot Password</title>
    <link rel="stylesheet" href="./css/forgot_pass.css">
</head>
<body>
    <div class="card">
        <div class="signform">
            <h2>Forgot Password</h2>
        <form id="forg-form"class="logform" method="post">
            <input type="email" id="email"class="input_form" placeholder="Email-id" name="email"><br><br>
            <span style='color:red;font-size:small;'><?php if(isset($email))echo $emailerror ?><br></span>
            <input type="password" id="passw" class="input_form" placeholder=" New Password" name="newpassw"><br><br>
            <span style='color:red;font-size:small;'><?php if(isset($passw))echo $passworderror ?><br></span>
            <input type="password" id="passw" class="input_form" placeholder=" Confirm Password" name="confpassw"><br><br>
            <span style='color:red;font-size:small;'><?php if(isset($passw))echo $passworderror ?><br></span>
            <button class="form-submit-button" type="submit"   value="submit" name="submit"><H3>Submit</H3></button><br><br>
            </form>
            </div>
    </div>
</body>
</html>