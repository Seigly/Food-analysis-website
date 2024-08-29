<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"href="lastcss.css">
</head>



<?php
    define("HOSTNAME","localhost");
    define("USERNAME","root");
    define('PASSWORD', '');
    define("DATABASE","crud-operations");

    $connection=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
    
  $query1="SELECT * FROM main_nutri WHERE name = 'coca cola'";

$result1=mysqli_query($connection,$query1);
if(!$result1)
{
die("query failed ".mysqli_error($connection));
}
else
{
while($row=mysqli_fetch_assoc($result1))
{
?>
<body>
<div class="container">
    <div class="h">
<h1>YOUR PRODUCT</h1>
<img src="<?php echo $row['image'] ?>">
</div>
<div class="container">
    <table class="product-table">
        <thead>
            <tr>
                <th>NAME</th>
                <th>CALORIES</th>
                <th>CARBOHYDRATES</th>
                <th>FATS</th>
                <th>PROTEINS</th>
                <th>SUGARS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['calories']?></td>
                <td><?php echo $row['totalcarbohydrate']?></td>
                <td><?php echo $row['totalfat']?></td>
                <td><?php echo $row['protein']?></td>
                <td><?php echo $row['sugars']?></td>
            </tr>
        </tbody>
</table>
</div>
</section>
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
$x = $row['calories'];
$value = calculatePercentage($x);
$range = getMeterRange($value);

?>
 <h2>How much this food is unhealthy?</h2>
  <div class="meter" id="tar">
        <div class="<?php echo $range; ?>"></div>
    </div>
    <div class="percentage-line">
        <span>0%(healthy)</span><span>25%</span><span>50%</span><span>75%</span><span>100%(Unhealthy)</span>
    </div>
  
   <h2 class="notes">Note</h2>
   <?php
   if($row['sodium']>3)
   {
    ?>
     <div class="notes">
   <ul>
    <li>NOT SAFE FOR PREGNANT WOMEN AND CHILDREN</li>
   </ul>
   </div>
   <?php
   }
   else
   {
    ?>
     <div class="notes">
   <ul>
    <li>SAFE FOR PREGNANT WOMEN AND CHILDREN</li>
   </ul>
   </div>
   <?php
   }
   if($row['diet fibre']>=4)
   {
?>
 <div class="notes">
 <ul>
    <li>GOOD FOR DIGESTION</li>
   </ul>
   </div>
   <?php
   }
   else
   {
    ?>
     <div class="notes">
 <ul>
    <li>NOT GOOD FOR DIGESTION</li>
   </ul>
   </div>
   <?php
   }
   if($row['transfat']>2.2 || $row['sodium']>3)
   {
    ?>
     <div class="notes">
 <ul>
    <li>HEART PATIENTS SHOULD AVOID</li>
   </ul>
   </div>
   <?php
   }
   else
   {
    ?>
     <div class="notes">
    <ul>
       <li>SAFE FOR HEART PATIENTS</li>
      </ul>
      </div>
      <?php
   }
   if($row['protein']>=20)
   {
    ?>
     <div class="notes">
    <ul>
       <li>GOOD FOR MUSCLE BUILDING</li>
      </ul>
      </div>
      <?php
   }
   if($row['hfcs']=='y')
   {
    ?>
     <div class="notes">
    <ul>
       <li>CONTAINS HIGH FRUCTOSE CORN SYRUP WHICH CAUSES OBESITY</li>
      </ul>
      </div>
      <?php
   }
   if($row['citric']=='y')
   {
    ?>
     <div class="notes">
    <ul>
       <li>CONTAINS CITRIC ACID WHICH CAUSES ABDOMINAL ISSUES AND ACIDITY</li>
      </ul>
      </div>
      <?php
   }


}

}



?> 
      </div>

    
</body>

  

    <style>
        .meter-container {
            width: 80%;
            max-width: 600px;
            margin-left: 370px;
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
            transition: width 5s ease-in-out;
        }
        .low {
            width: <?php echo $value; ?>%;
            background: linear-gradient(90deg, #00ff00, #006400);
            animation: grow 5s ease-in-out;
        }
        .medium {
            width: <?php echo $value; ?>%;
            background: linear-gradient(90deg, #ffff00, #ffd700);
            animation: grow 5s ease-in-out;
        }
        .high {
            width: <?php echo $value; ?>%;
            background: linear-gradient(90deg, #ff8c00, #ff4500);
            animation: grow 5s ease-in-out;
        }
        .very-high {
            width: <?php echo $value; ?>%;
            background: linear-gradient(90deg, #ff0000, #8b0000);
            animation: grow 5s ease-in-out;
        }
        @keyframes grow {
            from {
                width: 0;
            }
            to {
                width: <?php echo $value; ?>%;
            }
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #ffffff;
            padding: 20px;
            text-align: center; /* Center-align the text content inside body */
        }
        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto; /* Center the container horizontally */
            
        }

    </style>





