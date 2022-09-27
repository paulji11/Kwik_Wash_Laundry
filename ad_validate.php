<?php
session_start();
include 'connection.php';

if (empty($_POST['adlogin']) || empty($_POST['adpass'])){
    echo"<script>
    alert('Fill the form to Login to the Dashboard');
   window.location = 'adminlogin.php';
    </script>";


}
else if(isset($_POST['submit'])){
    $email=$_POST['adlogin'];
    $passw=$_POST['adpass'];

    $sql = "SELECT ad_firstname,ad_lastname,ad_password,ad_email FROM admin WHERE ad_email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      
      while($row = mysqli_fetch_assoc($result)) {
        $demail=$row['ad_email'];
        $decoded = base64_decode($row['ad_password']);
        
        $fname=$row['ad_firstname'];
        $lname=$row['ad_lastname'];
        if($passw == $decoded)
        {     
            $_SESSION['firstname']=$fname;
            $_SESSION['lastname']=$lname;
            header("Location:ad_dashboard.php");
            } 
        else if($demail!=['ad_email']){
            echo"<script>
            alert('No Admin Found ! Incorrect username or password');
             window.location = 'adminlogin.php';
             </script>";
        }
        else{
            echo"<script>
            alert('No Admin Found ! Incorrect username or password');
             window.location = 'adminlogin.php';
             </script>";
        }
    }
}

}
?>