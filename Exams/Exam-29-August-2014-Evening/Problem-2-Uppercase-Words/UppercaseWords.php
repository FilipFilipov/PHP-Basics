<?php
$text = $_GET['text'];
$words = preg_split("/[\W+\d+]/", $text, -1, PREG_SPLIT_NO_EMPTY);
foreach($words as $word) {
    if (ctype_upper($word)) {
        $newWord = processWord($word);
        $text = preg_replace("/(?<=\b|\d)$word(?=\b|\d)/", $newWord, $text);
    }
}

echo '<p>' . htmlspecialchars($text) . '</p>';

function processWord($word) {
        $reversed = strrev($word);
        if ($reversed == $word) {
            return doubleLetters($word);
        } else {
            return $reversed;
        }
}

function doubleLetters($word) {
    $result = "";
    for ($i = 0; $i < strlen($word); $i++) {
        $result .= $word[$i] . $word[$i];
    }
    return $result;
}