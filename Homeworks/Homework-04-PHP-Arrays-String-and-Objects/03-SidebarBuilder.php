<?php
function printSidebar($header, $list) {
    $elements = explode(', ', $list); ?>
    <aside class="bar">
        <h3><?= $header ?></h3>
        <hr/>
        <ul>
            <?php foreach ($elements as $element): ?>
                <li>
                    <a href="#"><?= $element; ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </aside>
<?php } ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sidebar Builder</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form action="03-SidebarBuilder.php" method="post">
    <div>
        <label for="Categories">Categories: </label>
        <input type="text" name="Categories" id="Categories"
               value="<?= isset($_POST['Categories']) ? $_POST['Categories'] : ''; ?>">
    </div>
    <div>
        <label for="Tags">Tags: </label>
        <input type="text" name="Tags" id="Tags" value="<?= isset($_POST['Tags']) ? $_POST['Tags'] : ''; ?>">
    </div>
    <div>
        <label for="Months">Months: </label>
        <input type="text" name="Months" id="Months" value="<?= isset($_POST['Months']) ? $_POST['Months'] : ''; ?>">
    </div>
    <input type="submit" name="submit" value="Generate">
</form>
<br/>
<?php if(isset($_POST['submit'])) {
    foreach($_POST as $header => $list) {
        if ($header !== 'submit') printSidebar($header, htmlspecialchars($list));
    }
}
?>
</body>
</html>
