<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dyrregister</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header>
        <nav>
            <?php include 'Utilities/KobleTilDB.php'; ?>
            <?php include 'Components/navbar.php'; ?>
        </nav>
    </header>
    <div>
        <h1 class="text-5xl text-center mt-6 mb-4">Velkommen til dyrregisteret</h1>
        <p class="text-center">Her kan du registrere dine kjæledyr og holde oversikt over dem.</p>
    </div>
</body>
</html>