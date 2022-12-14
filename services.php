<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="./css/service_css.css">
</head>
<body>
     <div class="service_display">
    <div class="s_img">
     <img src="./images/backgroundservice.jpg">
    </div>
    <div class="service_id">
        <a href="index.html"> Home </a> > <a href="services.html">Service</a><br>
        <div class="iconclass">
            <img src="./images/laundryicon.png">
            <p>Dry Cleaning and Laundry Services</p>
        </div>
        
        <p style="font-size:40px; font-weight: bold; color: #00a8ffd1;">Our Services</p>
    </div>
    <div class="group">
        <div class="s_card">
            <img src="./images/dry clean.jpg">
            <p>Dry Clean (per item)<br>
                <span style="font-size: 15px; color: black; font-weight: lighter;"> 
                    Kwik Wash laundry service offers best in class dry cleaning service retaining the freshness of your fabric.
            </span>
          </p>
          </div>
          <div class="s_card">
              <img src="./images/washnfold.jpeg">
              <p>Wash and fold (per item)<br>
                <span style="font-size: 15px; color: black; font-weight: lighter;"> 
                    Kwik Wash laundry service uses Imported Machines and Eco Friendly detergents to take care of your fabric.
            </span>
            </p>
            </div>
            <div class="s_card">
                <img src="./images/ironing1.jpg">
                <p>Ironing (per item)<br>
                    <span style="font-size: 15px; color: black; font-weight: lighter;"> 
                        Kwik Wash laundry service curves your fabric with Steam Iron to ensure no more wrinkles upon them.
                </span>
              </p>
              </div>
             
                <div class="s_card">
                    <img src="./images/delivery.jpg" >
                    <p>Pick-up and Delivery <br>
                        <span style="font-size: 15px; color: black; font-weight: lighter;"> 
                            Kwik Wash laundry service will pickup and deliver laundry at your convenient place and time.
                    </span>
                  </p>
                  </div>
              
    </div>
    </div>

  <section id="servicesection" style=" height: 45vh; background: white;">
    <div class="pricing-details">
        
        <div class="price-heading">
            <p>Kwik Wash Laundry :<span style="color:gold ;"> Pricing Details </span></p>
            <div class="underline"></div>
        </div>
        <div class="prices-div">
            <div class="prices">
                <div class="prices-digit">
                    <?php
                    $psql="SELECT * from price_tb";
                    $data=mysqli_query($conn,$psql);
                    while($row=mysqli_fetch_assoc($data)){
                    ?>
                    <p><?php echo $row['top_wear'] ?></p>
                </div>
                <div class="prices-text">
                    <p>Top Wear Clothes</p>
                </div>
            </div>

            <div class="prices">
                <div class="prices-digit">
                    <p><?php echo $row['bottom_wear'] ?></p>
                </div>
                <div class="prices-text">
                    <p>Bottom Wear Clothes</p>
                </div>
                
            </div>

            <div class="prices">
                <div class="prices-digit">
                    <p><?php echo $row['woollen_wear'] ?></p>
                </div>
                <div class="prices-text">
                    <p>Woollen Wear Clothes</p>
                </div>
            </div>

            <div class="prices">
                <div class="prices-digit">
                    <p><?php echo $row['other_wear'] ?></p>
                </div>
                <div class="prices-text">
                    <p>Other Type Clothes</p>
                </div>
            </div>
            <?php
                    }
            ?>

        </div>
    </div>
</section>

<section id="allrightssection" style=" height: 6vh; background: rgb(67, 66, 66); " >
    <div class="rights-text">
        <p>&copy;2022 Kwik Wash Laundry Service All Rights Reserved.T&C</p>
    </div>

</section>

</body>
</html>