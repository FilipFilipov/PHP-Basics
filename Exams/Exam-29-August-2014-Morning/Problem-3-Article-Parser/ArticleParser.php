<?php
date_default_timezone_set("Europe/Sofia");
$text = $_GET['text'];
$pattern = "/^\s*([\w\s\-]+)\s*\%\s*([\w\s\.\-]+)\s*;\s*([\d]{2}\-[\d]{2}\-[\d]{4})\s*-\s*(.{0,100})/m";
preg_match_all($pattern, $text, $articles, PREG_SET_ORDER);
foreach($articles as $article) {
    $topic = htmlspecialchars(trim($article[1]));
    $author = htmlspecialchars(trim($article[2]));
    $date = date('F', strtotime(trim($article[3])));
    $details = htmlspecialchars(trim($article[4])) . "...";

    echo "<div>\n" .
    "<b>Topic:</b> <span>$topic</span>\n" .
    "<b>Author:</b> <span>$author</span>\n" .
    "<b>When:</b> <span>$date</span>\n" .
    "<b>Summary:</b> <span>$details</span>\n" .
    "</div>\n";
}
