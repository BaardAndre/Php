<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velkommen!</title>
</head>
<body>
    
</body>
</html>

<?php
session_start();
if (!isset($_SESSION["brukernavn"])) {
    header("Location: index.php");
    exit();
}
echo "<h1>Velkommen, " . $_SESSION["brukernavn"] . "!</h1>";
?>