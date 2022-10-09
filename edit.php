<?php
session_start();
include 'connection.php';

$fname=$_SESSION['firstname'];
$lname=$_SESSION['lastname'];
$email=$_SESSION['email'];
$phn=$_SESSION['phn'];
$id=$_SESSION['id'];

$passwerror=$conpasswerror=NULL;


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

    if( !$uppercase || !$lowercase || !$digit || !$specialChars || strlen($passw) < 8){
        $passwerror="Password should be at least 8 characters in length and should include :
        one upper case letter, 
        one digit,
        one special character.";
    }
    elseif($passw == $conpassw){
        $enpassw=base64_encode($passw);

        $sql="UPDATE admin 
        SET 
          ad_firstname='$fstname',
          ad_lastname='$lstname',
          ad_email='$email',
          ad_password='$enpassw',
          ad_phone='$phn' 
          WHERE ad_id='$id' ";
          
        $data=mysqli_query($conn,$sql);
        if($data){
            header("Location:ad_dashboard.php");
        }
    }
    elseif($conpassw != $passw){
        $conpasswerror="Password and confirm password should be same";
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
    <div class="form-edit">
        <form method="post">
            <label>FirstName :</label><br>
                <input type="text" name="fstname" id="fstname" value="<?php echo"$fname";?>"><br>
            <label>LastName :</label><br>
                <input type="text" name="lstname" id="lstname" value="<?php echo"$lname";?>"><br>
            <label>Email :</label><br>
                <input type="text" name="email" id="email" value="<?php echo"$email";?>"><br>
            <label>Phone Numer :</label><br>
                <input type="text" name="phn" id="phn" value="<?php echo"$phn";?>"><br>
            <label>Password :</label><br>
                <input type="text" name="passw" id="passw"><br>
                <span style='color:red;font-size:small;'><?php if(isset($passw))echo $passwerror ?><br></span>
            <label>Confirm Password :</label><br>
                <input type="password" name="conpassw" id="conpassw"><br>
                <span style='color:red;font-size:small;'><?php if(isset($conpassw))echo $conpasswerror ?><br></span>
                <div class="button-cls">
                    <button  type="submit" name="submit" value="submit">Update Profile</button>
                </div>
        </form>
    </div>


</body>
</html>