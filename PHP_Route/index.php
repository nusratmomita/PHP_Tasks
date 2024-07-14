<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>This is the home page</h3>
</body>
</html>

<?php
 //   include("header.html");
    include("footer.html");

    // COOKIE
    setcookie("fav_food","pizza",time() - 0,"/");
    setcookie("fav_drink","coffee",time() + (86400),"/");
    setcookie("fav_passtime","passtime",time() + (86400*20),"/");

    // showing the values of cookies
    // foreach($_COOKIE as $key => $value)
    // {
    //     echo "<br>{$key} => {$value}";
    // }

    // accessing a pecific cookie
    if(isset($_COOKIE["fav_food"]))
    {
        echo "<br>Buy me a {$_COOKIE["fav_food"]}";
    }

    else
    {
        echo "Not entered!";
    }
?>