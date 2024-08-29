<?php
include 'config1.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        ?>
        <script>
             alert("Invalid email format");
             window.location.href = 'login.php';
        </script>
        <?php
    } else {
        try {
            $stmt = $conn->prepare("SELECT * FROM data WHERE email = :email AND pass = :password");
            $hashedPassword = md5($password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['username'] = $user['username']; // Assuming the column name for username is 'username'
                $_SESSION['email'] = $user['email'];
                ?>
                <script>
                alert("Login successful!");
                window.location.href = 'index.php';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Invalid password or email");
                    window.location.href = 'login.php';
                </script>
                <?php
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Log In</button>
    </form>
</body>
</html>
