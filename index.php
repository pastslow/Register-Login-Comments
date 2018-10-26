<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
   
    <form action="signUp.php" method="post">
    <div class="singUpContainer">
        <div class="textSize divWidth marginTop">
            <span>User name:</span>
        </div>
        <div class="displayFlex alignCenter backGroundWhite divWidth">
            <img class="imgIcon" src="img/reg/nick.png" alt="" />
            <input maxlength="25" id="userInput" class="inputField" type="text" placeholder="Your user name" name="user" id="" />
            <div class="imgDiv">
                <img id="userImgGood" class="imgIcon noDisplay" src="img/reg/good.png" alt="" />
                <img id="userImgBad" class="imgIcon noDisplay" src="img/reg/bad.png" alt="" />
            </div>
        </div>
        <div><span id="spanUserName" class="colorRed"></span></div>
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
        <div><span id="spanEmail" class="colorRed"></span></div>

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
        <div><span id="spanPassword" class="colorRed"></span></div>

        <div class="textSize divWidth marginTop">
            <span>Confirm password:</span>
        </div>
        <div class="displayFlex alignCenter backGroundWhite divWidth">
            <img class="imgIcon" src="img/reg/password.png" alt="" />
            <input maxlength="25" id="rePassInput" class="inputField" type="password" placeholder="Confirm your password" name="repassword" id="" />
            <div class="imgDiv">
                <img id="rePassImgGood" class="imgIcon noDisplay" src="img/reg/good.png" alt="" />
                <img id="rePassImgBad" class="imgIcon noDisplay" src="img/reg/bad.png" alt="" />
            </div>
        </div>
        <div class="btnContainer txtCenter">
            <input disabled class="btnSing" type="submit" value="Sign Up" name="" id="signUp"/>
        <br />
            <span class="textSize">Are you already a member?</span>
            <a href="http://localhost/login.php" class="aTag"><span class="textSpan">Login</span></a>
        </div>
    </div>
    </form>

    <script src="js/singup.js"></script>
</body>
</html>
