<?php
session_start();
#echo"Bye";
session_destroy();
header('Location:../RealAuth/Login.php');
?>