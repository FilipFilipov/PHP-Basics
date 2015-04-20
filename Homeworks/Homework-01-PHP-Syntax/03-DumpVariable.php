<?php
$input = (object)[2, 34];

if(is_numeric($input) && gettype($input) !== 'string') {
    var_dump($input);
}
else {
    echo gettype($input);
}
