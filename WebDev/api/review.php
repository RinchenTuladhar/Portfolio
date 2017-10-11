<?php
$file = "../json/review.json";

if (! empty($_POST)) {
    $json = json_encode($_POST);

    $data = array(
        'showId' => $_POST['showId'],
        'rating' => $_POST['rating'],
        'review' => $_POST['review']
    );

    $array_data = array();

    if (file_exists($file)) {
        $json_data_file = file_get_contents($file);

        $array_data = json_decode($json_data_file, true);

        array_push($array_data, $data);

        $json_data_file = json_encode($array_data, JSON_PRETTY_PRINT);
        file_put_contents($file, $json_data_file);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

/*
 * if (! empty($_POST['rating']) && ! empty($_POST['description'])) {
 * $data = array(
 * 'rating' => $_POST['rating'],
 * 'description' => $_POST['description']
 * );
 *
 * $array_data = array();
 *
 * if (file_exists($file)) {
 * $file_json_data = file_get_contents($file);
 * $string_json_data = json_decode($file_json_data, true);
 * }
 *
 * $array_data[] = $data;
 *
 * $file_json_data = $json_encode($array_data, JSON_PRETTY_PRINT);
 *
 * if (file_put_contents($file, $file_json_data)) {
 * echo 'Review submitted!';
 * }
 * } else {
 * echo 'A field was left empty';
 * }
 */
?>