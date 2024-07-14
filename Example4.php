<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="Example4.php" method="POST">
        Username :<br>
        <br>
        <input type="text" name="username">
        <br>
        age :<br>
        <br>
        <input type="text" name="age">
        <br>
        email :<br>
        <br>
        <input type="text" name="email"><br>
        <br>
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>

<?php   
    // Sanitization(did not code)
    if(isset($_POST["login"]))// isset checks if there is a value or not
    {
        // $username = $_POST["username"];
        // echo "Hello {$username}";

        // Validate input

        $age = filter_input(INPUT_POST,"age",
                            FILTER_VALIDATE_INT );
        
        $email = filter_input(INPUT_POST,"email",
                            FILTER_VALIDATE_EMAIL );
                                    
        if(empty($email))
        {
            echo "<br>Not allowed";
        }

        else{
            echo "<br>You entered this $email age";
        }

    }
?>