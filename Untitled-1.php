<?php
session_start();
include 'connection.php';
if(isset($_POST['submit'])){


  $usname=$_POST['name'];
  $phn=$_POST['number'];
  $address=$_POST['address'];
  $petname=$_POST['pet_name'];
  $pets=$_POST['pets'];
  $breed=$_POST['breed'];
  $sex=$_POST['sex'];
  $diet=$_POST['diet'];
  
  
  $sql = "INSERT INTO pet_sitting(name,number,address,pet_name,breed,diet) value ('$usname','$phn','$address','$petname','$breed','$diet')";
  $query=mysqli_query($conn,$sql);
if(!$query){
   echo "not";
}else{
      header("pet sitting bokked");
  }
  
  
}

?>
<html>
    <head>
        <link rel="stylesheet" href="form_style.css">
        <title>sitting-form</title>
</head>
<body>
    <div class="content">
        <div class="sideimg">
            <img src="img/form.jpg">
        </div>
    <h1>ENTER YOUR INFORMATIONS HERE </h1>
    <form class="sitting-form" action="#" method='POST'>
        <input type="text" placeholder="Enter Your Name" name="name" id="name"><BR><BR>
        <input type="text" placeholder="Enter Your Contact Number" name="number" id="number"><BR><BR>
      
        <textarea  name="address" placeholder="Enter Your Address" rows="4" cols="50" id="address"></textarea><br><br>
        <input type="text" placeholder="Enter Your Pet's Name" name="pet_name" id="pet_name"><BR><BR>
        
        
<select name="pets" id="pets">
    <option value="Select">Choose the type of your pet</option>
  <option value="dog">DOG</option>
  <option value="cat">CAT</option>
  <option value="rabbit">RABBIT</option>
  <option value="birds">BIRDS</option>
</select><br><br>
<input type="text" placeholder="Enter Pet Breed" name="breed" id="breed"><br><br>
<select name="sex" id="sex">
    <option value="Select" disabled selected>Select sex</option>
  <option value="female">F</option>
  <option value="male">M</option>
</select><br><br>
<textarea type="text" placeholder="enter yours pet's diet details " name="diet" id="diet"></textarea><br><br>
  <input type="submit" name="submit" id="submit" value="Apply">
</form>
  </div>
</body>
</html>