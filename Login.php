<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- <form action="Login.php" method="get"> // $_GET - not secure
        <label>User Name : </label><br>
        <input type="text" name="username"><br>

        <label>Password : </label><br>
        <input type="password" name="password"><br>

        <input type="submit" value="log in">

    </form> -->
    <br>
    <form action="GetLoginData.php" method="post">
        <label>User Name : </label><br>
        <input type="text" name="username"><br>

        <label>Password : </label><br>
        <input type="password" name="password"><br>

        <input type="submit" value="log in">

    </form>
    

</body>
</html>

<?php

    // $_GET - not secure
    // echo "{$_GETT["username"]} <br>";
    // echo "{$_GET["password"]} <br>";

    echo "{$_POST["username"]} <br>";
    echo "{$_POST["password"]} <br>";

    header('Location:GetLoginData.php');
?>