<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['userin'])){
    header("location:userlogin.php");
    
}

$fstname=$_SESSION['fstname'];
$lstname=$_SESSION['lstname'];
$name=$fstname." ".$lstname;
$us_id=$_SESSION['us_id'];

if(isset($_POST['submit'])){

    $pickupdate=$_POST['us_dateofdrop'];
    $top=$_POST['us_top'];
    $bottom=$_POST['us_bottom'];
    $woollen=$_POST['us_woollen'];
    $other=$_POST['us_other'];
    $service=$_POST['us_service'];
    
    $sql="INSERT INTO laundry_request(pickupdate,top,bottom,woollen,other,service_type,us_id) VALUES ('$pickupdate','$top','$bottom','$woollen','$other','$service','$us_id')";
	 $result=mysqli_query($conn,$sql);

    if(!$result)
    {
        echo"not inserted";
    }
    else{
        $last_id=$conn->insert_id;
        $_SESSION['req_id']=$last_id;
        header("location:bill.php");
    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Request</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <script>
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }

       window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
             var dropdowns = document.getElementsByClassName("dropdown-content");
             var i;
             for (i = 0; i < dropdowns.length; i++) {
                 var openDropdown = dropdowns[i];
                 if (openDropdown.classList.contains('show')) {
                     openDropdown.classList.remove('show');
                   }
               }
           }
       }
    </script>  
</head>
<body>
    <header>
        <div class="head-logo">
            <img src='./images/logo.png'>
         </div>
        
        <div class="logo-profile">
          <div class="userimg">
             <a href="#user"><img src="./images/user.png"></a>
             <a><?php echo $name ;?></a>

            </div>
        </div>
       
    </header>
    <aside>
        <div class="dashboard">
            <div class="dashhead">
                <h3><span>Dashboard</span></h3>
            </div>
            <div class="item"><a href="dashboard.php"><span>Request Status</span></a></div>
            <div class="item" ><a  href="us_laundryrequest.php" style="background-color:white; color:rgb(6, 208, 244);"><span>Laundry Request</span></a>
            <div class="item"><a href="laundry_history.php"><span>Laundry History</span></a></div>
            <div class="item"><a href="report.php"><span>Feedbacks / Complaints</span></a></div>
            

            
        </div>

    </aside>

    <main>
    <div class="req-content">
    <div class="formbg">
    <div class='signform'>
    <?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
            
        <h2>Laundry Requesting</h2>
        <form class='logform' method='POST'>
            <label ><span>Pick-up date/drop date:</span></label><input type='date' class='input_form'  name='us_dateofdrop' value="<?php echo $today; ?>" min="<?php echo $today; ?>" required><br><br><br>
            <label ><span>No of Top wear:</span></label><input type='text' pattern='[0-9]{0,2}' title='number of top wear must be under 100' class='input_form'  name='us_top'  required><br><br><br>
                <label ><span>No of Bottom wear:</span></label><input type='text' pattern='[0-9]{0,2}' title='number of bottom wear must be under 100' class='input_form' name='us_bottom'  required><br><br><br>
                <label ><span>No of woolen wear:</span></label><input type='text' pattern='[0-9]{0,2}' title='number of woollen wear must be under 100' class='input_form'  name='us_woollen'  required><br><br><br>
                <label ><span>No of Other clothes:</span></label><input type='text' pattern='[0-9]{0,2}' title='number of other wear must be under 100' class='input_form'  name='us_other'  required><br><br><br>
                <label ><span>Service Type:</span></label>
                <select name="us_service" id="service" required ><br><br><br>
                    <option value="" disabled selected>Select</option>
                    <option value="Pickup service">Pickup service</option>
                    <option value="Drop service">Drop service</option>
                </select><br><br><br>
              <button class='form-submit-button'type='submit' value='submit' name='submit'><H3>Submit</H3></button><br><br>
        </form>
    </div>

</div>
</div>
    </main>

</body>
</html>