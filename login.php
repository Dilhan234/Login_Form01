<?php
session_start();

// Database connection
$db = new mysqli('localhost', 'root', '', 'db');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user
    $sql = "SELECT id, username, password FROM users2 WHERE username = '$username'";
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("location: welcome.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}

$db->close();
?>
