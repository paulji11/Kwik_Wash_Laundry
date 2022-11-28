<?php
session_start();
include 'connection.php';


$emailerror=$passworderror=NULL;
if(isset($_POST['submit'])){
    $email=$_POST['adlogin'];
    $passw=$_POST['adpass'];
    
           if (empty($_POST['adlogin']) && empty($_POST['adpass'])){
          $emailerror="Fill the username or email field";
          $passworderror="Fill the password field";
         }
       else{
          $sql = "SELECT * FROM admin WHERE ad_email='$email'";
         $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) != 0) {
          
          while($row = mysqli_fetch_assoc($result)) {
            $demail=$row['ad_email'];

            $decoded = base64_decode($row['ad_password']);
            
            $fname=$row['ad_firstname'];
            $lname=$row['ad_lastname'];
            $phn=$row['ad_phone'];
            $email=$row['ad_email'];
            $id=$row['ad_id'];
            if($passw == $decoded)
                {     
                $_SESSION['loggedin'] = TRUE;    
                $_SESSION['firstname']=$fname;
                $_SESSION['lastname']=$lname;
                $_SESSION['email']=$email;
                $_SESSION['phn']=$phn;
                $_SESSION['id']=$id;
                header("Location:request_status.php");
                } 
                else{
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
    
        <link rel="stylesheet" href="./css/adloginstyle.css">
    
    <title>Admin Login</title>
</head>
<body>
    <div class="contents">
        
            <div class="logo">
            <img src="./images/logo.png">
            </div>
        <div class="inside">
            <div class="leftside">
                <img src="./images/adimg.jpeg">
            
                 <div class="center">
                    <span class="head">SORTING OUT LIFE<br>ONE LOAD AT TIME</span><br>
                    <span class="subhead">WELCOME</span>
                 </div>
            </div>
            <div class="rightside">
            <div class="form" >
                <p><span style="color: aqua;">Admin Login</span></p>
             <form method="post">
                <input type="text" name="adlogin" placeholder="Email-id"><br>
                <span style='color:red;font-size:small;'><?php if(isset($email))echo $emailerror ?><br></span>
                <input type="password" name="adpass" placeholder="Password"><br>
                <span style='color:red;font-size:small;'><?php if(isset($passw))echo $passworderror ?><br></span>
                <button type="submit" name="submit" value="submit">Login</button>
             </form><br>
             <div style="float:right; margin-right:10px;">
                    <a href="forgot_pass.php" style="text-decoration:none"><span>Forgot Password?</span></a>
                    </div><br>

            </div>
            </div>
        </div>
    </div>
    
</body>
</html>

