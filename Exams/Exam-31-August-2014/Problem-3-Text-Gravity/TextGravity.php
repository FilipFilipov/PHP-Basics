<?php
$text = $_GET['text'];
$lineLength = $_GET['lineLength'];

$textLength = strlen($text);
$rows = (int)ceil($textLength / $lineLength);
$matrix = [];
$currentChar = 0;
for($row = 0; $row < $rows; $row++) {
    $matrix[] = [];
    for($col = 0; $col < $lineLength; $col++) {
        $matrix[$row][$col] = ($currentChar < $textLength) ? $text[$currentChar] : " ";
        $currentChar++;
    }
}

for($bottomRow = $rows - 1; $bottomRow > 0; $bottomRow--) {
    for($row = $bottomRow; $row > 0; $row--) {
        for($col = 0; $col < $lineLength; $col++) {
            if($matrix[$row][$col] == " ") {
                $matrix[$row][$col] = $matrix[$row - 1][$col];
                $matrix[$row - 1][$col] = " ";
            }
        }
    }
}

echo "<table>";
foreach($matrix as $row) {
    echo "<tr>";
    foreach($row as $col) {
        echo "<td>" . htmlspecialchars($col) . "</td>";
    }
    echo "</tr>";
}
echo "<table>";
