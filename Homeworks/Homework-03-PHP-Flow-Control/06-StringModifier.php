<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>String Modifier</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="06-StringModifier.php" method="post">
    <input type="text" name="input" value="<?= isset($_POST['input']) ? $_POST['input'] : ''; ?>">
    <input id="r1" type="radio" name="action" value="checkPalindrome" required>
    <label for="r1">Check Palindrome </label>
    <input id="r2" type="radio" name="action" value="strrev">
    <label for="r2">Revers String </label>
    <input id="r3" type="radio" name="action" value="splitString">
    <label for="r3">Split </label>
    <input id="r4" type="radio" name="action" value="hashString">
    <label for="r4"> Hash String</label>
    <input id="r5" type="radio" name="action" value="shuffleString">
    <label for="r5"> Shuffle String</label>
    <input type="submit" name="submit" value="Submit">
</form>
<?php
if(!empty($_POST['input'])) {
    $input = $_POST['input'];
    $action = $_POST['action'];

    function checkPalindrome($input)
    {
        $negative = '';
        if(strrev($input) !== $input) {
            $negative = 'not';
        }
        return "$input is $negative a palindrome!";
    }

    function splitString($input)
    {
        return implode(' ', str_split($input));
    }

    function hashString($input)
    {
        return password_hash($input, PASSWORD_DEFAULT);
    }

    function shuffleString($input)
    {
        $chars = str_split($input);
        shuffle($chars);
        return implode('', $chars);
    }

    echo $action($input);
}
?>
</body>
</html>