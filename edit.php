<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['loggedin'])){
    header("location:adminlogin.php");
    
}


$id=$_SESSION['id'];

$fstnameerror=$lastnameerror=$emailerror=$phoneerror=$passwerror=$confirmpasswerror=NULL;

$selsql="select * from admin where ad_id='$id'";
$selres=mysqli_query($conn,$selsql);
$selrow=mysqli_fetch_assoc($selres);

if(isset($_POST['submit'])){
    $fstname=$_POST['fstname'];
    $lstname=$_POST['lstname'];
    $email=$_POST['email'];
    $phn=$_POST['phn'];
    $passw=$_POST['passw'];
    $conpassw=$_POST['conpassw'];

    $uppercase = preg_match('@[A-Z]@', $passw);
    $lowercase = preg_match('@[a-z]@', $passw);
    $digit    = preg_match('@[0-9]@', $passw);
    $specialChars = preg_match('@[^\w]@', $passw);

    if(empty($fstname)){
        $fstnameerror="Please enter the first name";
    }elseif (!preg_match("/^([a-zA-Z' ]{0,50})$/",$fstname)){
        $fstnameerror="First name must contain alphabets only";
    }


    if(empty($lstname)){
        $lastnameerror="Please enter the Last name";
    }elseif (!preg_match("/^([a-zA-Z' ]{0,50})$/",$lstname)){
        $lastnameerror="First name must contain alphabets only";
    }
    if(empty($email)){
        $emailerror="Please enter the Email";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailerror="Inavlid email format";
    }


    if(empty($phn)){
        $phoneerror="Please enter the phone number";
    }elseif(!preg_match("/^([0-9' ]{10})$/",$phn)){
        $phoneerror="It should contain 10 digits";
    }

    
    if(!$fstnameerror && !$lastnameerror && !$emailerror && !$phoneerror ){

        
        $sql="UPDATE admin 
        SET 
          ad_firstname='$fstname',
          ad_lastname='$lstname',
          ad_email='$email',
          ad_phone='$phn' 
          WHERE ad_id='$id' ";
          
        $data=mysqli_query($conn,$sql);
        if(!$data)
        {
            echo"not inserted";
        }
        if(!$uppercase || !$lowercase || !$digit || !$specialChars || strlen($passw) < 8) {
            $passwerror="Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
        }
        elseif($passw != $conpassw){
            $confirmpasswerror="Password and confirm password should be same";
        }
        if(!$passwerror &&!$confirmpasswerror){
        $enpassw=base64_encode($passw);

        $pasql="UPDATE admin 
        SET 
          
          ad_password='$enpassw'
          
          WHERE ad_id='$id' ";
          
        $padata=mysqli_query($conn,$pasql);
        if(!$padata)
        {
            echo"not inserted";
        }
        else{
            header("Location:request_status.php");
    
        }
        
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/edit.css">
</head>
<body>
    <header>
        <div class="logo-img">
            <a href="index.html"><img src="./images/logo.png"></a>
        </div>
        
    </header>
    <div class="edit">
        <div class="profile-card">
            <h2><u>ADMIN PROFILE</u></h2>
            <p><span style="font-weight:bold;font-size: 17px; margin-top: 0px;margin-bottom: 0px;">ADMIN-ID : </span><?php echo"$id";?></p> <br>
            <p><span style="font-weight:bold;font-size: 17px; margin-top: 0px;margin-bottom: 0px;">FirstName : </span><?php echo $selrow['ad_firstname'];?></p> <br>
            <p><span style="font-weight:bold;font-size: 17px; margin-top: 0px;margin-bottom: 0px;">LastName : </span><?php echo $selrow['ad_lastname'];?></p> <br>
            <p><span style="font-weight:bold;font-size: 17px; margin-top: 0px;margin-bottom: 0px;">Email-id : </span><?php echo $selrow['ad_email'];?></p> <br>
            <p><span style="font-weight:bold;font-size: 17px; margin-top: 0px;margin-bottom: 0px;">Contact-Number : </span><?php echo $selrow['ad_phone'];?></p> 
        </div>
        <div class="form-edit">
        <div class='form-div'>
        <form method="post">
            <label>FirstName :</label><br>
                <input type="text" name="fstname" id="fstname" onfocus="this.value=''" value="<?php echo $selrow['ad_firstname'];?>"><br>
                <span style='margin-left:100px; color:red;  font-size:small;'><?php if(isset($fstname))echo $fstnameerror ?><br></span>
            <label>LastName :</label><br>
                <input type="text" name="lstname" id="lstname" onfocus="this.value=''" value="<?php echo $selrow['ad_lastname'];?>"><br>
                <span style='margin-left:100px; color:red;font-size:small;'><?php if(isset($lstname))echo $lastnameerror ?><br></span>
            <label>Email :</label><br>
                <input type="text" name="email" id="email" onfocus="this.value=''" value="<?php echo $selrow['ad_email'];?>"><br>
                <span style='margin-left:100px; color:red;font-size:small;'><?php if(isset($email))echo $emailerror ?><br></span>
            <label>Phone Numer :</label><br>
                <input type="text" name="phn" id="phn" onfocus="this.value=''" value="<?php echo $selrow['ad_phone'];?>"><br>
                <span style='margin-left:100px; color:red;font-size:small;'><?php if(isset($phn))echo $phoneerror ?><br></span>
                <div class="change-btn" id="change-btn" style="display: none;">
                    <label>Password :</label><br>
                        <input type="text" name="passw" id="passw"><br>
                            <span style='color:red;font-size:small;'><?php if(isset($passw))echo $passwerror ?></span>
                    <label>Confirm Password :</label><br>
                        <input type="password" name="conpassw" id="conpassw"><br>
                            <span style='color:red;font-size:small;'><?php if(isset($conpassw))echo $confirmpasswerror ?></span><br>
                </div>
                <div class="button-cls">
                    <button  type="submit" name="submit" value="submit">Update Profile</button>
                </div>
            
        </form>
        <button onClick="myFunction()" id="ch" class="change">Change Password</button>
        </div>
    </div>
</div>
<script>
        function myFunction() {
         var x = document.getElementById("change-btn");
         var y = document.getElementById("ch");
         if (x.style.display === "none") {
          x.style.display = "block";
          y.style.display = "none";
        } 
        else {
         x.style.display = "none";
         }
        }
</script>
</body>
</html>