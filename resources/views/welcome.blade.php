<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Header Section -->
    <div class="header bg-orange-200 text-center py-4">
        <img src="{{ asset('images/lg.png') }}" class="h-60 w-64 mx-auto" alt="Retail Store Logo">
        <p class="text-lg text-gray-600 mt-4">
            Plan your stock with precision and keep your shelves stocked at the right time.
        </p>
        <div class="buttons mt-6">
            <a href="/login" 
               class="bg-green-700 text-white py-2 px-6 rounded-md hover:bg-green-600 transition duration-300 inline-block mx-2">
                Login 
            </a>
            <a href="/register" 
               class="bg-green-700 text-white py-2 px-6 rounded-md hover:bg-green-600 transition duration-300 inline-block mx-2">
                Register
            </a>
        </div>
    </div>

    <!-- Key Features Section -->
    <div class="main-container bg-blue-100 text-center py-12 px-4">
        <h2 class="text-2xl font-bold mb-8">Key Features</h2>
        <div class="features-container flex flex-wrap justify-center gap-6 max-w-5xl mx-auto">
            <div class="feature-box bg-green-700 text-white rounded-lg shadow-lg p-6 hover:translate-y-[-5px] transition-transform duration-300 min-w-[280px] max-w-[350px]">
                <h3 class="text-xl font-bold mb-2">Track Performance</h3>
                <p class="text-orange-100 text-base">
                    Monitor sales and trending products in real-time to maximize efficiency.
                </p>
            </div>
            <div class="feature-box bg-green-700 text-white rounded-lg shadow-lg p-6 hover:translate-y-[-5px] transition-transform duration-300 min-w-[280px] max-w-[350px]">
                <h3 class="text-xl font-bold mb-2">Discover Trends</h3>
                <p class="text-orange-100 text-base">
                    Identify seasonal trends and plan your inventory to meet customer demand.
                </p>
            </div>
            <div class="feature-box bg-green-700 text-white rounded-lg shadow-lg p-6 hover:translate-y-[-5px] transition-transform duration-300 min-w-[280px] max-w-[350px]">
                <h3 class="text-xl font-bold mb-2">Comprehensive Insights</h3>
                <p class="text-orange-100 text-base">
                    Get detailed reports and actionable insights for smarter inventory decisions.
                </p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white text-center py-4 text-sm mt-6">
        &copy; 2024 Retail Inventory Dashboard. All rights reserved.
    </footer>
</body>
</html>
