<h1>Your Cart</h1>

@if(empty($cart))
    <p>Your cart is empty.</p>
@else
    @foreach($cart as $productId => $item)
        <div style="margin-bottom: 20px;">
            <h3>{{ $item['name'] }}</h3>
            <p>Price: ₱{{ $item['price'] }}</p>
            <p>Quantity: {{ $item['quantity'] }}</p>

            <img src="{{ asset('storage/' . $item['image']) }}" width="120">
        </div>
      <form action="{{ route('cart.destroy', $productId) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">
                Delete
            </button>
        </form>
    </div>
    @endforeach
    <br>
     <h2>Total: ₱{{ $total }}</h2>

     <form action="{{ route('cart.checkout') }}" method="POST">
    @csrf
    <button type="submit" style="padding: 10px 20px; background: green; color: white; border: none;">
        Checkout
    </button>

</form>

@endif