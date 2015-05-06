<?php
$list = $_GET['list'];
$length = $_GET['length'];
$showUsername = isset($_GET['show']);
$lines = preg_split('/\r?\n/', $list);
$items = [];
foreach ($lines as $line) {
    $line = trim($line);
    if ($line != "") {
        $items[] = $line;
    }
}

echo '<ul>';
foreach ($items as $item) {
    if(strlen($item) >= $length) {
        $text = '<li>' . htmlspecialchars($item) . '</li>';
    }
    else {
        $text = $showUsername ? '<li style="color: red;">' . htmlspecialchars($item) . '</li>' : '';
    }
    echo $text;
}
echo '</ul>';
