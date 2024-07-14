<?php
 include("Login.html");
 session_start();


$username = "nerdy";
$password = "coffee";


if(isset($_POST))
{
    $user_name = $_POST['username'];
    $pass_word = $_POST['password'];

    if($username == $user_name && $password == $pass_word)
    {
        $_SESSION['$user_name'] = $username;
        echo "<div style='color: green; font-size: 20px; text-align: center; margin-top: 20px;'>{$user_name}, Welcome to the nerd world</div>";
    }

    else
    {
        echo "<div style='color: green;  font-size: 20px; text-align: center; margin-top: 20px;'>Incorrect input, GO BACK!!!</div>";
        header('Location:Login.html');
        exit();
    }
}

?>
