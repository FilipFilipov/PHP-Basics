<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HTML Table</title>
    <link href="06-InformationTable.css" rel="stylesheet">
</head>
<body>
<?php
$name = 'Pesho';
$phoneNumber = '0884-888-888';
$age = 67;
$address = 'Suhata Reka';
?>
<table>
    <tr>
        <td>Name</td>
        <td>
            <?= $name; ?>
        </td>
    </tr>
    <tr>
        <td>Phone number</td>
        <td>
            <?= $phoneNumber; ?>
        </td>
    </tr>
    <tr>
        <td>Age</td>
        <td>
            <?= $age; ?>
        </td>
    </tr>
    <tr>
        <td>Address</td>
        <td>
            <?= $address; ?>
        </td>
    </tr>
</table>
</body>
</html>