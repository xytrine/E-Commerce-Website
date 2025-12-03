<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <div>
    <h1>To-Do List</h1>
    <a href="{{ route('products.create') }}">Add new product</a>
    <br>
    @foreach ($products as $product)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
        <h2>{{$product->name}}</h2>
        <p>{{$product->description}}</p>
        <p>{{$product->price}} ₱</p>

    <form action="{{ route ('products.destroy', $product->id)}}" method="POST">
         <a href="{{ route('products.edit', $product->id)}}">Edit Product</a>
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
    </form>
    </div>
     @endforeach
</body>
</html>