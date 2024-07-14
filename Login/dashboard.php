<?php
include('Logout.html');
session_start();

$username = "nerdy";
$password = "coffee";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['username'];
    $pass_word = $_POST['password'];

    if ($username == $user_name && $password == $pass_word) {
        $_SESSION['username'] = $username;
        echo "<div style='color: green; font-size: 20px; text-align: center; margin-top: 20px;'>{$user_name}, Welcome to the nerd world</div>";
        echo "<div style='color: red; font-size: 20px; text-align: center; margin-top: 20px;'>If you want to logout, click this link</div>";
        echo "<div style='text-align: center;'><a href='Logout.html' style='color: blue; font-size: 20px;'>Logout</a></div>";
    } else {
        echo "<div style='color: red; font-size: 20px; text-align: center; margin-top: 20px;'>Incorrect input, GO BACK!!!</div>";
    }
}
?>
