<?php
$luggage = explode('C|_|', $_GET['luggage']);
array_pop($luggage);
$typeLuggage = $_GET['typeLuggage'];
$room = $_GET['room'];
$minWeight = (int)$_GET['minWeight'];
$maxWeight = (int)$_GET['maxWeight'];

$luggageList = [];
$luggageWeight = [];
foreach($luggage as $piece) {
    $pieceArr = explode(';', $piece);
    $lugType = $pieceArr[0];
    $lugRoom = $pieceArr[1];
    $lugWeight = floor($pieceArr[3]);
    $lugName = $pieceArr[2];

    if($room == $lugRoom && (in_array($lugType, $typeLuggage))) {
        if(!isset($luggageList["$lugType"])) {
            $luggageList["$lugType"] = [];
        }
        if(!isset($luggageWeight["$lugType"])) {
            $luggageWeight["$lugType"] = 0;
        }
        $luggageList[$lugType][] = $lugName;
        $luggageWeight[$lugType] += $lugWeight;
    }
}

ksort($luggageList);
echo "<ul>";
foreach($luggageList as $type => $list) {
    $output = '';
    if($luggageWeight["$type"] >= $minWeight && $luggageWeight["$type"] <= $maxWeight) {
        sort($list);
        $output.= '<li><p>'.$type.'</p>';
        $output.= "<ul><li><p>$room</p>";
        $output.= '<ul><li><p>' . implode(", ", $list) . ' - ' . $luggageWeight["$type"] . 'kg</p></li></ul>';
        $output.= '</li></ul>';
        $output.= '</li>';
        echo $output;
    }
}
echo "</ul>";
