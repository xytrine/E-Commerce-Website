<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name">
        
        <label for="description">Description</label>
        <input type="text" name="description" id="description">

        <label for="price">Price</label>
        <input type="number" name="price" id="price">

        <label for="image"></label>
        <input type="file" id="image" name="image">

        <button type="submit">Submit</button>

    </form>
</body>
</html>