<?php
    session_start();
    if (!isset($_SESSION['innlogging']) || $_SESSION['innlogging'] !== true) {
        header('Location: index.php');
    }
?>