<?php
$students = $_GET['students'];
$sortColumn = $_GET['column'];
$order = $_GET['order'];

preg_match_all('/^.*$/m', $students, $matches);

$studentsArray = [];
for ($i = 0; $i < count($matches[0]); $i++) {
    $props = explode(", ", $matches[0][$i]);
    $studentsArray[] = [
        'id' => $i + 1,
        'username' => $props[0],
        'email' => $props[1],
        'type' => $props[2],
        'result' => (int)$props[3]
    ];
}

switch($sortColumn) {
    case 'id':
        usort($studentsArray, 'sortById'); break;
    case 'username':
        usort($studentsArray, function ($a1, $a2) use ($order) {
            $result = strcmp($a1['username'], $a2['username']);
            if ($result == 0) {
                return sortById($a1, $a2, $order);
            }
            return $order == "descending" ? -$result : $result;
        }); break;
    case 'result':
        usort($studentsArray, function ($a1, $a2) use ($order) {
            if ($a1['result'] == $a2['result']) {
                return sortById($a1, $a2, $order);
            }
            return ($order == "descending" ^ $result = $a1['result'] < $a2['result']) ? -1 : 1;
        }); break;
}

$output = "<table><thead><tr><th>Id</th><th>Username</th><th>Email</th><th>Type</th><th>Result</th></tr></thead>";

foreach($studentsArray as $student) {
    $id = $student['id'];
    $username = htmlspecialchars($student['username']);
    $email = htmlspecialchars($student['email']);
    $type = htmlspecialchars($student['type']);
    $result = htmlspecialchars($student['result']);
    $output .= "<tr><td>$id</td><td>$username</td><td>$email</td><td>$type</td><td>$result</td></tr>";
}
$output .= "</table>";
echo $output;

function sortById($a1, $a2)
{
    $order = $_GET['order'];
    return ($order == "descending" ^ $a1['id'] < $a2['id']) ? -1 : 1;
}
