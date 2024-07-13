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
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-8">Amazon Product Search</h1>
            <form method="GET" action="/search" class="mb-8">
                <input type="text" name="query" placeholder="Search for products..." class="px-4 py-2 border rounded-lg">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Search</button>
            </form>
            @if(!empty($products))
                <h2 class="text-2xl font-semibold mb-4">Search Results:</h2>
                <ul class="space-y-4">
                    @foreach($products as $product)
                        <li class="bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold">{{ $product['product_title'] }}</h3>
                            <p class="text-lg">Price: {{ $product['product_price'] }}</p>
                            <a href="{{ $product['product_url'] }}" class="text-blue-500 hover:underline">View on Amazon</a>
                            <a href="/products/{{ $product['asin'] }}/price-history" class="ml-4 text-green-500 hover:underline">View Price History</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-red-500">No results found.</p>
            @endif
        </div>
    </div>
</body>
</html>
