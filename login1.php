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
             window.location.href = 'prove.php';
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
                $_SESSION['email'] = $email;
                ?>
                <script>
                alert("Login successful!");
               // window.location.href = 'prove.php';
                
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Invalid password or email");
                    window.location.href = 'prove.php';
                </script>
                <?php
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}



