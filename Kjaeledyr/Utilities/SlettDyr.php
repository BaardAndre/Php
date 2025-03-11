<?php
include 'KobleTilDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dyr_id'])) {
    $dyr_id = intval($_POST['dyr_id']);

    $sql_slett = "DELETE FROM kjaeledyr WHERE id = :dyr_id";
    $stmt = $conn->prepare($sql_slett);
    $stmt->bindParam(':dyr_id', $dyr_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Dyret ble slettet.";
    } else {
        echo "Feil ved sletting.";
    }
}

// Send brukeren tilbake til hovedsiden
header("Location: ../lesdyr.php");
exit();