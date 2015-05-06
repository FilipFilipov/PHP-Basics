<?php
$numbersString = $_GET['numbersString'];
$dateString = $_GET['dateString'];

$numbersRegex = "/[^a-zA-Z0-9]+?(\d+)[^a-zA-Z0-9]+?/";
preg_match_all($numbersRegex, $numbersString, $numbers);

$sum = 0;
foreach($numbers[1] as $number) {
    $sum += $number;
}
$sum = strrev($sum);

$dateRegex = "/[0-9]{4}-[0-9]{2}-[0-9]{2}/";
preg_match_all($dateRegex, $dateString, $dates);

if(!empty($dates[0])) {
    $futureDates = [];
    foreach ($dates[0] as $date) {
        $tempDate = date_create($date, timezone_open("Europe/Sofia"));
        date_add($tempDate, date_interval_create_from_date_string("$sum days"));
        $futureDates[] = $tempDate;
    }

    $result = "<ul>";
    foreach ($futureDates as $futureDate) {
        $result .= "<li>". date_format($futureDate, "Y-m-d") . "</li>";
    }
    $result .= "</ul>";
    echo $result;
} else {
    echo "<p>No dates</p>";
}