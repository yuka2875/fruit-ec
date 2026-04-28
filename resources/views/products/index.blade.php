<h1>商品一覧</h1>

<div class="product-list">
    @foreach ($products as $product)
        <div class="product-list__item">
            <a href="/products/{{ $product->id }}">
                <h2 class="product-list__name">{{ $product->name }}</h2>
            </a>
            <p class="product-list__price">{{ $product->price }}円</p>

            <form method="POST" action="/cart/add">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit">カートに追加</button>
            </form>
        </div>
    @endforeach
</div>