<?php
session_start(); // Start the session to access stored data

// Check if BMI data exists in session
if (isset($_SESSION['Username'], $_SESSION['bmi'], $_SESSION['category'])) {
    $username = $_SESSION['Username'];
    $bmi = $_SESSION['bmi'];
    $category = $_SESSION['category'];
} else {
    // Handle the case where no data is available
    echo "No BMI data available. Please calculate your BMI first.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.2rem;
            color: #4a5568;
            margin-top: 15px;
        }

        /* Additional styling for the BMI display */
        .bmi-value {
            font-size: 3rem;
            font-weight: bold;
            color: #3182ce;
            margin: 20px 0;
        }

        .category {
            color: #48bb78;
            font-weight: bold;
        }

        /* Hover effects for text */
        h1, p {
            transition: color 0.3s ease;
        }

        h1:hover, p:hover {
            color: #1a202c;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            h1 {
                font-size: 1.5rem;
            }
            .bmi-value {
                font-size: 2.5rem;
            }
            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($username) ?>'s BMI is</h1>
        <div class="bmi-value"><?= round($bmi, 1) ?></div>
        <p><?= htmlspecialchars($username) ?>, you are in the <span class="category"><?= htmlspecialchars($category) ?></span> category.</p>
    </div>
</body>
</html>
