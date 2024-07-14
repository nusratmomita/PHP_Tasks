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
    <form action="index.php" method="POST">
        Username : <br>
        <input type="text" name="username">
        <br>

        Password : <br>
        <input type="password" name="password">

        <input type="submit" name="login" vlaue="login">
    </form>
</body>
</html>

<?php
    // $_SESSION["username"] = "Nusrat";
    // $_SESSION["password"] = "coffee";

    // // echo "<br>Name is : {$_SESSION["username"]}";
    // // echo "<br>Password is : {$_SESSION["password"]}";

    // header("Location : home.php");

    if(isset($_POST["login"]))
    {
        if(!empty($_POST["username"] && !empty($_POST["password"])))
        {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];

            // echo $_SESSION["username"]."<br>";
            // echo $_SESSION["password"]."<br>";

            header("Location:home.php");// jumping to home page 

        }

        else{
            echo"something is missing";
        }
    }


?>