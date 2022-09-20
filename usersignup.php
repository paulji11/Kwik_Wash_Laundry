<?php
include 'connection.php';
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
    $fstnameerror=$lastnameerror=$emailerror=$phoneerror=$housenameerror=$cityerror=$pincodeerror=$passwerror=$confirmpasswerror=NULL;
    $uppercase = preg_match('@[A-Z]@', $passw);
    $lowercase = preg_match('@[a-z]@', $passw);
    $number    = preg_match('@[0-9]@', $passw);
    $specialChars = preg_match('@[^\w]@', $passw);
    
    
    
    if(empty($fstname)){
        $fstnameerror="Please enter the first name";
    }elseif (!preg_match("/^([a-zA-Z' ]+)$/",$fstname)){
        $fstnameerror="First name must use alphabets only";
    }/*elseif (strlen($fstname)>50){
        $fstnameerror="First name should be lessthan 50 characters";
    }*/


    if(empty($lastname)){
        $lastnameerror="Please enter the Last name";
    }elseif (!preg_match("/^([a-zA-Z' ]+)$/",$lastname)){
        $lastnameerror="First name must use alphabets only";
    }

    if(empty($email)){
        $emailerror="Please enter the Email";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailerror="Inavlid email format";
    }


    if(empty($phone)){
        $phoneerror="Please enter the phone number";
    }elseif(!preg_match("/^([0-9' ]{10})$/",$phone)){
        $phoneerror="Phone number should be digits";
    }


    if(empty($housename)){
        $housenameerror="Please enter the house name";
    }elseif (!preg_match("/^([a-zA-Z' ]+)$/",$housename)){
        $housenameerror="House name should be alphabets only";
    }


    if(empty($city)){
        $cityerror="Please enter the city";
    }elseif (!preg_match("/^([a-zA-Z' ]+)$/",$city)){
        $cityerror="City name should not contain any special characters";
    }


    if(empty($pincode)){
        $pincodeerror="Please enter the pincode";
    }elseif (!preg_match("/^([0-9' ]{6})$/",$pincode)){
        $pincodeerror="invalid pincode";
    }
    


    if(empty($passw)){
        $passwerror="Please enter the password";
    }elseif(!$uppercase || !$lowercase || !$number || !$specialChars || !strlen($passw) > 8) {
        $passwerror="Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
    }

    if(empty($confirmpassw)){
        $confirmpasswerror="Please enter the confirm password";
    }elseif ($confirmpassw!=$passw){
        $confirmpasswerror="Password and confirm password should be same";
    }
    if(!$fstnameerror && !$lastnameerror && !$emailerror && !$phoneerror && !$housenameerror && !$cityerror && !$pincodeerror && !$passwerror && !$confirmpasswerror){
    $enpassw=base64_encode($passw);
    $sql="insert into tb_user(us_fstname,us_lastname,us_email,us_phone,us_housename,us_city,us_pincode,us_password) value ('$fstname','$lastname','$email','$phone','$housename','$city','$pincode','$enpassw')";
	 $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"not inserted";
    }
    else{
        header("Location:http://localhost/Kwik_Wash_Laundry/userlogin.php");

    }
}
}

?>
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
            
            <h2>Register</h2>
            <form class='logform' method='POST'>
                <input type='text' class='input_form' placeholder='First name' name='us_fstname' ><br>
                <span style='color:red;font-size:small;'><?php if(isset($fstname))echo $fstnameerror ?><br></span>
                <input type='text' class='input_form' placeholder='Last name' name='us_lastname'><br>
                <span style='color:red;font-size:small;'><?php if(isset($lastname))echo $lastnameerror ?><br></span>
                <input type='text' class='input_form' placeholder='Valid email-id' name='us_email'><br>
                <span style='color:red;font-size:small;'><?php if(isset($email))echo $emailerror ?><br></span>
                <input type='text' class='input_form' placeholder='Contact number' name='us_phone'><br>
                <span style='color:red;font-size:small;'><?php if(isset($phone))echo $phoneerror ?><br></span>
                <input type='text' class='input_form' placeholder='House name' name='us_housename' ><br>
                <span style='color:red;font-size:small;'><?php if(isset($housename))echo $housenameerror ?><br></span>
                <input type='text' class='input_form' placeholder='City' name='us_city'><br>
                <span style='color:red;font-size:small;'><?php if(isset($city))echo $cityerror ?><br></span>
                <input type='text' class='input_form' placeholder='Pincode' name='us_pincode'><br>
                <span style='color:red;font-size:small;'><?php if(isset($pincode))echo $pincodeerror ?><br></span>
                <input type='password' class='input_form' placeholder=' Create a password' name='us_password' ><br>
                <span style='color:red;font-size:small;'><?php if(isset($passw))echo $passwerror ?><br></span>
                <input type='password' class='input_form' placeholder=' Confirm  password' name='us_confirmpassword' ><br>
                <span style='color:red;font-size:small;'><?php if(isset($confirmpassw))echo $confirmpasswerror ?><br></span>
                <button class='form-submit-button'type='submit' value='Submit' name='signupbtn'><H3>SIGNUP</H3></button><br><br>
                <span>Already have an account? </span><a href='./usersignup.php' style='color: deepskyblue; text-decoration: none;'>Login</a><br><br><br>
            </form>
        </div>
    </div>
</body>
</html>

