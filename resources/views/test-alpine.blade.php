<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Alpine</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    </head>
<body class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Test Alpine.js</h1>
        <div x-data="{ count: 0 }" class="space-y-3">
            <div class="text-gray-700">Counter: <span x-text="count" class="font-semibold"></span></div>
            <div class="space-x-2">
                <button class="px-3 py-1 text-white bg-blue-600 rounded" @click="count++">Tambah</button>
                <button class="px-3 py-1 text-white bg-gray-600 rounded" @click="count = 0">Reset</button>
            </div>
            <div x-cloak x-show="count > 3" class="p-3 rounded bg-green-100 text-green-700">Mantap! Count lebih dari 3.</div>
        </div>
    </div>
</body>
</html>

