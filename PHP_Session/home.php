<?php
    session_start();// session starts
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
This is home page<br>
<form action="home.php" method="POST">
    <input type="submit" name="logout" value="logout">
</form>
</body>
</html>

<?php   
    // echo "<br>Name is : {$_SESSION["username"]}";
    // echo "<br>Password is : {$_SESSION["password"]}";

    if(isset($_POST["logout"]))
    {
        session_destroy();

        header("Location:index.php");
    }

?>