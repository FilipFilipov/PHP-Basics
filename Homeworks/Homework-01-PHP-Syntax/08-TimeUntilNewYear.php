<?php
date_default_timezone_set('Europe/Sofia');

$dateArray = getdate();
$now = new DateTime(date('r', $dateArray[0]));
$newYear = new DateTime('January 1st +1 year');

if($now->format('I')) {
    $newYear->sub(new DateInterval('1H'));
}
$dateDiff = $newYear->diff($now);

$hoursDiff = $dateDiff->days * 24 + $dateDiff->h;
$minutesDiff = $hoursDiff * 60 + $dateDiff->i;
$secondsDiff = $minutesDiff * 60 + $dateDiff->s;

echo "Hours until new year : $hoursDiff" . PHP_EOL;
echo "Minutes until new year : " . number_format($minutesDiff, 0, '', ' ') . PHP_EOL;
echo "Seconds until new year : " . number_format($secondsDiff, 0, '', ' ') . PHP_EOL;
echo "Days:Hours:Minutes:Seconds $dateDiff->days:$dateDiff->h:$dateDiff->i:$dateDiff->s";