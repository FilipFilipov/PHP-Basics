<?php
$input = json_decode($_GET['jsonTable']);
$maxCols = 0;
foreach($input[0] as $key => $line) {
    $input[0][$key] = AffineEncrypt($line, $input[1][0], $input[1][1]);
    $maxCols = max(strlen($line), $maxCols);
}

printTable($input, $maxCols);

function AffineEncrypt($plainText, $k, $s)
{
    $cipherText = "";
    $chars = str_split(strtoupper($plainText));
    foreach($chars as $ch) {
        $x = ord($ch) - 65;
        $cipherText .= ctype_alpha($ch) ? chr((($k * $x + $s) % 26) + 65) : $ch;
    }
    return $cipherText;
}

function printTable($input, $maxCol)
{
    echo "<table border='1' cellpadding='5'>";
    if($maxCol == 0) {
        echo "<tr><td></td></tr>";
    }
    else {
        foreach ($input[0] as $value) {
            echo "<tr>";
            for ($col = 0; $col < $maxCol; $col++) {
                echo ($col >= strlen($value)) ? "<td>" : "<td style='background:#CCC'>", $value[$col];
                echo "</td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
}