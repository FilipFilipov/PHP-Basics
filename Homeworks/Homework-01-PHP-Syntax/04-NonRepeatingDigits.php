<?php
$n = 145;
$uniqueFound = false;

for($i = 102; $i <= 987 && $i <= $n; $i++){
    $numStr = $i . '';
    if($numStr[0] != $numStr[1] && $numStr[0] != $numStr[2] && $numStr[1] != $numStr[2]) {
        echo $uniqueFound ? ', ' . $i : $i;
        $uniqueFound = true;
    }
}

if(!$uniqueFound) {
    echo 'no';
}