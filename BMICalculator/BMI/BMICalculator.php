<?php
session_start();
if (isset($_SESSION['user'])) {
    // User is logged in
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI-Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-container {
            background-color: #f3f4f6;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group input {
            border: 1px solid #cbd5e0;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #3182ce;
            box-shadow: 0 0 5px rgba(49, 130, 206, 0.5);
        }
        button {
            padding: 10px 20px;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2b6cb0;
        }
        .error {
            color: red;
            font-size: 0.875rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
            $errors = array();

            $username = $_POST['Username'];
            $age = $_POST['Age'];
            $gender = $_POST['Gender'];
            $weight = $_POST['Weight'];
            $height = $_POST['Height'];

            // Validate form inputs
            if (empty($username) || empty($age) || empty($gender) || empty($weight) || empty($height)) {
                array_push($errors, "All fields are required!");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='error'>$error</div>";
                }
            } else {
                $heightInMeter = $height / 100;
                $bmi = $weight / ($heightInMeter * $heightInMeter);

                require_once "../db/db_connection.php";

                // if (!$conn) {
                //     die("Connection failed: " . mysqli_connect_error());
                // }

                // Insert into bmiusers table
                $sql = "insert into bmiusers (Name, Age, Gender) values (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);// prepares SQL statement for execution

                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt,"sis",$username,$age,$gender);
                    mysqli_stmt_execute($stmt);
                }
                else{
                    die("Something went wrong!");
                }

                $bmiUserId = mysqli_insert_id($conn);

                // Insert into bmirecords table
                $sql = "insert into bmirecords (BMIUserID, Height, Weight, BMI) values (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);

                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt,"iddd",$bmiUserId,$height,$weight,$bmi);
                    mysqli_stmt_execute($stmt);
                }
                else{
                    die("Something went wrong!");
                }

                $category="";
                if ($bmi < 18.5) {
                    $category = 'underweight';
                } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                    $category = 'normal weight';
                } elseif ($bmi >= 25 && $bmi < 29.9) {
                    $category = 'overweight';
                } else {
                    $category = 'obese';
                }
        
                $_SESSION['Username'] = $username;
                $_SESSION['bmi'] = $bmi;
                $_SESSION['category'] = $category;
                header('Location:../results.php');
            }
        }
        ?>
        <!-- BMI Calculation Form -->
        <form action="" method="POST" class="form-container">
            <div class="form-group mb-3">
                <input type="text" name="Username" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group mb-3">
                <input type="number" name="Age" class="form-control" placeholder="Enter your age">
            </div>
            <div class="form-group mb-3">
                <input type="text" name="Gender" class="form-control" placeholder="Enter gender">
            </div>
            <div class="form-group mb-3">
                <input type="number" step="0.1" name="Weight" class="form-control" placeholder="Enter weight (kg)">
            </div>
            <div class="form-group mb-3">
                <input type="number" step="0.1" name="Height" class="form-control" placeholder="Enter height (cm)">
            </div>
            <div class="text-center">
                <h4 class="mb-3">Click here to see your BMI!</h4>
                <button type="submit" name="Submit" class="w-full">Submit</button>
            </div>
        </form>

        <!-- Logout Form -->
        <form action="../index.php" method="POST" class="form-container">
            <div class="text-center">
                <h4 class="mb-3">Click here to logout!</h4>
                <button type="submit" name="logout" class="w-full">Logout</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
