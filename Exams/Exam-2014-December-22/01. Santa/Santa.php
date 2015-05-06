<?php
$childName = $_GET['childName'];
$wantedPresent = $_GET['wantedPresent'];
$riddles = explode(';', $_GET['riddles']);

$childName = preg_replace("/\s+/", "-", $childName);
$riddleNumber = strlen($childName) % count($riddles);
$riddle = $riddleNumber == 0 ? $riddles[count($riddles) - 1] : $riddles[$riddleNumber - 1];

$santaMessage = "\$giftOf$childName = \$[wasChildGood] ? '$wantedPresent' : '$riddle';";
echo htmlspecialchars($santaMessage);