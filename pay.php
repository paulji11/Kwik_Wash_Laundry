<?php
session_start();
include 'connection.php';

$fstname=$_SESSION['fstname'];
$lstname=$_SESSION['lstname'];
$last_id=$_SESSION['req_id'];
$bill_id=$_SESSION['bill_id'];
$name=$fstname." ".$lstname;
$us_id=$_SESSION['us_id'];
if(isset($_POST['confirm'])){
    $updatesql="UPDATE bill SET bill_status='Paid' WHERE request_id='$last_id' AND bill_id='$bill_id'";
    $submitresult=mysqli_query($conn,$updatesql);
    if($submitresult){
        header("location:confirm.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="./css/paybill.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form method="POST">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Owner</h3>
                <div class="input-field">
                    <input type="text" value="<?php echo $name;?>"  pattern="^[a-zA-Z ]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" name="ownername" id="ownername" required>
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="text" value="" pattern="[0-9]{3}" title="Should contain only 3 digits" name="cvv" id="cvv" required>
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text" value="" pattern="[0-9]{16}" title="Should contain 16 digits" name="cardno" id="cardno" required>
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Valid Upto</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months" required>
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years" required>
                        <option value="2027">2027</option>
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="./images/mc.png" alt="">
                    <img src="./images/vi.png" alt="">
                    <img src="./images/pp.png" alt="">
                </div>
            </div>    
        </div>
        <div class="control">
        <input type="submit" value="Proceed to Pay" name="confirm">
        </div>
</form>
    </div>
</body>
</html>

















