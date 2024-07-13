<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Product Search</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-4">Amazon Product Search</h1>
            <form method="GET" action="/search" class="flex justify-center">
                <input type="text" name="query" placeholder="Search for products..." class="w-1/2 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600 transition duration-300">Search</button>
            </form>
        </div>
        @if(!empty($products))
            <h2 class="text-2xl font-semibold mb-6">Search Results:</h2>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <li class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold mb-2">{{ $product['product_title'] }}</h3>
                        <p class="text-gray-700 mb-4">Price: {{ $product['product_price'] }}</p>
                        <a href="{{ $product['product_url'] }}" class="text-blue-500 hover:underline">View on Amazon</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center text-gray-600">No results found.</p>
        @endif
    </div>
</body>
</html>
