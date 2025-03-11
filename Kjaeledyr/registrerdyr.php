<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registrer Dyr | Dyrregister</title>
</head>
<body class="bg-gray-900 text-white">
    <header>
        <nav>
            <?php include 'Utilities/KobleTilDB.php'; ?>
            <?php include 'Components/navbar.php'; ?>
        </nav>
    </header>
    <main class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold text-center mb-6">Registrer Dyr</h1>
        <form action="" method="POST" class="text-center items-center">
            <label for="typeDyr">Type</label>
            <input class="bg-gray-700 rounded-2xl px-2 py-1 outline-none mb-2" type="text" name="typeDyr" id="typeDyr" required><br>
            <label for="rase">Rase</label>
            <input class="bg-gray-700 rounded-2xl px-2 py-1 outline-none mb-2" type="text" name="rase" id="rase" required><br>
            <label for="navn">Navn</label>
            <input class="bg-gray-700 rounded-2xl px-2 py-1 outline-none mb-2" type="text" name="navn" id="navn" required><br>
            <button class="bg-blue-600 px-2 py-1 text-xl rounded-xl" type="submit">Legg til</button>
        </form>

        <?php
        // Sjekk om skjemaet har blitt sendt inn
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include 'Utilities/KobleTilDB.php'; // Sikre at databaseforbindelsen er inkludert
            
            // Hent innsendte verdier og filtrer dem
            $innsendtType = htmlspecialchars($_POST['typeDyr']);  
            $innsendtRase = htmlspecialchars($_POST['rase']);  
            $innsendtNavn = htmlspecialchars($_POST['navn']);  
            
            // Eier ID må defineres (kan være en session-verdi)
            $eierId = 1; // Endre dette dynamisk etter bruker
            $regDato = date("Y-m-d H:i:s"); // Nåværende tidspunkt
            
            try {
                // Kjør en sikker SQL-spørring med prepared statements
                $sql = "INSERT INTO kjaeledyr (typeDyr, rase, navn, eierId, regDato) 
                        VALUES (:typeDyr, :rase, :navn, :eierId, :regDato)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':typeDyr', $innsendtType);
                $stmt->bindParam(':rase', $innsendtRase);
                $stmt->bindParam(':navn', $innsendtNavn);
                $stmt->bindParam(':eierId', $eierId);
                $stmt->bindParam(':regDato', $regDato);
                
                $stmt->execute();

                header('Location: lesdyr.php');
                exit(); // Stopp videre kjøring
            } catch (PDOException $e) {
                echo "<p class='text-red-500 text-center'>Feil: " . $e->getMessage() . "</p>";
            }
        }
        ?>
    </main>
</body>
</html>
