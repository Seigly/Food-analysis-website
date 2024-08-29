<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .login-btn, .logout-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="center">
        <?php if (isset($_SESSION['username'])): ?>
            <form method="post" action="logout.php"><button class="logout-btn">Log Out</button></form>
        <?php else: ?>
            <form method="post" action="login.php"><button class="logout-btn">Log In</button></form>
        <?php endif; ?>
    </div>
</body>
</html>
