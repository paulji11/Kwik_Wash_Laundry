<?php
include 'connection.php';
session_start();

if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['passw'];
    $phn=$_POST['phn'];

    $passw=base64_encode($pass);

    $sql="INSERT INTO admin (ad_firstname,ad_lastname,ad_email,ad_password,ad_phone)
              VALUES ('$fname','$lname','$email','$passw','$phn')";
    $data=mysqli_query($conn,$sql);
    if($data){
        echo"inserted";
    }
    else{
        echo"not inserted";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" >
        <input type="text" name="fname" placeholder="enter fname"><br>
        <input type="text" name="lname" placeholder="enter lname"><br>
        <input type="text" name="email" placeholder="enter email"><br>
        <input type="password" name="passw" placeholder="enter password"><br>
        <input type="text" name="phn" placeholder="enter phn"><br>
        <button type="submit" name="submit" value="submit">Submit</button>
        </form>

</body>
</html>
