<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Square Root Sum</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<table>
    <tr>
        <th>Number</th>
        <th>Square</th>
    </tr>
    <?php
    $sum = 0;
    for ($number = 0; $number <= 100; $number += 2):
        $squareRoot = number_format(sqrt($number), 2);
        $sum += $squareRoot;
        ?>
        <tr>
            <td><?= $number; ?></td>
            <td><?= $squareRoot; ?></td>
        </tr>
    <?php endfor; ?>
    <tr>
        <td class="total">Total:</td>
        <td><?= $sum; ?></td>
    </tr>
</table>
</body>
</html>