<?php
$minSeats = $_GET['minSeats'];
$maxSeats = $_GET['maxSeats'];
$genreFilter = $_GET['filter'];
$order = $_GET['order'];
$list = preg_split('/\r?\n/', $_GET['list']);
$screenings = [];

foreach($list as $line) {
    $movie = preg_split('|[)(/-]|', $line, -1, PREG_SPLIT_NO_EMPTY);
    if($genreFilter == 'all' || $movie[1] == $genreFilter) {
        if($movie[3] >= $minSeats && $movie[3] <= $maxSeats) {
            $screenings[] = $movie;
        }
    }
}

usort($screenings, function ($first, $second) use ($order) {
    $compare = strcmp($first[0], $second[0]);
    if($compare == 0) {
        return ($first[3] > $second[3]) ? 1 : -1;
    }
    return $order == "descending" ? -$compare : $compare;
});

foreach($screenings as $screening) {
    $result = '<div class="screening">';
    $result .= '<h2>' . trim(htmlspecialchars($screening[0])) . '</h2>';
    $cast = explode(',', $screening[2]);
    $result .= '<ul>';
    foreach($cast as $star) {
        $result .= '<li class="star">' . trim(htmlspecialchars($star)) . '</li>';
    }
    $result .= '</ul>';
    $result .= '<span class="seatsFilled">' . trim(htmlspecialchars($screening[3])) . ' seats filled</span>';
    $result .= '</div>';
    echo $result;
}
