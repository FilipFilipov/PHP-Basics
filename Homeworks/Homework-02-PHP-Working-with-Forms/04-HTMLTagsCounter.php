<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HTML Tags Counter</title>
</head>
<body>
<div>Enter HTML tag:</div>
<form action="04-HTMLTagsCounter.php" method="post">
    <input type="text" name="tag">
    <input type="submit" name="submit" value="Submit">
</form>
<br/>
<?php
session_start();
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

$tags = array('!DOCTYPE', 'a', 'abbr', 'address', 'area', 'article', 'aside', 'audio', 'b', 'base', 'bdi', 'bdo',
    'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'cite', 'code', 'col', 'colgroup', 'command',
    'datalist', 'dd', 'del', 'details', 'dfn', 'dir', 'div', 'dl', 'dt', 'em', 'embed', 'fieldset', 'figcaption',
    'figure', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i',
    'iframe', 'img', 'input', 'ins', 'kbd', 'keygen', 'label', 'legend', 'li', 'link', 'map', 'mark', 'menu', 'meta',
    'meter', 'nav', 'noscript', 'object', 'ol', 'optgroup', 'option', 'output', 'p', 'param', 'pre', 'progress', 'q',
    'rp', 'rt', 'ruby', 's', 'samp', 'script', 'section', 'select', 'small', 'source', 'span', 'strong', 'style',
    'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr',
    'track', 'u', 'ul', 'var', 'video', 'wbr');

if(isset($_POST['tag'])) {
    if(in_array(htmlspecialchars($_POST['tag']), $tags)){
        $isValidTag = 'Valid';
        $_SESSION['score']++;
    } else {
        $isValidTag = 'Invalid';
    }
    echo "<div style='font-size: 25px'>{$isValidTag} HTML tag! <br/>Score: {$_SESSION['score']}</div>";
}
?>
</body>
</html>