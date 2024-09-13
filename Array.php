<?php
    $food = array('Apple',"Orange","Banana");

    array_push($food,"Pineapple" , "kiwi");
    //($food);
    
    foreach($food as $i)
    {
        echo $i."<br>";
    }

    echo count($food)."<br>";

?>