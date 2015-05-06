<?php
$input = json_decode($_GET['jsonTable']);

$colSize = $input[0];
$message = "";

foreach($input[1] as $key => $value) {
    preg_match_all('/(?<=time=)\d{1,3}(?=ms)/',$value, $matches);
    if(isset($matches[0][0])) {
        $message .= chr($matches[0][0]);
    }
}

$words = explode("*", $message);

echo "<table border='1' cellpadding='5'>";
foreach($words as $key => $word) {
    $rows = ceil(strlen($word) / $colSize);
    $currentChar = 0;
    for($row = 0; $row < $rows; $row++) {
        echo "<tr>";
        for($col = 0; $col < $colSize; $col++){
            echo ($currentChar < strlen($word) && $word[$currentChar] != ' ') ?
                "<td style='background:#CAF'>" . htmlspecialchars($word[$currentChar]) : "<td>";
            echo "</td>";
            $currentChar++;
        }
        echo "</tr>";
    }
}
echo "</table>";