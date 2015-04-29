<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rich People’s Problems</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="02-CarRandomizer.php" method="post">
    <label for="cars">Enter cars</label>
    <input type="text" name="cars" id="cars">
    <input type="submit" name="submit" value="Show result">
</form>
<?php
if(isset($_POST['cars']) && $_POST['cars'] !== '') :
    $cars = explode(', ', htmlspecialchars($_POST['cars']));
    $colors = array('white', 'black', 'grey', 'red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'purple');
    ?>
    <br/>
    <table>
        <tr>
            <th>Car</th>
            <th>Color</th>
            <th>Count</th>
        </tr>
        <?php foreach ($cars as $car) :?>
            <tr>
                <td><?=$car;?></td>
                <td><?=$colors[array_rand($colors)]?></td>
                <td><?=rand(1, 5);?></td>
            </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>
</body>
</html>