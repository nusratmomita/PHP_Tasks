<?php
session_start();
if(isset($_SESSION['user'])){
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI-Calculator</title>
</head>
<body>
 <a href="../RealAuth/Logout.php" class="btn btn-warning">Logout</a>
</body>
</html>