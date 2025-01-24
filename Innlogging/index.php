<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <h1>Log In</h1>

    <?php
    session_start();
    $brukere = array(
        'Admin' => 'Test123',
        'Bruker1' => 'Passord1',
        'Bruker2' => 'Passord2'
    );

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $brukernavn = $_POST["brukernavn"];
        $passord = $_POST["passord"];

        if (array_key_exists($brukernavn, $brukere) && $brukere[$brukernavn] == $passord) {
            $_SESSION["brukernavn"] = $brukernavn;
            header("Location: velkommen.php");
        } else {
            echo "<p style='color: red;'>Feil brukernavn eller passord.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="brukernavn">Brukernavn:</label>
        <input type="text" id="brukernavn" name="brukernavn" required><br>

        <label for="passord">Passord:</label>
        <input type="password" id="passord" name="passord" required><br>

        <input type="submit" value="Logg inn">
    </form>
</body>
</html>