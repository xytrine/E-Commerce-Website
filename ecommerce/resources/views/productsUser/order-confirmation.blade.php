<h1>Order Confirmed!</h1>
<a href="{{ route('orders.index') }}">View My Orders</a>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if($latestOrder)
    <div>
        <h3>Order #{{ $latestOrder->id }}</h3>
        <p>Status: {{ ucfirst($latestOrder->status) }}</p>
        <p>Total: ₱{{ $latestOrder->total }}</p>
    </div>
@else
    <p>No recent orders found.</p>
@endif

