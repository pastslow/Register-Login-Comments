
<?php

include 'connection.php';
if(!empty($_POST)) {
    $name = $_POST["user"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
   $passHashed = sha1($pass . "firstWebpage");
    if(!$name) {
        die("You have not entered a name");
    }
    if (!preg_match("/^([A-Za-z0-9\.\-\_]{5,25})$/", $name)) {
        die ("Your user name is not valid");
    }
    
    if (!$email) {
        die ("Email is required");
    } 

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die ("Email is not valid");
    } 
    
    if (!preg_match("/^([A-Za-z0-9\.\-\_\@\$\#]{6,25})$/", $pass)){
        die ("Your password is not valid");
    }
    if(!$pass) {
        die("You have not entered a password");
    }
    
    //insert values into database
    $sqlw = "SELECT id from kingdom LIMIT 1;";
    $result = $conn->query($sqlw);
    $row = $result->fetch_assoc();
    $kingdomId =  $row["id"];

    $sql = "INSERT INTO users (name, email, password, score, kingdomid)
            VALUES ('".$name."', '".$email."', '".$passHashed."', 0, '".$kingdomId."');";
            echo $sql;
    $result = $conn->query($sql);

    var_dump($result);
    echo "<script type= 'text/javascript'>
            window.location = 'http://localhost/login.php'
        </script>";
    }
    
?>