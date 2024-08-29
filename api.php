<?php
// Your API key from NewsAPI
$apiKey = '780a152f67cd43f0bd8c6b900af0e0b1';

// The endpoint for fetching food and cuisine-related news
$query = urlencode('food OR cuisine OR recipe OR cooking OR gourmet');
$url = 'https://newsapi.org/v2/everything?q=' . $query . '&apiKey=' . $apiKey;

// Initialize a cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: YourAppName/1.0',
]);

// Execute the cURL session and store the response
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the request was successful
if ($data['status'] === 'ok') {
    $articles = $data['articles'];
} else {
    $articles = [];
    echo 'Error fetching news: ' . htmlspecialchars($data['message']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Food and Cuisine News</title>
    <style>
        body {
            background-color: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .news-container {
            width: 80%;
            max-width: 00px;
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }
        .news-item {
            opacity: 0;
            transition: opacity 1s ease-in-out;
            position: absolute;
            width: 100%;
        }
        .news-item.active {
            opacity: 1;
            position: relative;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
        h2 {
            margin: 0 0 10px 0;
        }
    </style>
</head>
<body>

<div class="news-container" id="news-container">
    <?php foreach ($articles as $index => $article): ?>
    <div class="news-item <?php echo $index === 0 ? 'active' : ''; ?>">
        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
        <?php if (!empty($article['urlToImage'])): ?>
            <img src="<?php echo htmlspecialchars($article['urlToImage']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
        <?php endif; ?>
        <p><?php echo htmlspecialchars($article['description']); ?></p>
        <a href="<?php echo htmlspecialchars($article['url']); ?>" style="color: #1e90ff;">Read more</a>
    </div>
    <?php endforeach; ?>
</div>

<script>
let currentIndex = 0;
const newsItems = document.querySelectorAll('.news-item');
const totalItems = newsItems.length;

function showNextNewsItem() {
    newsItems[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % totalItems;
    newsItems[currentIndex].classList.add('active');
}

setInterval(showNextNewsItem, 5000); // Change news item every 5 seconds
</script>

</body>
</html>
