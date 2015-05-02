<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Mapping</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <form action="01-WordMapper.php" method="post">
        <textarea name="text"><?= isset($_POST['text']) ? $_POST['text'] : ''; ?></textarea>
        <input type="submit" name="submit" value="Count words">
    </form>
<?php if(isset($_POST['text'])): ?>
    <table>
        <?php
        $text = strtolower(htmlspecialchars($_POST['text']));
        $words = preg_split('/\W+/', $text, 0, PREG_SPLIT_NO_EMPTY);
        $frequencies = array_count_values($words);
        foreach ($frequencies as $key => $word):
            ?>
            <tr>
                <td><?= $key; ?></td>
                <td><?= $word; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
</body>
</html>