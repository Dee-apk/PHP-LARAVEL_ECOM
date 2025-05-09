@foreach ($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price }}</p>
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
@endforeach
