<?php
// Koble til databasen
session_start();
$server = "localhost";
$database = "bilregister";
$dbUser = "root";
$dbPassword = "";

// Kobler til databasen
try {
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}

// Brukere dataen sendt fra index.php til å logge inn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $innsendtNavn = $_POST['brukernavn'];
    $innsendtPassord = $_POST['passord'];

    $sql = "SELECT * FROM brukere WHERE brukernavn = ? AND passord = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$innsendtNavn, $innsendtPassord]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['innlogging'] = true;
        header('Location: index.php');
        exit;
    } else {
        // Feilmelding for mislykket innlogging
        $errorMsg = "Bruker $innsendtNavn kunne ikke logge inn med passord $innsendtPassord.";
        
        // Insert failed login attempt into logg table
        $loggSql = "INSERT INTO logg (brukernavn, passord, errorkode) VALUES (?, ?, ?)";
        $loggStmt = $conn->prepare($loggSql);
        $loggStmt->execute([$innsendtNavn, $innsendtPassord, $errorMsg]);

        // Eventuelt vis feilmeldingen på nettsiden (sikkerhetsrisiko om passord eksponeres)
        // echo $errorMsg;

        header('Location: index.php');
        exit;
    }
}
?>
