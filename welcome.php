<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.html");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_POST['username']; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>
