<?php
// index.php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();  
    header('Location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to BMI Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <!-- Welcome Text -->
        <h1 class="text-3xl font-bold text-blue-600 mb-8">Welcome to the BMI Calculator!</h1>

        <!-- Registration Section -->
        <div class="mb-4 p-6 bg-white shadow-lg rounded-lg max-w-sm w-full text-center">
            <h3 class="text-xl font-semibold mb-4">New to the website? Register here!</h3>
            <a href="Auth/Registration.php">
                <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg transition duration-300 hover:bg-blue-600">
                    Register
                </button>
            </a>
        </div>

        <!-- Login Section -->
        <div class="p-6 bg-white shadow-lg rounded-lg max-w-sm w-full text-center">
            <h3 class="text-xl font-semibold mb-4">Welcome back! Click here to log in:</h3>
            <a href="Auth/Login.php">
                <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg transition duration-300 hover:bg-green-600">
                    Login
                </button>
            </a>
        </div>
    </div>
</body>
</html>
