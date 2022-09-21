<?php
session_start();
include 'connection.php';

if (empty($_POST['adlogin']) || empty($_POST['adpass'])){
    echo"<script>
    alert('Fill the form to Login to the Dashboard');
   window.location = 'http://localhost/Kwik_Wash_Laundry/adminlogin.php';
    </script>";


}
else if(isset($_POST['submit'])){
    $email=$_POST['adlogin'];
    $passw=$_POST['adpass'];

    $sql = "SELECT ad_firstname,ad_lastname,ad_password FROM admin WHERE ad_email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      
      while($row = mysqli_fetch_assoc($result)) {
        $decoded = base64_decode($row['ad_password']);
        $fname=$row['ad_firstname'];
        $lname=$row['ad_lastname'];
        if($passw == $decoded)
        {     
            header("Location:http://localhost/Kwik_Wash_Laundry/ad_dashboard.php");
            } 
        else{
            echo"<script>
            alert('No Admin Found ! Incorrect username or password');
             window.location = 'http://localhost/Kwik_Wash_Laundry/adminlogin.php';
             </script>";
        }
    }
}
$_SESSION['firstname']=$fname;
$_SESSION['lastname']=$lname;
}
?>