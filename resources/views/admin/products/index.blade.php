<h1>商品一覧（管理）</h1>

<table>
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>価格</th>
        <th>操作</th>
    </tr>

    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}円</td>
            <td>
                <form method="POST" action="/admin/products/{{ $product->id }}/delete">
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>