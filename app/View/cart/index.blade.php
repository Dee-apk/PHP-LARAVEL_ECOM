@foreach ($cartItems as $item)
    <div>
        <h4>{{ $item->product->name }}</h4>
        <p>Quantity: {{ $item->quantity }}</p>
        <p>Price: {{ $item->product->price }}</p>
    </div>
@endforeach
<a href="{{ route('cart.checkout') }}">Proceed to Checkout</a>
