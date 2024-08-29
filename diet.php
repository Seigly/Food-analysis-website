<!DOCTYPE html>
<html>
<head>
    <title>Calorie Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #111;
            border-radius: 8px;
            padding: 20px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            border: 1px solid #444;
            border-radius: 4px;
            background-color: #222;
            color: #fff;
        }
        button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            color: #fff;
            background-color: #333;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #555;
        }
        button:active {
            background-color: #777;
        }
        .error-message {
            color: #ff4c4c;
            font-weight: bold;
            text-align: center;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 5px 0;
        }
        h2, h3 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calorie Tracker</h1>
        <form action="" method="POST">
            <label for="food">Food Item:</label>
            <input type="text" id="food" name="food" required>
            <label for="calories">Calories:</label>
            <input type="number" id="calories" name="calories" required>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" name="action" value="add">Add</button>
                <button type="submit" name="action" value="clear">Clear</button>
            </div>
        </form>
        <h2>Food List:</h2>
        <ul>
            <?php
            session_start();

            // Check if the "Clear" button was pressed
            if (isset($_POST['action']) && $_POST['action'] === 'clear') {
                session_unset(); // Unset all session variables
                session_destroy(); // Destroy the session
                header('Location: ' . $_SERVER['PHP_SELF']); // Redirect to clear POST data
                exit;
            }

            // Initialize session variable if not set
            if (!isset($_SESSION['foods'])) {
                $_SESSION['foods'] = [];
            }

            // Handle form submission
            if (isset($_POST['action']) && $_POST['action'] === 'add') {
                $food = $_POST['food'];
                $calories = (int)$_POST['calories'];
                $totalCalories = 0;

                foreach ($_SESSION['foods'] as $item) {
                    $totalCalories += $item['calories'];
                }

                if ($totalCalories + $calories <= 2000) {
                    $_SESSION['foods'][] = ['name' => $food, 'calories' => $calories];
                } else {
                    echo "<div class='error-message'>You have exceeded your daily limit of 2000 calories! Stop adding more food.</div>";
                }
            }

            // Display the food list and total calories
            $totalCalories = 0;
            foreach ($_SESSION['foods'] as $food) {
                echo "<li>{$food['name']}: {$food['calories']} calories</li>";
                $totalCalories += $food['calories'];
            }
            echo "</ul>";
            echo "<h3>Total Calories: $totalCalories</h3>";

            if ($totalCalories > 2000) {
                echo "<div class='error-message'>You have exceeded your daily limit of 2000 calories! Stop adding more food.</div>";
            }
            ?>
        </div>
    </body>
</html>
