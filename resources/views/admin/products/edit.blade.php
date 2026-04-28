<h1>商品編集</h1>

<form method="POST" action="/admin/products/{{ $product->id }}">
    @csrf

    <div>
        <label>商品名</label>
        <input type="text" name="name" value="{{ $product->name }}">
    </div>

    <div>
        <label>価格</label>
        <input type="number" name="price" value="{{ $product->price }}">
    </div>

    <div>
        <label>説明</label>
        <textarea name="description">{{ $product->description }}</textarea>
    </div>

    <button type="submit">更新</button>
</form>