<?php

/* -- USED TO RETRIEVE JSON INFORMATION -- */
function getAllShows(): array
{
    $fileHolder = file("json/shows.json");
    $arrayHolder = [];
    foreach ($fileHolder as $holder) {
        $arrayHolder[] = json_decode($holder);
    }

    return array_map(function ($shows) {
        $show = new TVShow();
        $show->getArray($show);
        return $show;
    }, $arrayHolder);
}
?>