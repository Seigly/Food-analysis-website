<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Image Hover Effect</title>
<link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: black;
    margin: 0;
    padding: 0;
    
}

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    
}

.collection {
    margin: 20px;
    text-align: center;
    position: relative;
}

.collection img {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.collection .tag {
    display: block;
    margin-top: 10px;
    font-size: 18px;
    text-decoration: none;
    color: white;
    transition: color 0.3s ease-in-out;
}

.collection:hover img {
    transform: scale(1.05);
}

.collection:hover .tag {
    color: #007bff;
}

.collection .tag::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    background: #007bff;
    bottom: -5px;
    color: white;
    left: 0;
    transform: scaleX(0);
    transition: transform 0.3s ease-in-out;
}

.collection:hover .tag::before {
    transform: scaleX(1);
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 60px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: left;
    font-size: 20px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.topic {
      font-size: 24px;
      font-weight: bold;
      margin-left: 550px;
      margin-top: 30px;
      color:white;
    }

</style>
<body>
<div class="topic">SELECT THE CATEGORY</div>
<div class="container">
       
       <div class="collection" data-category="skin">
           <img src="bev1.avif" alt="Product 2" onclick="navigate()">
           <a href="beverage.php" class="tag">Beverages</a>
          

       </div>
       <div class="collection" data-category="hair">
            <img src="spa.jpg" alt="Product 3">
            <a href="#" class="tag">Gourmet and world food</a>
        
        </div>
        <div class="collection" data-category="hair">
            <img src="bre.jpg" alt="Product 4">
            <a href="#" class="tag">Bakery,cakes and diaries</a>
           
        </div>
        <div class="collection" data-category="hair">
            <img src="sna1.jpg!w700wp" alt="Product 4">
            <a href="#" class="tag">Snacks</a>
            
        </div>
        <div class="collection" data-category="hair">
            <img src="ice.jpg!w700wp" alt="Product 5">
            <a href="#" class="tag">Frozen Food</a>
            
    </ul>
        </div>
        <div class="collection" data-category="hair">
            <img src="io.jpg" alt="Product 6">
            <a href="#" class="tag">Oils and Food grains</a>
            
        </div>
</div>

<script>
    function navigate() {
            window.location.href = "beverage.html";
        }
</script>

</body>
</html>

