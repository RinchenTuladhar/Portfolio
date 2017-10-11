<?php

class TVShow
{
    // Variables
    public $id = null;

    public $showName;

    public $description;

    public $genre;

    public $episodeLength;

    public $averageRating;

    public $reviews;

    public function getArray($amount)
    {
        $contents = file_get_contents("json/tv_shows.json");
        $json = json_decode($contents, true);
        $details = "";

        $jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($contents, TRUE)), RecursiveIteratorIterator::SELF_FIRST);
        $data = "";
        $id = "";

        $counter = 0;

        foreach ($jsonIterator as $key => $val) {
            if (! is_array($val)) {
                if ($amount >= $counter) {
                    if ($key === "id") {
                        $counter ++;
                        $id = $val - 1;
                        $data = <<<DATA
                    <div class="show">
                    <div class="col-md-4 col-sm-6 col-xs-12">
DATA;
                        $details .= $data;
                    } else if ($key === "showName") {
                        $data = <<<DATA
                    <div class="tv-show-name">
                        <h3><strong>{$val}</strong></h3>
                    </div>
DATA;
                        $details .= $data;
                    } else if ($key === "description") {
                        $data = <<<DATA
                    <div class="tv-show-description">
                        <p>{$val}</p>
                        <a href="tv-show-product.php?{$id}"><button type="button" class="btn btn-danger">Read More</button></a>
                    </div>
                    </div>
                    </div>
DATA;
                        $details .= $data;
                    }
                }
            }
        }
        return $details;
    }

    public function formatJson($title, $key, $val)
    {
        $test = $key;
        $content = <<<CONTENT
        {$test}
CONTENT;
        return $content;
    }
}

class TVShowList
{
    // Variables
    public $listOfTVShows;

    public function __construct()
    {
        $this->listOfTVShows = array();
    }
}

?>