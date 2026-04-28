<h1>注文一覧</h1>

<table>
    <tr>
        <th>ID</th>
        <th>ユーザーID</th>
        <th>合計金額</th>
    </tr>

    @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->total_price }}円</td>
        </tr>
    @endforeach
</table>