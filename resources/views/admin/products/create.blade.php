<h1>商品登録</h1>

<form method="POST" action="/admin/products">
    @csrf

    <div>
        <label>商品名</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>価格</label>
        <input type="number" name="price">
    </div>

    <div>
        <label>説明</label>
        <textarea name="description"></textarea>
    </div>

    <button type="submit">登録</button>
</form>