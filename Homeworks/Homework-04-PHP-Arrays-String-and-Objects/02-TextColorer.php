<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Coloring Texts</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="02-TextColorer.php" method="post">
    <textarea name="text"><?= isset($_POST['text']) ? $_POST['text'] : ''; ?></textarea>
    <input type="submit" name="submit" value="Color text">
</form>
<?php if(isset($_POST['text'])): ?>
    <table>
        <?php
        $text = htmlspecialchars($_POST['text']);
        for($i = 0; $i < strlen($text); $i++) {
            $className = (ord($text[$i]) % 2 == 0) ? 'red' : 'blue';
            echo "<span class='$className'>$text[$i] </span>";
        }
        ?>
    </table>
<?php endif; ?>
</body>
</html>