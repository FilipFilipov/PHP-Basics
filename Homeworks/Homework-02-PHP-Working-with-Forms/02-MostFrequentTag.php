<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Most Frequent Tags</title>
</head>
<body>
<div>Enter Tags:</div>
<br/>
<form action="02-MostFrequentTag.php" method="post">
    <input type="text" name="tags">
    <input type="submit" name="submit" value="Submit">
</form>
<br/>
<?php
if (isset($_POST['tags'])) {
    $tags = explode(", ", $_POST['tags']);
    $tagsFrequency = array();

    foreach ($tags as $tag) {
        if (isset($tagsFrequency[$tag])) {
            $tagsFrequency[$tag]++;
        }
        else {
            $tagsFrequency[$tag] = 1;
        }
    }

    arsort($tagsFrequency);

    foreach ($tagsFrequency as $key => $value) {
        echo htmlspecialchars($key) . " : $value times<br/>";
    }
    reset($tagsFrequency);
    echo "<br/>Most Frequent Tag is: " . htmlspecialchars(key($tagsFrequency));
}
?>
</body>
</html>