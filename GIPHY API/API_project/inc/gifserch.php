<?php
$apiKey = "IEIpUsjzRM6JDt83CiXuUXw7MsLw2sfi";
$limit = 18;
$rating = "g";

// Get query params from URL
$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;

// GIPHY Search Endpoint
$searchUrl = "https://api.giphy.com/v1/gifs/search?api_key=" . urlencode($apiKey) .
             "&q=" . urlencode($searchTerm) .
             "&limit=" . $limit .
             "&offset=" . $offset .
             "&rating=" . urlencode($rating);

// fetch data if a search term is provided
$searchResults = [];
if (!empty($searchTerm)) {
    $response = file_get_contents($searchUrl);
    $searchResults = json_decode($response, true);
}
?>

<?php
if (!empty($searchTerm)) {
    echo "<hr>";
    if (!empty($searchResults['data'])) {
        echo "<div class='gif-container'>";
        foreach ($searchResults['data'] as $gif) {
            $imgUrl = $gif['images']['downsized']['url'];
            echo "<img src='{$imgUrl}' alt='Search GIF' class='gif-image'>";
        }
        echo "</div>";
    } else {
        echo "<p>No results found for <strong>" . htmlspecialchars($searchTerm) . "</strong>.</p>";
    }
}
?>

<hr>

<form method="GET" class="search-form">
    <input type="text" name="q" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Search for GIFs...">
    <button type="submit">Search</button>
</form>

<?php
// Show pagination after the search form
if (!empty($searchTerm) && !empty($searchResults['data'])) {
    echo "<div class='pagination'>";
    if ($page > 1) {
        echo "<a href='?q=" . urlencode($searchTerm) . "&page=" . ($page - 1) . "'>← Previous</a>";
    }
    echo "<span>Page {$page}</span>";
    if (!empty($searchResults['pagination']) && ($searchResults['pagination']['total_count'] > $offset + $limit)) {
        echo "<a href='?q=" . urlencode($searchTerm) . "&page=" . ($page + 1) . "'>Next →</a>";
    }
    echo "</div>";
}
?>
