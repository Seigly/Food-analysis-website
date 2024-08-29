<?php
include 'config1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['cpass'];

    // Check if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        ?>
        <script>
             alert("Invalid email format.");
             window.location.href = 'prove.php';
             </script>
        <?php
    // Check if passwords match
    } elseif ($password !== $confirm_password) {
        ?>
          <script>
               alert("Passwords doesn't match.");
               window.location.href = 'prove.php';
               </script>
          <?php
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM data WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            ?>
          <script>
               alert("Email already exixts.");
               window.location.href = 'prove.php';
               </script>
          <?php
        } else {
            // Hash the password
            $hashed_password = md5($password);

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO data (email, pass) VALUES (:email, :password)");

            // Bind parameters
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            // Execute the statement and handle errors
            try {
                $stmt->execute();
                ?>
          <script>
               alert("registration succesful");
               window.location.href = 'prove.php';
               </script>
          <?php
            } catch (PDOException $e) {
                
                ?>
          <script>
               alert("Error: " + $e->getMessage());
               window.location.href = 'prove.php';
               </script>
          <?php
            }
        }
    }
}