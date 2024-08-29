<?php

$con=mysqli_connect("localhost","root","","practise");
$query="SELECT name FROM cloth";
$result=mysqli_query($con,$query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .class
    {
        display: flex;
        flex-direction: row;
        align-items: center;
    }
</style>
<body>

<select name="po" id="po">
<?php
while($row=$result->fetch_assoc())
{
    echo "<option value=".$row['name'].">
    ".$row['name']." </option>";

    echo "<input type=checkbox style=display: flex;
    flex-direction: row;
    align-items: center; value=".$row['name'].">";
}
?>


</select>
    
</body>
</html>
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

