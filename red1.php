<?php

function getFoodNews() {
    // Set the GDELT API endpoint and parameters
    $url = "https://api.gdeltproject.org/api/v2/doc/doc?query=food&mode=artlist&format=json";

    // Initialize a cURL session
    $ch = curl_init();

    // Set the options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL session
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    // Close the cURL session
    curl_close($ch);

    // Decode the JSON response
    $data = json_decode($response, true);

    return $data;
}

// Fetch food-related news headlines
$foodNewsData = getFoodNews();

if (isset($foodNewsData['articles']) && !empty($foodNewsData['articles'])) {
    echo "Top food-related headlines:\n";
    foreach ($foodNewsData['articles'] as $article) {
        echo "- " . $article['title'] . "\n";
    }
} else {
    echo "No food-related news available.";
}



