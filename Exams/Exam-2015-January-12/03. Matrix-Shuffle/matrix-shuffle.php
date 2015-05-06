<?php
$size = $_GET['size'];
$text = $_GET['text'];
$matrix = [];

for($i = 0; $i < $size; $i++) {
	$matrix[$i] = [];
}

$sizeEmpty = $size;
$index = 0;
$startX = 0;
$startY = 0;

while($sizeEmpty > 0) {
	for($y = $startY; $y <= $startY + $sizeEmpty - 1; $y++) { // Go right.
		$matrix[$startX][$y] = $text[$index];
		$index++;
	}
	for($x = $startX + 1; $x <= $startX + $sizeEmpty - 1; $x++) { //Go down.
		$matrix[$x][$y - 1] = $text[$index];
		$index++;
	}
	for ($y = $startY + $sizeEmpty - 2; $y >= $startY; $y--) { // Go left.
		$matrix[$x - 1][$y] = $text[$index];
		$index++;
	}
	for ($x = $startX + $sizeEmpty - 2; $x >= $startX + 1; $x--) { // Go up.
		$matrix[$x][$startY] = $text[$index];
		$index++;
	}
	$startX++;
	$startY++;
	$sizeEmpty -= 2;
}

$sentence = "";
for($x = 0; $x < $size; $x++) {
	for($y = ($x % 2 == 0) ? 0 : 1; $y < $size; $y += 2) {
		$sentence .= $matrix[$x][$y];
	}
}
for($x = 0; $x < $size; $x++) {
	for($y = ($x % 2 == 0 ? 1 : 0); $y < $size; $y += 2) {
		$sentence .= $matrix[$x][$y];
	}
}

$output = "";
for($i = 0; $i < strlen($sentence); $i++) {
	if(ctype_alpha($sentence[$i])) {
        $output .= strtolower($sentence[$i]);
    }
}

echo "<div style='background-color:" . ($output == strrev($output)? '#4FE000' : '#E0000F') . "'>$sentence</div>";