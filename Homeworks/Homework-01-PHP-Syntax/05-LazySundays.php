<?php
$currentSunday = strtotime("first Sunday of this month");
$finalSunday = strtotime("last Sunday of this month");
while ($currentSunday <= $finalSunday) {
    echo date('jS F, Y', $currentSunday) . PHP_EOL;
    $currentSunday = strtotime('next Sunday', $currentSunday);
}