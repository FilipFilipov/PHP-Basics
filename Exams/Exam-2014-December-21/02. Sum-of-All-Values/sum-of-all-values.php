<?php
$keysString = $_GET['keys'];
$textString = $_GET['text'];

$startKeyRegex = "/^([A-Za-z_]+)\d+/";
$endKeyRegex = "/\d+([A-Za-z_]+)$/";
preg_match($startKeyRegex, $keysString, $startKey);
preg_match($endKeyRegex, $keysString, $endKey);

if (!$startKey || !$endKey) {
    echo "<p>A key is missing</p>";
}
else {
    $startKey = $startKey[1];
    $endKey = $endKey[1];

    $numbersRegex = "/$startKey(.*?)$endKey/";
    preg_match_all($numbersRegex, $textString, $matches);

    $total = 0;
    foreach($matches[1] as $match) {
        $total += is_numeric($match) ? $match : 0;
    }
    echo "<p>The total value is: <em>", $total != 0 ? $total : 'nothing', "</em></p>";
}