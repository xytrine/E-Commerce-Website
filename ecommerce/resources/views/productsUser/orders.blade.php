{{-- resources/views/products/user/orders.blade.php --}}
@if(isset($orders) && count($orders) > 0)
    @foreach($orders as $order)
        <div>
            <h3>Order {{ $order->id }}</h3>
            <p>Date: {{ $order->created_at->format('F j, Y') }}</p>
            <h4>Items:</h4>
            <ul>
                @php
                    $items = is_string($order->items) ? json_decode($order->items, true) : $order->items;
                @endphp

                @if(is_array($items))
                    @foreach($items as $item)
                        <li>
                            {{ $item['name'] ?? 'Unnamed Item' }} –
                            ₱{{ $item['price'] ?? '0.00' }} ×
                            {{ $item['quantity'] ?? 1 }}
                        </li>
                    @endforeach
                @else
                    <li>Unable to display items — invalid format.</li>
                @endif
            </ul>
        </div>
    @endforeach
@else
    <p>No orders found.</p>
@endif