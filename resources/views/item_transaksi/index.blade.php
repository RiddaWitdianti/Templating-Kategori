{{-- ini item transaksi index --}}
<h1>Data Item Transaksi</h1>
<a href="{{ route('item_transaksi.create')}}">TAMBAH DATA</a>
<table>
    <thead>
        <tr>
            <th>Transaksi Id</th>
            <th>Produk Id</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($item_transaksi as $item)
        <tr>
            <td>{{$item->transaksi ? $item->transaksi->nomor : '-'}}</td>
            <td>{{$item->produk ? $item->produk->nama : '-'}}</td>
            <td>{{$item->jumlah}}</td>
            <td>{{$item->harga}}</td>
            <td>{{$item->total_harga}}</td>
            <td>{{$item->status}}</td>

            <td><button><a href="{{ route('item_transaksi.edit', $item->id) }}">
                Edit</a></button>
            </td>

            <td>
                <form onsubmit="return confirm('Delete this item_transaksi permanently?')"
                    action="{{ route('item_transaksi.destroy',$item->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="DELETE">
                </form>
            </td>
        </tr>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $item_transaksi->links() !!}
{{-- {{ print_r($item_transaksi->toArray())}} --}}
