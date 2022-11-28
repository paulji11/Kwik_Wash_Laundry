<?php
session_start();
require 'connection.php';

$us_id=$_SESSION['us_id'];
// $bill_id=$_SESSION['bill_id'];
$usersql="SELECT * FROM user WHERE us_id='$us_id'";
$userres=mysqli_query($conn,$usersql);
$rowus=mysqli_fetch_assoc($userres);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice</title>
<link rel="stylesheet" href="./css/bill.css">
</head>
<body>

<div class="headname">
<h1>Kwik Wash Laundry Services</h1>
<h2>Invoice</h2>
</div>
<div class="margin">
<div class="heed">
<span>Name:<?php echo  $rowus['us_fstname'] ?>  <?php echo  $rowus['us_lastname'] ?></span><br>
<span>Email:<?php echo  $rowus['us_email'] ?></span><br>
<span>Phone:<?php echo  $rowus['us_phone'] ?></span><br>
<span>House name:<?php echo  $rowus['us_housename'] ?></span><br>
<span>City:<?php echo  $rowus['us_city'] ?></span><br>
<span>Pincode:<?php echo  $rowus['us_pincode'] ?></span><br><br>


</div><br><br>
<div class="tab">

<table>
<thead>
<tr>


<th>Clothes</th>
<th>Price</th>
<tr>
<tbody>
<?php
// $billrequest="SELECT laundry_request.request_id,
// laundry_request.pickupdate,
// laundry_request.top,
// laundry_request.bottom,
// laundry_request.woollen,
// laundry_request.other ,
// laundry_request.service_type,
// price_tb.top_wear,
// price_tb.bottom_wear,
// price_tb.woollen_wear,
// price_tb.other_wear FROM 
// laundry_request,price_tb 
// WHERE laundry_request.request_id='$last_id' AND price_tb.price_id='1'";


                            
                          
                            $id=$_GET['id'];
                                
                                    $billfetch="SELECT * FROM bill WHERE request_id='$id'";
                                    $billdetail=mysqli_query($conn,$billfetch);
                                    if($billdetail){
                                        while($row=mysqli_fetch_assoc($billdetail)){
                                            $top=$row['tot_top'];
                                            $bottom=$row['tot_bottom'];
                                            $woollen=$row['tot_woollen'];
                                            $other=$row['tot_other'];
                                            $tp=$top+$bottom+$woollen+$other;
                                            echo"<tr>
                                            
                                            <td>top</td>
                                            <td>{$top}</td>
                                            </tr>
                                            ";
                                    echo"<tr>
                                            
                                            <td>bottom</td>
                                            <td>{$bottom}</td></tr>
                                            ";
                                    echo"<tr>
                                            
                                            <td>woollen</td>
                                            <td>{$woollen}</td></tr>
                                            ";
                                    
                                    echo"<tr>
                                            
                                            <td>other</td>
                                            <td>{$other}</td></tr>
                                            ";
                                    echo"<tr ' >
                                            <divclass='left'>
                                            <td  style='text-align: right;'><b>Grand Total<b></td>
                                            </div>
                                            <td style='text-align: center;'>{$tp}</td></tr>
                                            
                                    ";
                                
                                        }
                                    }
                                   
                    ?>

</tbody>
</table></div><br><br><br><br>
</div>

</body>
</html>