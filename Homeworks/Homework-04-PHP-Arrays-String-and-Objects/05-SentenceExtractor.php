<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sentence Extractor</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="05-SentenceExtractor.php" method="post">
    <textarea rows="5" name="text" placeholder="Input text"><?= isset($_POST['text']) ? $_POST['text'] : ''; ?></textarea>
    <input type="text" name="word" placeholder="word"
           value="<?= isset($_POST['word']) ? $_POST['word'] : ''; ?>">
    <div>
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
<?php
if(isset($_POST['submit'])) {
    $text = htmlspecialchars($_POST['text']);
    $word = htmlspecialchars($_POST['word']);

    $pattern = '/[^.?!]*(?:\b' . $word . '\b)[^.?!]*[.?!](?: |$)/i';
    preg_match_all($pattern, $text, $matches);

    foreach ($matches[0] as $sentence) {
        echo "$sentence<br/>";
    }
}
?>

</body>
</html>