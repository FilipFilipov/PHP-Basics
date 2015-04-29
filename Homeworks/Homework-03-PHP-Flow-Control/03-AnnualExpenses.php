<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show Annual Expenses</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="03-AnnualExpenses.php" method="post">
    <label for="number">Enter number of years: </label>
    <input type="number" name="number" id="number">
    <input type="submit" name="submit" value="Show costs">
</form>
<br/>
<?php if(isset($_POST['number']) && $_POST['number'] > 0):
    $header[0] = 'Year';
    $date = strtotime('1st January');
    $year = date('Y', $date);
    for ($month = 1; $month <= 12; $month++) {
        $header[$month] = date('F', $date);
        $date = strtotime("+1 month", $date);
    }
    $header[13] = 'Total';

    $expenses = [];
    for ($row = 0; $row < (int)$_POST['number']; $row++) {
        $expenses[$row][] = $year--;
        for ($col = 1; $col <= 12; $col++) {
            $expenses[$row][$col] = rand(0, 999);
        }
        $expenses[$row][] = array_sum(array_slice($expenses[$row], 1, 12));
    }
    ?>
    <table>
        <tr>
            <?php for ($month = 0; $month < 14; $month++): ?>
                <th>
                    <?= $header[$month] ?>
                </th>
            <?php endfor ?>
        </tr>
        <?php foreach($expenses as $row): ?>
            <tr>
                <?php foreach($row as $col): ?>
                    <td>
                        <?= $col; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>