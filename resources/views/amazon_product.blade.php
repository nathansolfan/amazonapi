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
    @if(!empty($products))
        <h2>Search Results:</h2>
        <ul>
            @foreach($products as $product)
                <li>
                    <h3>{{ $product['product_title'] }}</h3>
                    <p>Price: {{ $product['product_price'] }}</p>
                    <a href="{{ $product['product_url'] }}">View on Amazon</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
</body>
</html>
