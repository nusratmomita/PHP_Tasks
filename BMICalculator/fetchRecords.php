<?php
 header('Access-Control-Allow-Origin: http://localhost:5173');
 header('Access-Control-Allow-Credentials: true');
 header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
 header('Access-Control-Allow-Headers: Content-Type, Authorization');
 header('Content-Type: application/json');



session_start();
require_once "../db/db_connection.php";
//require_once "C:/xampp/htdocs/WebDev_PHP/db/db_connection.php";


if (isset($_SESSION['BMIUserID'])) {
    $user_id = $_SESSION['BMIUserID'];

    $sql = "SELECT * FROM bmirecords WHERE BMIUserID=?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        
        $res = mysqli_stmt_get_result($stmt);
        $bmiresults = mysqli_fetch_all($res, MYSQLI_ASSOC);
        
        // Sending the results as JSON
        echo json_encode($bmiresults);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to retrieve records"]);
    }
} else {
    http_response_code(403);
    echo json_encode(["message" => "Unauthorized"]);
}
