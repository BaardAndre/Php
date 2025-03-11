<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form method="post" action="login.php" class="space-y-6">
        <div class="space-y-2">
            <label for="brukernavn" class="block text-sm font-medium text-neutral-100">Brukernavn</label>
            <input type="text" id="brukernavn" name="brukernavn" required 
                class="w-full px-4 py-2 border text-white bg-gray-700 border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        </div>

        <div class="space-y-2">
            <label for="passord" class="block text-sm font-medium text-neutral-100">Passord</label>
            <input type="password" id="passord" name="passord" required 
                class="w-full px-4 py-2 border text-white bg-gray-700 border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        </div>

        <button type="submit" 
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors font-medium">
            Logg inn
        </button>
    </form>
</body>
</html>