<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="svar" placeholder="svar">
        <input type="submit">
        <?php
            session_start();
 
            if (!isset($_SESSION['antallSpormsal'])) {
                $_SESSION['antallSpormsal'] = 0;
                $_SESSION['riktige'] = 0;
            }
 
            $antallSpormsal = $_SESSION['antallSpormsal'];
            $riktige = $_SESSION['riktige'];
 
            $sporsmal = array("Hva står HTML for?", "Hva står CSS for?", "Hva er Nuxt?", "Hva står WWW for?", "Hva står PHP for?", "Hva står JS for?", "Hva står TS for?", "Hva er Visual Studio Code?");
            $svar = array("HyperText Markup Language", "Cascading Style Sheets", "Rammeverk", "World Wide Web", "PHP Hypertext Preprocessor", "JavaScript", "TypeScript", "En IDE");
 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $brukerSvar = htmlspecialchars($_POST['svar']);
                if (strcasecmp($brukerSvar, $svar[$antallSpormsal]) == 0) {
                    echo "Riktig svar <br>";
                    $riktige++;
                } else {
                    echo "Feil svar <br>";
                }
                $antallSpormsal++;
                $_SESSION['antallSpormsal'] = $antallSpormsal;
                $_SESSION['riktige'] = $riktige;
            }
 
            if ($antallSpormsal < count($sporsmal)) {
                echo $sporsmal[$antallSpormsal];
            } else {
                echo "Ingen flere spørsmål. Du fikk $riktige av 10 riktige svar.";
                session_destroy();
            }
        ?>
    </form>
</body>
</html>
 