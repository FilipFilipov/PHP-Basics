<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>URL Replacer</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="06-URLReplacer.php" method="post">
    <textarea rows="5" name="text" placeholder="Input text"><?= isset($_POST['text']) ? $_POST['text'] : ''; ?></textarea>
    <div>
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
<?php
if(isset($_POST['submit'])) {
    $text = $_POST['text'];
    $pattern = '/<a href=[\'"]([^\'"]+)[\'"]>([^<]+)<\/a>/';
    $text = preg_replace($pattern, '[URL=$1]$2[/URL]', $text);
    echo htmlspecialchars($text);
}
?>
</body>
</html>