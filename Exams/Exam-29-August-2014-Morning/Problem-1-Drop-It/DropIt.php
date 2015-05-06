<?php
$text = $_GET['text'];
$minFontSize = (int)$_GET['minFontSize'];
$maxFontSize = (int)$_GET['maxFontSize'];
$step = (int)$_GET['step'];

$currentSize = $minFontSize;
$isIncrementing = true;
$decoration = "";
for ($i = 0; $i < strlen($text); $i++) {
    $decoration = (ord($text[$i]) % 2 == 0) ? "text-decoration:line-through;" : "";
    echo "<span style='font-size:$currentSize;$decoration'>" . htmlspecialchars($text[$i]) . "</span>";
    if (ctype_alpha($text[$i])) {
        $currentSize += $isIncrementing ? $step : -$step;
        if($currentSize >= $maxFontSize || $currentSize <= $minFontSize) {
            $isIncrementing = !$isIncrementing;
        }
    }
}