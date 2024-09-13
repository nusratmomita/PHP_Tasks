<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }
        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            width: 100%;
            padding: 0.75rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .min-vh-100 {
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST['Login'])){
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            require_once "../db/db_connection.php";

            $sql = "select * from appusers where Username = '$username'";
            $res = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($res,MYSQLI_ASSOC);// ??

            if($user){
                if($password === $user['Password']){
                    session_start();
                    $_SESSION['user'] = "yes";
                    header('Location: ../BMI/BMICalculator.php');
                    #header('Location: BMI/bmi.calculator.php');
                    exit();
                }
                else{
                    echo "<div class='alert alert-danegr'>Password doesn't match</div>";
                }
            }
            else{
                echo "<div class='alert alert-danegr'>Username doesn't match</div>";
            }
        }
        ?>
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <h3>To use the BMI calculator, please Login!</h3>
                <form action="Login.php" method="POST" class="form-container">
                    <div class="form-group mb-3">
                        <input type="text" name="Username" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="Password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="Login" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
