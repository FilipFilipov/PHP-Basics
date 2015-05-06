<?php
$text = $_GET['text'];
$artist = $_GET['artist'];
$property = $_GET['property'];
$order = $_GET['order'];

$songs = preg_split("/\r?\n/", $text, -1, PREG_SPLIT_NO_EMPTY);
$songList = [];
foreach($songs as $song) {
    $songInfo = preg_split("/\|/", $song);
    $currentSong = [
        "name" => trim($songInfo[0]),
        "genre" => trim($songInfo[1]),
        "artists" => explode(", ", trim($songInfo[2])),
        "downloads" => (int)trim($songInfo[3]),
        "rating" => (float)trim($songInfo[4])
    ];
    sort($currentSong["artists"]);

    if (in_array($artist, $currentSong["artists"])) {
        $songList[] = $currentSong;
    }
}

usort($songList, function($s1, $s2) use ($order, $property) {
    if ($s1["$property"] == $s2["$property"]) {
        return strcmp($s1["name"], $s2["name"]);
    }
    return ($order == "ascending" ^ $s1["$property"] < $s2["$property"]) ? 1 : -1;
});

echo "<table>\n<tr><th>Name</th><th>Genre</th><th>Artists</th><th>Downloads</th><th>Rating</th></tr>\n";
foreach ($songList as $song) {
    echo "<tr>";
    $artists = htmlspecialchars(implode(", ", $song["artists"]));
    $song["name"] = htmlspecialchars($song["name"]);
    $song["genre"] = htmlspecialchars($song["genre"]);
    echo "<td>{$song["name"]}</td><td>{$song["genre"]}</td><td>$artists</td><td>{$song["downloads"]}</td><td>{$song["rating"]}</td>";
    echo "</tr>\n";
}
echo "</table>";