<!DOCTYPE html>
<html>
<head>
    <title>Amazon Product Search</title>
</head>
<body>
    <h1>Amazon Product Search</h1>
    <form method="GET" action="/search">
        <input type="text" name="query" placeholder="Search for products...">
        <button type="submit">Search</button>
    </form>
    @if(isset($products))
        @if(isset($products['results']))
            <h2>Search Results:</h2>
            <ul>
                @foreach($products['results'] as $product)
                    <li>
                        <h3>{{ $product['title'] }}</h3>
                        <p>Price: {{ $product['price']['current_price'] }}</p>
                        <p>{{ $product['description'] }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No results found.</p>
        @endif
    @endif
</body>
</html>
