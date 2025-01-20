@foreach ($cartItems as $item)
    <div>
        <h4>{{ $item->product->name }}</h4>
        <p>Price: {{ $item->product->price }}</p>
        <form method="POST" action="{{ route('cart.update', $item->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" name="action" value="decrease">-</button>
            <input type="number" name="quantity" value="{{ $item->quantity }}" readonly>
            <button type="submit" name="action" value="increase">+</button>
        </form>
        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Remove</button>
        </form>
    </div>
@endforeach

<a href="{{ route('cart.checkout') }}">Proceed to Checkout</a>
