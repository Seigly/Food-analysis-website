<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
</body>
</html>
<?php
// Define cookie names and values
$name = "username";
$name_value = "sri";
$age = "userage";
$age_value = 20;

// Set cookies with meaningful names and future expiration
setcookie($name, $name_value, time() + 3600, "/"); // Expires in 1 hour
setcookie($age, $age_value, time() + 3600, "/"); // Expires in 1 hour

// Check if the specific cookies are set and display them
if (isset($_COOKIE[$name]) && isset($_COOKIE[$age])) {
    echo $_COOKIE[$name];
    echo $_COOKIE[$age];
} else {
    echo "Cookies are not set.";
}

$choco='chocolate';
$chocname='kitkat';
setcookie($choco,$chocname,time()+3600,"/");
echo $_COOKIE[$choco];

