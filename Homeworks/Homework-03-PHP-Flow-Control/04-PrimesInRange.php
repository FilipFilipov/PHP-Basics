<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Find Primes in Range</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="04-PrimesInRange.php" method="post">
    <label for="start">Starting index: </label>
    <input type="number" name="start" id="start">
    <label for="end">End: </label>
    <input type="number" name="end" id="end">
    <input type="submit" name="submit" value="Submit">
</form>
<?php
if(isset($_POST['submit']) && $_POST['start'] <= $_POST['end']) {
    $start = (int)$_POST['start'];
    $end = (int)$_POST['end'];

    function isPrime($number)
    {
        if ($number < 2) {
            return false;
        }

        $numSqrt = sqrt($number);
        $isPrime = true;

        for ($i = 2; $i <= $numSqrt; $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return $isPrime;
    }

    $numbers = [];
    for ($number = $start; $number <= $end; $number++) {
        $numbers[] = isPrime($number) ? "<strong>$number</strong>" : $number;
    }
    echo implode(', ', $numbers);
}
?>
</body>
</html>