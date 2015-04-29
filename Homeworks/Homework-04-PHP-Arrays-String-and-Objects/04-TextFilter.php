<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Text Filter</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="04-TextFilter.php" method="post">
    <textarea rows="5" name="text" placeholder="Input text"><?= isset($_POST['text']) ? $_POST['text'] : ''; ?></textarea>
    <input type="text" name="banlist" placeholder="banlist"
                value="<?= isset($_POST['banlist']) ? $_POST['banlist'] : ''; ?>">
    <div>
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
<?php
if(isset($_POST['submit'])) {
    $text = htmlspecialchars($_POST['text']);
    $banlist = explode(', ', htmlspecialchars($_POST['banlist']));

    foreach($banlist as $word){
        $text = str_replace($word, str_repeat('*', strlen($word)), $text);
    }

    echo $text;
}
?>
</body>
</html>
