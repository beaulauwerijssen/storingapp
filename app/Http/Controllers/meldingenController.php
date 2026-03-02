<?php
$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$overige_info = $_POST['overige_info'];

$prioriteit = isset($_POST['prioriteit']) ? 1 : 0;
echo $attractie . " / " . $type . " / "  . $prioriteit . " / " . $capaciteit . " / " . $melder . " / " . $overige_info;
require_once '../../../config/conn.php';

$query = "INSERT INTO meldingen 
          (attractie, type, prioriteit, capaciteit, melder, overige_info) 
          VALUES 
          (:attractie, :type, :prioriteit, :capaciteit, :melder, :overige_info)";

$statement = $conn->prepare($query);

$statement->execute([
    ':attractie' => $attractie,
    ':type' => $type,
    ':prioriteit' => $prioriteit,
    ':capaciteit' => $capaciteit,
    ':melder' => $melder,
    ':overige_info' => $overige_info
]);

header('Location: ../../../resources/views/meldingen/index.php');