<?php
include('connection.php');
if(isset($_POST['signupbtn'])){
    $fstname=$_POST['us_fstname'];
    $lastname=$_POST['us_lastname'];
    $email=$_POST['us_email'];
    $phone=$_POST['us_phone'];
    $housename=$_POST['us_housename'];
    $city=$_POST['us_city'];
    $pincode=$_POST['us_pincode'];
    $passw=$_POST['us_password'];
    $confirmpassw=$_POST['us_confirmpassword'];
    $msg = '';
    if($fstname!= NULL && $lastname!=NULL && $email!=NULL && $phone!=NULL && $housename!=NULL && $city!=NULL && $pincode!=NULL && $passw!=NULL && $confirmpassw!=NULL){
        
    }else{
        $msg = "<span style='color: white; background: red; padding: 10px;'>Please enter the details</span>";
    }

    
}
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>signup</title>
    <link rel='stylesheet' href='signstyle.css'>
</head>
<body>
    <div class='signleft'>
        <img src='./images/logo.png'>
        <h2>KWIK WASH</h2>
        <div class='centered'>
            <span class='heading'>FRESH CLOTHES<br>FRESH LIFE.</span><br>
            <span class='subheading'>WELCOME</span>

        </div>
    </div>
    <div class='signright'>
        <div class='signform'>
            $msg
            
            <h2>Register</h2>
            <form class='logform' method='POST'>
                <input type='text' class='input_form' placeholder='First name' name='us_fstname' ><br><br>
                <input type='text' class='input_form' placeholder='Last name' name='us_lastname'required><br><br>
                <input type='text' class='input_form' placeholder='Valid email-id' name='us_email'required><br><br>
                <input type='text' class='input_form' placeholder='Contact number' name='us_phone'required><br><br>
                <input type='text' class='input_form' placeholder='House name' name='us_housename' required><br><br>
                <input type='text' class='input_form' placeholder='City' name='us_city'required><br><br>
                <input type='text' class='input_form' placeholder='Pincode' name='us_pincode'required><br><br>
                <input type='password' class='input_form' placeholder=' Create a password' name='us_password' required><br><br>
                <input type='password' class='input_form' placeholder=' Confirm  password' name='us_confirmpassword' required><br><br>
                <button class='form-submit-button'type='submit' value='Submit' name='signupbtn'><H3>SIGNUP</H3></button><br><br>
                <span>Already have an account? </span><a href='./usersignup.php' style='color: deepskyblue; text-decoration: none;'>Login</a><br><br><br>
            </form>
        </div>
    </div>
</body>
</html>"

?>