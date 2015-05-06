<?php
date_default_timezone_set("Europe/Sofia");

$text = $_GET['text'];
$minPrice = $_GET['min-price'];
$maxPrice = $_GET['max-price'];
$sort = $_GET['sort'];
$order = $_GET['order'];

$lines = preg_split('/\r?\n/', $text);
$books = [];

foreach($lines as $prop) {
    $book = preg_split('|\/|', $prop);
    if($book[3] >= $minPrice && $book[3] <= $maxPrice) {
        $books[] = [
            "author" => $book[0],
            "title" => $book[1],
            "genre" => $book[2],
            "price" => $book[3],
            "publishDate" => $book[4],
            "synopsis" => $book[5]
        ];
    }
}

function dispatchSort ($books, $sort, $order) {
    switch($sort) {
        case 'genre':
        case 'author': {
            usort($books, function ($a, $b) use ($sort, $order) {
                $compare = strcmp($a["$sort"], $b["$sort"]);
                if($compare == 0) {
                    return (strtotime($a["publishDate"]) > strtotime($b["publishDate"])) ? 1 : -1;
                }
                return $order == "descending" ? -$compare : $compare;
            });
            break;
        }
        case 'publish-date': {
            usort($books, function ($a, $b) use ($order) {
                return (strtotime($a["publishDate"]) > strtotime($b["publishDate"]) ^ $order == "descending") ? 1 : -1;
            });
            break;
        }
    }
    return $books;
};

$books = dispatchSort($books, $sort, $order);

foreach($books as $book) {
    $result = "<div>";
    $result .= "<p>" . htmlspecialchars($book['title']) . "</p>";
    $result .= '<ul>';
    foreach($book as $key => $prop) {
        if ($key != 'title') {
            $result .= "<li>" . htmlspecialchars($prop) . "</li>";
        }
    }
    $result .= '</ul>';
    $result .= '</div>';

    echo $result;
}
