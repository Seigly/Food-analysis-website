<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Product</title>
    <link rel="stylesheet" href="file.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #121212;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background-color: #1e1e1e;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

form {
    display: flex;
    flex-direction: column;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #ffffff;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #ffffff;
}

input[type="text"], input[type="number"], input[type="file"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #333;
    border-radius: 4px;
    background-color: #333;
    color: #ffffff;
}

input[type="submit"] {
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007BFF;
    color: #ffffff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

input[type="file"] {
    padding: 3px;
}

@media (max-width: 600px) {
    .form-container {
        width: 90%;
    }

    input[type="text"], input[type="number"], input[type="file"], input[type="submit"] {
        width: 100%;
    }
}

</style>
<body>
    <div class="form-container">
        <form action="file.php" method="post" enctype="multipart/form-data">
            <h1>Upload Product</h1>
            
            <label for="productName">Product Name:</label>
            <input type="text" name="productName" id="productName" required><br><br>
            
            <label for="calories">Calories:</label>
            <input type="number" name="calories" id="calories" required><br><br>
            
            <label for="carbohydrates">Carbohydrates (g):</label>
            <input type="number" step="0.1" name="carbohydrates" id="carbohydrates" required><br><br>
            
            <label for="fats">Fats (g):</label>
            <input type="number" step="0.1" name="fats" id="fats" required><br><br>
            
            <label for="sugar">Sugar (g):</label>
            <input type="number" step="0.1" name="sugar" id="sugar" required><br><br>
            
            <label for="nutrients">Other Nutrients :</label>
            <input type="text" name="nutrients" id="nutrients" required><br><br>
            
            <label for="productImage">Product Image:</label>
            <input type="file" name="productImage" id="productImage" accept="image/*" required><br><br>
            
            <input type="submit" value="Upload Product">
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the file was uploaded without errors
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == 0) {
        // Define the allowed file types
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['productImage']['name'];
        $filetype = $_FILES['productImage']['type'];
        $filesize = $_FILES['productImage']['size'];
        
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            die("Error: Please select a valid file format.");
        }
        
        // Verify file size - 5MB maximum
        if ($filesize > 5 * 1024 * 1024) {
            die("Error: File size is larger than the allowed limit.");
        }
        
        // Verify MIME type of the file
        if (in_array($filetype, ['image/jpeg', 'image/png', 'image/gif'])) {
            // Check whether file exists before uploading it
            if (file_exists("uploads/" . $filename)) {
                echo $filename . " already exists.";
            } else {
                move_uploaded_file($_FILES['productImage']['tmp_name'], "uploads/" . $filename);
                echo "Your file was uploaded successfully.";
            }
        } else {
            die("Error: There was a problem uploading your file. Please try again.");
        }
    } else {
        die("Error: " . $_FILES['productImage']['error']);
    }

    // Process and store product information
    $productName = htmlspecialchars($_POST['productName']);
    $calories = (int)$_POST['calories'];
    $carbohydrates = (float)$_POST['carbohydrates'];
    $fats = (float)$_POST['fats'];
    $sugar = (float)$_POST['sugar'];
    $nutrients = htmlspecialchars($_POST['nutrients']);

    // Store the product information in the database
    $conn = new mysqli('localhost', 'root', '', 'products_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO products (name, calories, carbohydrates, fats, sugar, nutrients, image) VALUES ('$productName', '$calories', '$carbohydrates', '$fats', '$sugar', '$nutrients', '$filename')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    // Display the product information
    echo "<br><br>Product Name: " . $productName;
    echo "<br>Calories: " . $calories;
    echo "<br>Carbohydrates: " . $carbohydrates;
    echo "<br>Fats: " . $fats;
    echo "<br>Sugar: " . $sugar;
    echo "<br>Nutrients: " . $nutrients;
    echo "<br>Image Path: " . "uploads/" . $filename;
}
?>
