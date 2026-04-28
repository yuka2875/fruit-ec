<h1>購入確認</h1>

@if (count($items) > 0)
    @foreach ($items as $item)
        <div>
            {{ $item->product->name }} /
            数量：{{ $item->quantity }}
        </div>
    @endforeach

    <form method="POST" action="/order/complete">
        @csrf
        <button type="submit">購入する</button>
    </form>
@else
    <p>カートは空です</p>
@endif