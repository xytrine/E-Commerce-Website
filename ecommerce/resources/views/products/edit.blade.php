<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Name: </label>
    <input type="text" id="name" name="name" required 
           value="{{ old('name', $product->name ?? '') }}"
           class="@error('name') is-invalid @enderror" 
           aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}">
    @error('name')
        <div style="color:#e3342f;font-size:0.9rem">{{ $message }}</div>
    @enderror

    <label for="description">Description: </label>
    <input type="text" id="description" name="description" required
           value="{{ old('description', $product->description ?? '') }}"
           class="@error('description') is-invalid @enderror"
           aria-invalid="{{ $errors->has('description') ? 'true' : 'false' }}">
    @error('description')
        <div style="color:#e3342f;font-size:0.9rem">{{ $message }}</div>
    @enderror

    <label for="price">Price: </label>
    <input type="text" id="price" name="price" required 
           value="{{ old('price', $product->price ?? '') }}"
           class="@error('price') is-invalid @enderror" 
           aria-invalid="{{ $errors->has('price') ? 'true' : 'false' }}">
    @error('price')
        <div style="color:#e3342f;font-size:0.9rem">{{ $message }}</div>
    @enderror

    <label for="image">Image: </label>
    <input type="file" id="image" name="image"
           class="@error('image') is-invalid @enderror" 
           aria-invalid="{{ $errors->has('image') ? 'true' : 'false' }}">
    @error('image')
        <div style="color:#e3342f;font-size:0.9rem">{{ $message }}</div>
    @enderror

    <button type="submit">Submit</button>
</form>

</body>
</html>
