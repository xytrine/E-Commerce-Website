<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>Most Purchased Items!</h1>
        <a href="{{ route('cart.view') }}">View Cart</a><br>
    @foreach ($products as $product)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
        <h2>{{$product->name}}</h2>
        <p>{{$product->description}}</p>
        <p>{{$product->price}} ₱</p>

    <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit">Add to Cart</button>
    </form>

    @endforeach

    
</body>
</html>