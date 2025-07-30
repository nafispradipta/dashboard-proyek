<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Color</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Test Warna (Updated)</h1>
        
        <div class="space-y-4">
            <div class="p-4 bg-purple-100 text-purple-800 rounded">
                Ini adalah bg-purple-100 text-purple-800 (Status: Planning)
            </div>
            
            <div class="p-4 bg-blue-100 text-blue-800 rounded">
                Ini adalah bg-blue-100 text-blue-800 (Status: Development)
            </div>
            
            <div class="p-4 bg-yellow-100 text-yellow-800 rounded">
                Ini adalah bg-yellow-100 text-yellow-800 (Status: Testing)
            </div>
            
            <div class="p-4 bg-green-100 text-green-800 rounded">
                Ini adalah bg-green-100 text-green-800 (Status: Completed)
            </div>
            
            <div class="p-4 bg-red-100 text-red-800 rounded">
                Ini adalah bg-red-100 text-red-800 (Status: Maintenance)
            </div>
            
            <div class="mt-8 p-4 border border-gray-300 rounded">
                <h2 class="text-lg font-semibold mb-2">Status Proyek</h2>
                <span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 rounded-full bg-purple-100 text-purple-800">
                    Planning
                </span>
            </div>
        </div>
    </div>
</body>
</html>