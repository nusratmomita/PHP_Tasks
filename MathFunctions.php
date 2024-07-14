<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="MathFunctions.php" method="POST">

        <label>X: </label>
        <input type="text" name="x">
        <br>
        <label>Y: </label>
        <input type="text" name="y">
        <br>
        <label>Z: </label>
        <input type="text" name="z">

        <br> <input type="submit" value="total">
       
    </form>
</body>
</html>

<?php
    $x = (int)$_POST["x"];
    $y = (int)$_POST["y"];
    $z = (int)$_POST["z"];

    $total = null;

    // $total = abs($x);
    // $total = round($x);
    // $total = floor($x);
    // $total = ceil($x);

    // $power = null;
    // $power = pow($x,$y);

    // $square = sqrt($y);

    // $total = min($x,$y,$z);

    // pi(),max(),rand(1,100)


    // $total = pi()*$x*$y*$z;
    // $total = round($total,2);

    echo $total;
?>