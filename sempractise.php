<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="text" name="cloth">
    <button type="submit" name="sub">search</button>
    <h1>ENTER TO INSERT:</h1>
    <input type="text" name="nam">
    <input type="text" name="colo">
    <input type="number" name="price">
    <button name="insert">insert</button>
    <button name="del">delete</button>
    <button name="up">update</button>

    </form>
    
    
</body>
</html>
<?php

define("HOSTNAME","localhost");
define("PASSWORD",'');
define("USERNAME","root");
define("DATABASE",'practise');

$connection=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
if(isset($_POST['sub']))
{
    $name=$_POST['cloth'];
    $query="SELECT * FROM cloth WHERE name = '$name'";
    $result=mysqli_query($connection,$query);
    if(!$result)
{
die("query failed ".mysqli_error($connection)); 
}
    $row=mysqli_fetch_assoc($result);
    echo $row['name'];
    echo $row['price'];
    echo $row['color'];
}

if(isset($_POST['insert']))
{
    $nam=$_POST['nam'];
    $colo=$_POST['colo'];
    $price=$_POST['price'];
    $query2="INSERT INTO cloth (name,color,price) VALUES ('$nam','$colo','$price')";
    $result1=mysqli_query($connection,$query2);
    if(!$result1)
    {
        die("query failed".mysqli_error($connection));
    }
    else
    {
        ?>
        <script>
            alert("inserted");
        </script>
        <?php
    }  
}
 
if(isset($_POST['del']))
{
    $nam=$_POST['nam'];
    $colo=$_POST['colo'];
    $price=$_POST['price'];
    $stmt=$connection->prepare("DELETE FROM cloth WHERE name= ?");
    $stmt->bind_param("s",$nam);
    $stmt->execute();
    if($stmt->execute())
    {
        ?>
        <script>
            alert("deleted");
        </script>
        <?php
    }

}
if(isset($_POST['up']))
{
    $nam=$_POST['nam'];
    $colo=$_POST['colo'];
    $price=$_POST['price'];
    $stmt1=$connection->prepare("UPDATE cloth set price=?,color=? WHERE name= ?");
    $stmt1->bind_param("iss",$price,$colo,$nam);
    $stmt1->execute();
    if($stmt1->execute())
    {
        ?>
        <script>
            alert("updated");
        </script>
        <?php
    }

}

class ex
{
    public function car()
    {
        echo "this is function";
    }
    
}
$obj=new ex();
$obj->car();

class example
{
    private $name;
    private $reg;
    public function __construct($name,$reg)
    {
        $this->name=$name;
        $this->reg=$reg;
    }
    public function dis()
    {
        echo "Name: " . $this->name . ", Reg: " . $this->reg;
    }

}
$call=new example("sri",21);
$call->dis();
?>

 
