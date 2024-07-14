<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Example1.php" method="POST">
        <label>Quantity : </label><br>
        <br>
        <input type="text" name="quantity">
        <input type="submit" value="total">
    </form>
</body>
</html>

<?php
    $food = "pizza";
    $price = 3.00;
    $quantity = (int)$_POST["quantity"]; // $_POST is more like user input type

    $total = null;
    $total = $price * $quantity;

    echo "You have ordered {$quantity} x {$food}s";
    echo "<br>And your total is {$total}";

?>