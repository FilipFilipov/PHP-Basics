<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sum of Digits</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="05-SumOfDigits.php" method="post">
    <label for="numbers">Input string: </label>
    <input type="text" name="numbers" id="numbers">
    <input type="submit" name="submit" value="Submit">
</form>
<?php if(isset($_POST['submit'])):
    $numbers = explode(', ', htmlspecialchars($_POST['numbers'])); ?>
    <table>
        <?php foreach ($numbers as $number): ?>
            <tr>
                <td><?= $number; ?></td>
                <td><?= (filter_var($number, FILTER_VALIDATE_INT) !== false) ?
                        array_sum(str_split($number)) : 'I cannot sum that'; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif ?>
</body>
</html>