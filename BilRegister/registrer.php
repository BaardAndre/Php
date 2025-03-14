<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilregister | Registrer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <?php
        include 'components/sjekkInnlogging.php';
    ?>

    <main class="w-full h-screen bg-gray-900 flex flex-col">
        <nav class="w-full">
                <?php include 'components/nav.php'; ?>
        </nav>
    <?php
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
        $sql = "SELECT biler.*, eiere.fornavn, eiere.etternavn, eiere.epost FROM biler LEFT JOIN eiere ON biler.Fnr = eiere.Fnr ORDER BY biler.Type ASC;";

        // Gjør spørringen klar
        $stmt = $conn->prepare($sql);
    
        // Kjør spørringen
        $stmt->execute();

        $rader = $stmt->fetchAll(); // Hent alle radene fra tabellen

        echo "<div class='w-full'>";
        echo "<table class='min-w-full bg-gray-800 text-white border border-gray-700 rounded-lg'>";
        echo "<thead>";
        echo "<tr class='text-left text-gray-300'>";
        echo "<th class='py-3 px-6 border-b border-gray-700'>Biltype</th>";
        echo "<th class='py-3 px-6 border-b border-gray-700'>Merke</th>";
        echo "<th class='py-3 px-6 border-b border-gray-700'>Farge</th>";
        echo "<th class='py-3 px-6 border-b border-gray-700'>RegNr</th>";
        echo "<th class='py-3 px-6 border-b border-gray-700'>Fornavn</th>";
        echo "<th class='py-3 px-6 border-b border-gray-700'>Etternavn</th>";
        echo "<th class='py-3 px-6 border-b border-gray-700'>E-post</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        for ($i = 0; $i < count($rader); $i++) {
            $rowColor = $i % 2 == 0 ? "bg-gray-700" : "bg-gray-600";
            echo "<tr class='{$rowColor} hover:bg-gray-500 transition duration-200'>";
            echo "<td class='py-3 px-6 border-b border-gray-700'>" . htmlspecialchars($rader[$i]['Type']) . "</td>";
            echo "<td class='py-3 px-6 border-b border-gray-700'>" . htmlspecialchars($rader[$i]['Merke']) . "</td>";
            echo "<td class='py-3 px-6 border-b border-gray-700'>" . htmlspecialchars($rader[$i]['Farge']) . "</td>";
            echo "<td class='py-3 px-6 border-b border-gray-700'>" . htmlspecialchars($rader[$i]['RegNr']) . "</td>";
            echo "<td class='py-3 px-6 border-b border-gray-700'>" . htmlspecialchars($rader[$i]['fornavn']) . "</td>";
            echo "<td class='py-3 px-6 border-b border-gray-700'>" . htmlspecialchars($rader[$i]['etternavn']) . "</td>";
            echo "<td class='py-3 px-6 border-b border-gray-700'>" . htmlspecialchars($rader[$i]['epost']) . "</td>";
            echo "</tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        ?>
    </main>
</body>
</html>