<?php
$input = (object)[2, 34];
echo is_numeric($input) ? var_dump($input) : gettype($input);