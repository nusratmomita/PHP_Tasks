<?php
//include("database.php");
session_start(); // Start the session to access session variables

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch the current user information from the database
require 'database.php'; // Include your database connection file
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];

    // Update the user information in the database
    $sql = "UPDATE users SET username=?, password=? WHERE username=?";
    $stmt = $conn->prepare($sql);
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt->bind_param("sss", $new_username, $hashed_password, $username);

    if ($stmt->execute()) {
        // Update the session variable
        $_SESSION['username'] = $new_username;
        echo "User information updated successfully!";
    } else {
        echo "Error updating user information: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Information</title>
</head>
<body>
    <h2>Update User Information</h2>
    <form method="post" action="">
        <label for="username">New Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br>
        <label for="password">New Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
