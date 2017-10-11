<?php
if (! isset($_SESSION)) {
    session_start();
}

include ('api/api_index.php');

$pageTitle = "FreshTomatoes: Product";

function buildTVShowPage()
{
    $query = $_SERVER['QUERY_STRING'];

    // Accessing tv_shows.json
    $tvShowContents = file_get_contents("json/tv_shows.json");
    $showJson = json_decode($tvShowContents, true);
    $show = $showJson[$query];

    // Accessing reviews.json
    $reviewContents = file_get_contents("json/review.json");
    $reviewJson = json_decode($reviewContents, true);

    $arrayOfReviews = loadReviews($reviewJson, $query);
    $averageRating = calculateAverageRating($reviewJson, $query);

    $content = <<<CONTENT
    <div class="tv-show-product">
        <div class="tv-show-image">
            <img src="{$show['image']}"></img>
        </div>
        <p class="show-title">{$show['showName']}</p>
        <p><strong>Description:</strong></p>
        <p class="show-description">{$show['description']}</p>
        <p class="show-rating"><strong>Average Rating:</strong> {$averageRating} / 5</p>
        <h2>Reviews</h2>
        {$arrayOfReviews}
        <div class="tv-show-ratings">
            <h2> Submit Review </h2>
            <form action="api/review.php" method="post">
                <div class="form-group">
                    <label for="rating">Rating: </label>
                    <select id="rating" name="rating">
                        <option value=0>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value=5>5</option>
                    </select>
                    <br>
                    <label for="review">Submit Review:</label>
                    <textarea class="form-control" id="review" name="review"></textarea>
                    <input type="hidden" name="showId" value=$query>
                    <br>
                    <input type="submit" id="submit" class="btn btn-success" value="Submit"/>
                </div>
            </div>
        </div>
    </div>
CONTENT;
    return $content;
}

function loadReviews($reviewJson, $query)
{
    $content = "";

    foreach ($reviewJson as $review) {
        if ($review['showId'] === $query) {
            $displayReviews = <<<REVIEWS
            <div class="user-review">
                <h4 class="user-review-rating">Rating: {$review['rating']}</h4>
                <p class="user-review-review">{$review['review']}</p>
            </div>
REVIEWS;
            $content .= $displayReviews;
        }
    }

    return $content;
}

function calculateAverageRating($reviewJson, $query)
{
    $rating = 0;
    $counter = 0;
    $averageRating = 0;

    foreach ($reviewJson as $review) {
        if ($review['showId'] === $query) {
            $counter ++;
            $rating = $rating + (int) $review['rating'];
        }
    }

    if ($counter > 0) {
        $averageRating = number_format($rating / $counter, 2, '.', '');
    }

    $content = <<<CONTENT
    {$averageRating}
CONTENT;
    return $content;
}

$pageContent = buildTVShowPage();

$page = new MasterPage($pageTitle);
$page->setMainContent($pageContent);
$page->renderMasterPage();
?>