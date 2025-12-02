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
    <a href="{{ route('products.create') }}">Add new task</a>

    @foreach ($products as $product)
        <h2>Product name: {{$product->name}}</h2>
        <p>Description: {{$product->description}}</p>
        <p>Price: {{$product->price}}</p>
        <p>Image: {{$product->image}}</p>

        <a href="{{ route('products.edit', $product->id)}}">Edit Task</a>

    <form action="{{ route ('products.destroy', $product->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
    </form>
    @endforeach
    </div>
    
    @endforeach
</body>
</html>