<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITI Blog</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
    <header class="bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow-lg">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">ITI Blog</h1>
            <div class="font-medium">All Posts</div>
        </div>
    </header>
    
    <main class="container mx-auto px-4 py-8">
        {{ $slot }}
    </main>
</body>
</html>