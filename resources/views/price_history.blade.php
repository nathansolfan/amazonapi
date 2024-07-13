<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price History</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-4">Price History</h1>
        @if($priceHistories->isEmpty())
            <p>No price history available for this product.</p>
        @else
            <ul>
                @foreach($priceHistories as $history)
                    <li class="bg-white p-4 rounded shadow mb-4">
                        <p>Date: {{ $history->recorded_at }}</p>
                        <p>Price: ${{ $history->price }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
