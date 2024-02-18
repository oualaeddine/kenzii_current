<?php
$servername = "localhost";
$username = "kseltech_codes_usr";
$password = "%-IcXyDXV2vA";
$dbname = "kseltech_codes_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$code = $_GET['code'];
if ($code == null) {
    echo json_encode([
        'result' => 'no',
    ]);
}


$query = "SELECT * FROM erazer_codes WHERE (erazer_codes.code LIKE '$code')";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $times = $row['times_used'] + 1;
        $id = $row['id'];
        $sql = "UPDATE erazer_codes SET erazer_codes.times_used=$times WHERE id=$id";
        $conn->query($sql);
        $conn->close();
        break;
    }
    echo json_encode([
        'result' => 'ok',
        'type' => $row['type'],
        'times' => $row['times_used']
    ]);
} else {
    $conn->close();
    echo json_encode([
        'result' => 'no',
    ]);
}


