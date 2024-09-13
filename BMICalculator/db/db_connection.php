<?php
 # PDO -> PHP data objects
 # mysql:host=$db_server -> DSN(Data source Name)
 $db_server="localhost";
 $db_user="root";
 $db_pass="";
 $db_name="bmi_php_app";

 $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

 if(!$conn){
  die("Something went wrong!");
 }
 else{
  //echo "Connected!";
 }
  // try this later
  // try{
  //   $conn = new PDO("mysql:host=$db_server;dbname=$db_name",$db_user,$db_pass);

  //   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //   //echo "connected";
  // }
  // catch(PDOException $e){
  //   echo "Connection failed";
  // }
?>