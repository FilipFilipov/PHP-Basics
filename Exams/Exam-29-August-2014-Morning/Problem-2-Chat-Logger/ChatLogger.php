<?php
date_default_timezone_set('Europe/Sofia');
$currentTime = strtotime("23-12-2014 00:00:00");
$chatString = "msg1 / 10-02-2001 20:30:30
msg2 / 10-02-2007 20:30:29
msg3 / 27-01-2014 09:59:59
msg44 / 17-08-2001 02:03:04
msg5 / 09-02-2012 11:32:29
!&E@E / 22-12-2014 23:59:59
msg6 / 09-02-2012 13:13:13
mS/:)sg17 / 27-02-2011 07:07:17
msg82 / 12-02-2012 22:30:00
msg91 / 18-01-2010 22:30:00
msg10 / 13-02-2002 08:42:06";
$messages = preg_split("/\r?\n/", $chatString);

$chatLog = [];
$latestTime = 0;
foreach ($messages as $message) {
    $messageInfo = preg_split("/\s+\/\s+/", $message, -1, PREG_SPLIT_NO_EMPTY);
    $messageText = $messageInfo[0];
    $messageTime = strtotime($messageInfo[1]);
    $chatLog[$messageTime] = $messageText;
    $latestTime = max($messageTime, $latestTime);
}

ksort($chatLog);
foreach ($chatLog as $key => $value) {
    echo "<div>" . htmlspecialchars($value) . "</div>\n";
}
$timestamp = getTimeMark($latestTime, $currentTime);
echo "<p>Last active: <time>$timestamp</time></p>";

function getTimeMark($lastTime, $currentTime) {
    $currentDateTime = new DateTime("@$currentTime");
    $lastDateTime = new DateTime("@$lastTime");
    if(date('z', $currentTime) - 1 == date('z', $lastTime)) {
        $timeStamp = "yesterday";
    }
    else {
        $timeDiff = $currentDateTime->diff($lastDateTime);
        if($timeDiff->days > 1) {
            $timeStamp = date("d-m-Y", $lastTime);
        }
        else if($timeDiff->h > 0) {
            $timeStamp = "$timeDiff->h hour(s) ago";
        }
        else if($timeDiff->i > 0) {
            $timeStamp = "$timeDiff->i minute(s) ago";
        }
        else {
            $timeStamp = "a few moments ago";
        }
    }
    echo date('r', $currentTime), "<br>";
    echo date('r', $lastTime), "<br>";
    echo $currentDateTime->format('r'), "<br>";
    echo $lastDateTime->format('r'), "<br>";
    return $timeStamp;
}