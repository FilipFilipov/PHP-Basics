<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Tags</title>
</head>
<body>
<div>Enter Tags:</div>
<br/>
<form action="01-PrintTags.php" method="post">
    <input type="text" name="tags">
    <input type="submit" name="submit" value="Submit">
</form>
<br/>
<?php
if(isset($_POST['tags'])) {
    $tags = explode(", ", htmlspecialchars($_POST['tags']));
    for ($i = 0; $i < count($tags); $i++) {
        echo "$i : $tags[$i]<br/>";
    }
}
?>
</body>
</html>