<?php
    include 'Utilities/KobleTilDB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Se Dyr | Dyrregister</title>
</head>
<body class="bg-gray-900 text-white">
    <header>
        <nav>
            <?php include 'Components/navbar.php'; ?>
        </nav>
    </header>
    <main class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-center mb-6">Se alle dine dyr</h1>

        <?php
            $sql_dyr = "SELECT * FROM `kjaeledyr`";
            $stmt = $conn->prepare($sql_dyr);
            $stmt->execute();
            $rader = $stmt->fetchAll();

            if (count($rader) === 0) {
                echo "<p class='text-center text-xl text-gray-400 mt-4'>Ingen dyr funnet! Prøv å legg til et!</p>";
            } else {
        ?>
        <div class="overflow-x-auto">
            <table class="w-full max-w-4xl mx-auto border border-gray-700 rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-gray-300">
                    <tr>
                        <th class="py-3 px-4 text-left">Type</th>
                        <th class="py-3 px-4 text-left">Rase</th>
                        <th class="py-3 px-4 text-left">Navn</th>
                        <th class="py-3 px-4 text-center">Handling</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700">
                    <?php
                        foreach ($rader as $rad) {
                            echo "<tr class='border-b border-gray-600 hover:bg-gray-600 transition'>";
                            echo "<td class='py-3 px-4'>" . htmlspecialchars($rad['typeDyr']) . "</td>";
                            echo "<td class='py-3 px-4'>" . htmlspecialchars($rad['rase']) . "</td>";
                            echo "<td class='py-3 px-4'>" . htmlspecialchars($rad['navn']) . "</td>";
                            echo "<td class='py-3 px-4 text-center'>
                                    <form action='Utilities/SlettDyr.php' method='POST' onsubmit='return confirm(\"Er du sikker på at du vil slette " . htmlspecialchars($rad['navn']) . "?\");'>
                                        <input type='hidden' name='dyr_id' value='" . $rad['id'] . "'>
                                        <button type='submit' class='bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-md'>Slett</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </main>
</body>
</html>
