<?php
$list = $_GET['list'];
$maxSize = $_GET['maxSize'];
$lines = preg_split('/\r?\n/', $list);
$items = [];
foreach ($lines as $line) {
    $line = trim($line);
    if ($line != "") {
        $items[] = $line;
    }
}

echo "<ul>";
foreach ($items as $item) {
    $text = (strlen($item) <= $maxSize) ?
        htmlspecialchars($item) : htmlspecialchars(substr($item, 0, $maxSize)) . "...";
    echo "<li>$text</li>";
}
echo "</ul>";
