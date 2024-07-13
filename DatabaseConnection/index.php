<?php
 include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h2>Social Media For Nerds!!</h2>
        Username : <br>
        <input type="text" name="username"><br>
        <br>
        Password : <br>
        <input type="password" name="password"><br>
        <br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(empty($username))
    {
        echo "<br>Enter a user name!";
    }
    elseif(empty($password))
    {
        echo "<br>Enter a password!";
    }
    else
    {
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO user(username,password)
                VALUES('$username','$hash')";
        
        try{
            mysqli_query($conn,$sql);
            echo "<br>You are registered!";
        }

        catch(mysqli_sql_exception)
        {
            echo "<br>Sorry this profile is already taken!";
        }
    }
    mysqli_close($conn);
?>