<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Analysis</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            padding: 20px;
            background-color: <?php echo isset($_COOKIE['theme']) ? $_COOKIE['theme'] : '#121212'; ?>;
            color: <?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] === '#fff' ? '#000' : '#fff'; ?>;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            text-align: center;
        }

        header {
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        header img {
            width: 150px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .search-box {
            margin-bottom: 20px;
        }

        .search-box input {
            padding: 10px;
            width: 60%;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-box button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ff6347;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-box button:hover {
            background-color: #e55337;
        }

        .product-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            background-color: #1e1e1e;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .product-table th,
        .product-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #333;
            transition: background-color 0.3s, color 0.3s;
        }

        .product-table th {
            background-color: #333;
        }

        .product-table tbody tr:hover {
            background-color: #444;
        }

        .health-meter {
            margin-bottom: 20px;
        }

        .health-meter h2 {
            margin-bottom: 10px;
        }

        .meter {
            width: 100%;
            height: 20px;
            background-color: #333;
            border-radius: 10px;
            overflow: hidden;
        }

        .meter .bar {
            width: 50%;
            height: 100%;
            background-color: #ff6347;
            transition: width 0.5s;
        }

        .notes {
            text-align: left;
        }

        .notes h2 {
            margin-bottom: 10px;
        }

        .notes ul {
            list-style: none;
        }

        .notes li {
            padding: 10px;
            margin: 5px 0;
            background-color: #1e1e1e;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .notes li:hover {
            background-color: #333;
        }

        .theme-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Your Product</h1>
            <img src="path/to/maggi.png" alt="Maggi">
        </header>
        <div class="search-box">
            <input type="text" placeholder="Enter the product name" id="product-search">
            <button onclick="analyzeProduct()">Analyze</button>
            <button id="themeToggleBtn" class="theme-button">Toggle Theme</button>
        </div>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Calories</th>
                    <th>Carbohydrates</th>
                    <th>Fats</th>
                    <th>Proteins</th>
                    <th>Sugars</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Maggi</td>
                    <td>288</td>
                    <td>42.2</td>
                    <td>10.1</td>
                    <td>6.7</td>
                    <td>1.6</td>
                </tr>
            </tbody>
        </table>
        <div class="health-meter">
            <h2>Health Meter (based on calories)</h2>
            <div class="meter">
                <div class="bar"></div>
            </div>
        </div>
        <div class="notes">
            <h2>Note</h2>
            <ul>
                <li>Not safe for pregnant women and children</li>
                <li>Not good for digestion</li>
                <li>Heart patients should avoid</li>
                <li>Contains high fructose corn syrup which causes obesity</li>
                <li>Contains citric acid which causes abdominal issues and acidity</li>
            </ul>
        </div>
    </div>
    <script>
        // Function to toggle theme
        function toggleTheme() {
            var currentTheme = document.body.style.backgroundColor === 'rgb(18, 18, 18)' ? '#fff' : '#121212'; // Check current theme
            var newTableBgColor = currentTheme === '#fff' ? '#f0f0f0' : '#1e1e1e';
            var newTableTextColor = currentTheme === '#fff' ? '#000' : '#fff';
            var newTableBorderColor = currentTheme === '#fff' ? '#ccc' : '#333';
            var newTableHoverColor = currentTheme === '#fff' ? '#ddd' : '#444';

            document.body.style.backgroundColor = currentTheme;
            document.body.style.color = currentTheme === '#121212' ? '#fff' : '#000';

            var table = document.querySelector('.product-table');
            table.style.backgroundColor = newTableBgColor;
            table.style.color = newTableTextColor;

            var thElements = table.querySelectorAll('th');
            for (var i = 0; i < thElements.length; i++) {
                thElements[i].style.backgroundColor = newTableBorderColor;
            }

            var tdElements = table.querySelectorAll('td');
            for (var i = 0; i < tdElements.length; i++) {
                tdElements[i].style.borderBottom = '1px solid ' + newTableBorderColor;
            }

            var trElements = table.querySelectorAll('tbody tr');
            for (var i = 0; i < trElements.length; i++) {
                trElements[i].addEventListener('mouseover', function() {
                    this.style.backgroundColor = newTableHoverColor;
                });
                trElements[i].addEventListener('mouseout', function() {
                    this.style.backgroundColor = newTableBgColor;
                });
            }

            // Set theme as cookie
            document.cookie = "theme=" + currentTheme + ";path=/";
        }

        // Event listener for button click
        document.getElementById('themeToggleBtn').addEventListener('click', function() {
            toggleTheme();
        });

        // Set initial theme based on cookie when page loads
        var initialTheme = '<?php echo isset($_COOKIE['theme']) ? $_COOKIE['theme'] : '#121212'; ?>';
        document.body.style.backgroundColor = initialTheme;
        document.body.style.color = initialTheme === '#121212' ? '#fff' : '#000';

        var table = document.querySelector('.product-table');
        var initialTableBgColor = initialTheme === '#fff' ? '#f0f0f0' : '#1e1e1e';
        var initialTableTextColor = initialTheme === '#fff' ? '#000' : '#fff';
        var initialTableBorderColor = initialTheme === '#fff' ? '#ccc' : '#333';
        var initialTableHoverColor = initialTheme === '#fff' ? '#ddd' : '#444';

        table.style.backgroundColor = initialTableBgColor;
        table.style.color = initialTableTextColor;

        var thElements = table.querySelectorAll('th');
        for (var i = 0; i < thElements.length; i++) {
            thElements[i].style.backgroundColor = initialTableBorderColor;
        }

        var tdElements = table.querySelectorAll('td');
        for (var i = 0; i < tdElements.length; i++) {
            tdElements[i].style.borderBottom = '1px solid ' + initialTableBorderColor;
        }

        var trElements = table.querySelectorAll('tbody tr');
        for (var i = 0; i < trElements.length; i++) {
            trElements[i].addEventListener('mouseover', function() {
                this.style.backgroundColor = initialTableHoverColor;
            });
            trElements[i].addEventListener('mouseout', function() {
                this.style.backgroundColor = initialTableBgColor;
            });
        }
    </script>
</body>
</html>
