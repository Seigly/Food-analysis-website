<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to your dashboard, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h2>
    <p><a href="logout1.php">Logout</a></p>
</body>
</html>
