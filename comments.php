<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/comments.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<span></span>
    <div>
        <a href="logOut.php"><input type="submit" value="Log Out" name="stopSesion" id=""/></a>
    </div>
    <?php 

    ?>
<div class="divCommentsCont">
    <form action="comments.php" method="post">
        <div>
            <span class="spanText">Title </span><input type="text" name="title" id="txtTitle"/><br />
            <span id="errorTypeTitle" class=" noDisplay">You must insert a title.</span>
            <textarea class="comContainer" name="comments" id="com" cols="70" rows="6" placeholder= "write your comment here"></textarea>
            <span id="errorTypeComment" class="noDisplay">You didn't put a comment.</span>
            <br />
            <input disabled type="submit" name="" id="btn">
        </div>
    </form>
</div>

</body>
</html>
<?php 
include 'connection.php';

$userId =  $_SESSION["userId"];
$sql = "SELECT * FROM users where id = '$userId';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    echo $row["name"] . "<br />" . $row["score"];
    }
    if (!$row["id"]){
        header("location: login.php");
    }

if(!empty($_POST)){
    $userId =  $_SESSION["userId"];
    $title = htmlspecialchars(mysqli_real_escape_string($conn,$_POST["title"]));
    $comment = htmlspecialchars(mysqli_real_escape_string($conn,$_POST["comments"]));
    
    if(!$title) {
        echo "<div class='errorDiv'>";
        echo "<a href='comments.php'><input type='button' value='Return' /></a> <br />";
        die("You have not entered a title");
        echo "</div>";
    }

    if(!$comment) {
        echo "<div class='errorDiv'>";
        echo "<a href='comments.php'><input type='button' value='Return' /></a> <br />";
        die("You have not entered a comment");
        echo "</div>";
    }
    $sql = "INSERT INTO comments (userid, title, comment) 
                VALUES ('".$userId."', '".$title."', '".$comment."');";
    
    $conn->query($sql);
    echo $sql;
    header("location: comments.php");
}
echo "<div class='allComments'>";
$sql = "SELECT comments.userid, users.name, users.score, comments.title, comments.comment, kingdom.name AS kingdomName
        FROM comments
        INNER JOIN users ON comments.userid = users.id
        INNER JOIN kingdom ON users.kingdomid = kingdom.id
        ORDER BY comments.id DESC;";
        
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<div>";
    echo $row["name"] . " ";
    echo "Score" . " " . $row["score"];
    echo  " " . $row["title"];
    echo  " " . $row["kingdomName"];
    echo "</div>";
    echo "<p>";
    echo  $row["comment"];
    echo "</p>";
    echo "<hr />";
    echo "</div>";
}
echo "</div>";

?>

<script>
    
$(document).ready(function(){
    $("#txtTitle, #com").keyup(function(){
        if(  $("#txtTitle").val() != "" && $("#com").val() != "" ) {
            $("#btn").removeAttr("disabled");
        }else {
            $("#btn").attr("disabled", true);
        };
    });

        $("#txtTitle").keyup(function(){
        if(  $("#txtTitle").val() != "" ) {
            $("#errorTypeTitle").hide();
        }else {
            $("#errorTypeTitle").css("color", "red");
            $("#errorTypeTitle").css("fontSize", "20px");
            $("#errorTypeTitle").show();
        };
    });

        $("#com").keyup(function(){
        if($("#com").val() != "" ) {
            $("#errorTypeComment").hide();
        }else {
            $("#errorTypeComment").css("color", "red");
            $("#errorTypeComment").css("fontSize", "20px");
            $("#errorTypeComment").show();
        };
    });
});

</script>