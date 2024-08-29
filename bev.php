<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Slider</title>
    <link rel="stylesheet" href="bev.css">
</head>
<body>
    <header>
        <div class="deal-banner">
        <h2>Hello!!!!!</h2>
        <p>What are you eating today?</p>
        </div>
    </header>

    <div class="search-bar">
        <input type="text" placeholder="Enter food name">
        <button>Search</button>
    </div>

    <?php
    class Product {
        // Properties
        public $name;
        public $image;
        public $buttonText;

        // Constructor
        public function __construct($name, $image, $buttonText = 'Analyze') {
            $this->name = $name;
            $this->image = $image;
            $this->buttonText = $buttonText;
        }

        // Methods
        public function displayProduct() {
            echo "<div class='product'>";
            echo "<img src='{$this->image}' alt='{$this->name}'>";
            echo "<button>{$this->buttonText}</button>";
            echo "</div>";
        }
    }

    class Carousel {
        // Properties
        public $products;

        // Constructor
        public function __construct() {
            $this->products = [];
        }

        // Methods
        public function addProduct($product) {
            $this->products[] = $product;
        }

        public function displayCarousel() {
            echo "<div class='carousel-container'>";
            echo "<div class='carousel'>";
            echo "<input type='radio' name='carousel' id='slide1' checked>";
            echo "<input type='radio' name='carousel' id='slide2'>";
            echo "<input type='radio' name='carousel' id='slide3'>";

            echo "<div class='slides'>";

            // Split products into slides (assuming a fixed number per slide)
            $chunks = array_chunk($this->products, 5);
            foreach ($chunks as $index => $products) {
                echo "<div class='slide'>";
                foreach ($products as $product) {
                    $product->displayProduct();
                }
                echo "</div>";
            }

            echo "</div>";
            echo "<div class='controls'>";
            echo "<label for='slide1'></label>";
            echo "<label for='slide2'></label>";
            echo "<label for='slide3'></label>";
            echo "</div>";
            echo "<div class='arrows'>";
            echo "<label for='slide1' class='prev'>&lt;</label>";
            echo "<label for='slide2' class='next'>&gt;</label>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }

    // Create products
    $product1 = new Product("Coke", "coke.jpg");
    $product2 = new Product("Coffee", "fcoffee.webp");
    $product3 = new Product("Tea", "tea.jpg");
    $product4 = new Product("Boba", "boba.webp");
    $product5 = new Product("Juice", "juice.jpg");

    // Create carousel
    $carousel = new Carousel();
    $carousel->addProduct($product1);
    $carousel->addProduct($product2);
    $carousel->addProduct($product3);
    $carousel->addProduct($product4);
    $carousel->addProduct($product5);

    // Display carousel
    $carousel->displayCarousel();
    ?>
</body>
</html>
