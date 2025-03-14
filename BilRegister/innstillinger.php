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

        <div class="text-white text-center mx-auto my-auto flex flex-col items-center justify-center p-5 bg-gray-800 rounded-xl">
            <p class="text-2xl mb-[1rem]">Logg ut</p>
            <div class="w-[10rem] h-10 bg-red-600 rounded-full text-white flex items-center justify-center">
                <?php
                    include 'components/loggUtModal.php';
                ?>
            </div>
        </div>

    </main>
</body>
</html>