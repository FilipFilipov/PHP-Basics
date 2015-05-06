<?php
$text = $_GET['text'];
$red = sprintf("%02s", dechex($_GET['red']));
$green = sprintf("%02s", dechex($_GET['green']));
$blue = sprintf("%02s", dechex($_GET['blue']));
$nthLetter = $_GET['nth'];

$color = "#" . $red . $green . $blue;
$result = "<p>";
for ($i = 0; $i < strlen($text); $i++) {
    $letter = htmlspecialchars($text[$i]);
    $result .= (($i + 1) % $nthLetter == 0) ? "<span style=\"color: $color\">$letter</span>" : $letter;
}
echo $result . "</p>";