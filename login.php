<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action="" method="post">
        <div class="singUpContainer">
            <div class="textSize divWidth marginTop">
                <span>Email address:</span>
            </div>
            <div class="displayFlex alignCenter backGroundWhite divWidth">
                <img class="imgIcon" src="img/reg/email.png" alt="" />
                <input id="emailInput" class="inputField" type="text" placeholder="Your email address" name="email" id="" />
                <div class="imgDiv">
                    <img id="emailImgGood" class="imgIcon noDisplay" src="img/reg/good.png" alt="" />
                    <img id="emailImgBad" class="imgIcon noDisplay" src="img/reg/bad.png" alt="" />
                </div>
            </div>
            <div class="textSize divWidth marginTop">
                <span>Password:</span>
            </div>
            <div class="displayFlex alignCenter backGroundWhite divWidth">
                <img class="imgIcon" src="img/reg/password.png" alt="" />
                <input maxlength="25" id="passwordInput" class="inputField" type="password" placeholder="Your password" name="pass" id="" />
                <div class="imgDiv">
                    <img id="passImgGood" class="imgIcon noDisplay" src="img/reg/good.png" alt="" />
                    <img id="passImgBad" class="imgIcon noDisplay" src="img/reg/bad.png" alt="" />
                </div>
            </div>
    
                  <div class="btnContainer txtCenter">
                <input class="btn" type="submit" value="Login" name="" id="loginBtn"/>
                <br />
                <span class="textSize">Don't have an account yet?</span>
                <a href="http://localhost/index.php" class="aTag"><span class="textSpan">Sign up</span></a>
            </div>
        </div>
    </form>

</body>

</html>
<?php 

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $pass = mysqli_real_escape_string($conn,$_POST["pass"]);
    $passHashed = sha1($pass . "firstWebpage");
    
    
    $sql = "SELECT id FROM users where email = '$email' and password = '$passHashed';";
    
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    

// If result matched $myemail and $mypassword, table row must be 1 row
	// echo $sql;	
    if($count == 1) {
        if (!isset($_COOKIE[$cookieName])){
            echo "errrrrror email is not set";
        } else {
         echo "email is set";
        }
        header("location: comments.php");
        session_start();
        $_SESSION["userId"] = $row["id"];

     }else {
         echo "<div class='divErrorInfo'>";
        echo "Your Login Name or Password is invalid";
        echo "</div>";
     }
    

}

?>