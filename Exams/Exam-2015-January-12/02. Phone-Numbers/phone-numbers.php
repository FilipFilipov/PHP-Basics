<?php
$numbersString = $_GET['numbersString'];
$numbersRegex = "|([A-Z][A-Za-z]*)[^0-9A-Za-z+]*([+]?[0-9]+[0-9- ./)(]*[0-9]+)|";
preg_match_all($numbersRegex, $numbersString, $numbersList, PREG_SET_ORDER);
//echo "<pre>", var_dump($numbersList), "</pre>";

if(!empty($numbersList[0])) {
    $result = "<ol>";
    foreach($numbersList as $group) {
        $name = $group[1];
        $number = $group[2];
        $number = preg_replace("|[- ./)(]|", "" ,$number);
        $result .= "<li><b>$name:</b> $number</li>";
    }
    $result .= "</ol>";
    echo $result;
}
else {
    echo "<p>No matches!</p>";
}
