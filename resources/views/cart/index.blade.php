<h1>カート</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if (count($items) > 0)
    @foreach ($items as $item)
      <div>
          {{ $item->product->name }}

          <form method="POST" action="/cart/update">
              @csrf
              <input type="hidden" name="item_id" value="{{ $item->id }}">
              <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
              <button type="submit">更新</button>
          </form>

          <form method="POST" action="/cart/delete">
              @csrf
              <input type="hidden" name="item_id" value="{{ $item->id }}">
              <button type="submit">削除</button>
          </form>
      </div>
    @endforeach
    <form method="GET" action="/order/confirm">
        <button type="submit">購入へ進む</button>
    </form>
@else
    <p>カートは空です</p>
@endif