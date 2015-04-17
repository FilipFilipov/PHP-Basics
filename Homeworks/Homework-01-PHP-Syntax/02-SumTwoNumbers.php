<?php
$firstNumber = 1234.5678;
$secondNumber = 333;
$result = number_format($firstNumber + $secondNumber, 2, '.', '');
echo '$firstNumber + $secondNumber = ' . "$firstNumber + $secondNumber = $result";
