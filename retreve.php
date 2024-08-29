<?php
function getMeterRange($value) {
    if ($value < 20) {
        return "low";
    } elseif ($value < 50) {
        return "medium";
    } elseif ($value < 80) {
        return "high";
    } else {
        return "very-high";
    }
}


function calculatePercentage($x) {
    if ($x < 200) {
        // Extrapolate using the slope between (200, 25%) and (400, 65%)
        return 4;
    }
    if ($x >= 200 && $x <= 400) {
        return 25 + 0.2 * ($x - 200);
    } elseif ($x >= 400 && $x <= 600) {
        return 65 + 0.15 * ($x - 400);
    } else {
        return 98; // Out of the given range
    }
}

// Example usage
$x = 20;
$value = calculatePercentage($x);
$range = getMeterRange($value);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Animated Meter Example</title>
    <style>
        .meter-container {
            width: 80%;
            max-width: 600px;
        }
        .meter {
            height: 30px;
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: inset 0 0 5px #000;
            margin-top: 20px;
        }
        .meter div {
            height: 100%;
            transition: width 1s ease-in-out;
        }
        .low {
            width: <?php echo $value; ?>%;
            background: linear-gradient(90deg, #00ff00, #006400);
            animation: grow 1s ease-in-out;
        }
        .medium {
            width: <?php echo $value; ?>%;
            background: linear-gradient(90deg, #ffff00, #ffd700);
            animation: grow 1s ease-in-out;
        }
        .high {
            width: <?php echo $value; ?>%;
            background: linear-gradient(90deg, #ff8c00, #ff4500);
            animation: grow 1s ease-in-out;
        }
        .very-high {
            width: <?php echo $value; ?>%;
            background: linear-gradient(90deg, #ff0000, #8b0000);
            animation: grow 1s ease-in-out;
        }
        @keyframes grow {
            from {
                width: 0;
            }
            to {
                width: <?php echo $value; ?>%;
            }
        }
    </style>
</head>
<body>

    <h1>HEALTH METER</h1>  
   
    <div class="meter-container">
        <div class="meter">
            <div class="<?php echo $range; ?>"></div>
        </div>
    </div>
    <div style="display:flex;flex-direction:row">
    <p><?php echo "HEALTHY"; ?></p>
    <p style="padding-left:170px;"><?php echo "RELIABLE"; ?></p>
    <p style="padding-left:200px;"><?php echo "UNHEALTHY"; ?></p>
    </div>
    
</body>
</html>