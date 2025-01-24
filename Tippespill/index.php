<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tippespill</title>
</head>
<body>
    <main>
    <h1>Tippespill</h1>
    <form action="" method="GET">
        <label for="tall">Tipp et tall mellom 1 og 10:</label>
        <input type="number" name="tall" id="tall" min="1" max="10" required><br>
        <button type="submit">Tipp</button>
    </main>

    <?php
    if (isset($_GET['tall'])) {
        $tall = $_GET['tall'];
        $riktigTall = rand(1, 10);
        if ($tall == $riktigTall) {
            echo "<p>Gratulerer! Du tippet riktig tall!</p>";
        } else {
            echo "<p>Du tippet feil tall. Prøv igjen!</p>";
        }
    }
    ?>
</body>
</html>