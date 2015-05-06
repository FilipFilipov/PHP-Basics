<?php
$recipient = htmlspecialchars($_GET['recipient']);
$subject = htmlspecialchars($_GET['subject']);
$body = htmlspecialchars($_GET['body']);
$key = $_GET['key'];
$email = "<p class='recipient'>$recipient</p><p class='subject'>$subject</p><p class='message'>$body</p>";

$encryptedEmail = '|';
for ($i = 0; $i < strlen($email); $i++) {
    $encryptedChar = ord($email[$i]) * ord($key[$i % strlen($key)]);
    $encryptedEmail .= dechex($encryptedChar) . '|';
}

echo $encryptedEmail;