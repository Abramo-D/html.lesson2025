    <?php
$apiKey = "IEIpUsjzRM6JDt83CiXuUXw7MsLw2sfi";
$baseUrl = "https://api.giphy.com/v1/gifs/trending";
$limit = 12;
$rating = "g";

$url = $baseUrl . "?api_key=" . urlencode($apiKey) . "&limit=" . $limit . "&rating=" . urlencode($rating);
$response = file_get_contents($url);
$data = json_decode($response, true);

if (!empty($data['data'])) {
    
    foreach ($data['data'] as $gif) {
        $imgUrl = $gif['images']['downsized']['url'];
       echo "<img src='{$imgUrl}' alt='GIF' class='gif-image'>";
    }
   
} else {
    echo "<p>No GIFs found.</p>";
}
?>

