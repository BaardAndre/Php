<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilregister | Logg inn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <main class="w-full h-screen bg-gray-900 flex flex-col">

        <nav class="w-full">
            <?php include 'components/nav.php'; ?>
        </nav>
        
        <div class="flex flex-grow justify-center items-center">
            <div class="bg-gray-800 px-8 py-10 rounded-xl shadow-md w-full max-w-md space-y-6">
                <?php
                session_start();
                
                if (isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true) {
                    echo '<h1 class="text-4xl font-bold text-center text-white">Logget inn!</h1>';
                    include 'components/loggUtModal.php';
                } else {
                    echo '<h1 class="text-4xl font-bold text-center text-white">Logg inn</h1>';
                    include 'components/loggInnModal.php';
                }
                
                ?>

            </div>
        </div>
    </main>
</body>
</html>