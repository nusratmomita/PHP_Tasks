<?php
    /*
     VARIABLES
     integer string boolean float
    */

    /*$user_name = "Nusrat Hussain";
    $user_age = 22;
    $student = true;
    $married = false;
    $money = 21.23;

    echo "Hello , {$user_name}";// string
    echo "<br>Age is : {$user_age}";// interger
    echo "<br>isMarried : {$married}";// boolean
    echo "<br>isStudent : {$student}";// boolean
    echo "<br>Total money is : \${$money}";// float
    
    $random = $user_age + $money;
    echo "<br>Random is : \${$random}";

    echo "<br>";
    echo "<br>";

    echo "My name is {$user_name} and I am {$user_age} years old";*/

    // Conditional statements
    // $age = 12;

    // if($age == 12)
    // {
    //     echo "<br>You are not allowed";
    // }

    // else if($age > 12)
    // {
    //     echo "He";
    // }

    // else{
    //     echo "Bye"; 
    // }

    // Logical OP , Switch case

    // LOOP -> for , while

    for($i=0;$i<5;$i++)
    {
        echo "Hello <br>";
    }

    // Password Hashing

    $pw = "coffee";

    $hashing = password_hash($pw,PASSWORD_DEFAULT);

   // echo $hashing;

   if(password_verify("coffkee",$hashing))
   {
     echo "welcome";
   }
   else{
    echo "Sorry";
   }
?>