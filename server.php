<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
        Username : <br>
        <input type="text" name="username">
        <br>
</form>
</body>
</html>

<?php
    // foreach($_SERVER as $key => $value)
    // {
    //     echo "$key = $value";
    // }
?>