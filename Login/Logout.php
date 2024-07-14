<?php
 include("Logout.html");
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
       // echo "<div style='color: green; font-size: 20px; text-align: center; margin-top: 20px;'>{$user_name}, BYE.Redirecting to Login page.</div>";
        //include("Logout.html");
        header("Location:Login.html");
        session_destroy();
    }

    else
    {
       // echo "<div style='color: green;  font-size: 20px; text-align: center; margin-top: 20px;'>Incorrect input, Try again!!!</div>";
        header("Location:Logout.html");
    }
    //session_destroy();
    //echo "<div style='color: green; font-size: 20px; text-align: center; margin-top: 20px;'>{$user_name}, BYE.Redirecting to Logout page.</div>";

    //include("Logout.html");
}
    
?>
