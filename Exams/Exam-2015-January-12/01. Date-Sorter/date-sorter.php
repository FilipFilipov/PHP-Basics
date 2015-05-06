<?php
$currDate = date_create($_GET['currDate'], timezone_open("Europe/Sofia"));
$list = $_GET['list'];
$lines = preg_split('/\r?\n/', $list);
$dates = [];
foreach ($lines as $line) {
    $tempDate = date_create($line, timezone_open("Europe/Sofia"));
    if ($line != "" && $tempDate) {
        $dates[] = $tempDate;
    }
}

sort($dates);

echo "<ul>";
foreach ($dates as $date) {
    echo "<li>" . ($date < $currDate ? "<em>" : "") .
        date_format($date, "d/m/Y") .
        ($date < $currDate ? "</em>" : "") . "</li>";
}
echo "</ul>";

