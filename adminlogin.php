<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <link rel="stylesheet" href="adloginstyle.css">
    
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
             <form method="post" action="ad_validate.php">
                <input type="text" name="adlogin" placeholder="Username or Email"><br>
                <input type="password" name="adpass" placeholder="Password"><br>
                <button type="submit" name="submit" value="submit">Login</button>
             </form>

            </div>
            </div>
        </div>
    </div>
    
</body>
</html>