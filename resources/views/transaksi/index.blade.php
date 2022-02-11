{{-- ini transaksi index --}}
<h1>Data Transaksi</h1>
<a href="{{ route('transaksi.create')}}">TAMBAH DATA</a>
<table>
    <thead>
        <tr>
            <th>User Id</th>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $item)
        <tr>
            <td>{{$item->user ? $item->user->name : '-'}}</td>
            <td>{{$item->nomor}}</td>
            <td>{{$item->tanggal}}</td>
            <td>{{$item->total_harga}}</td>
            <td>{{$item->status}}</td>

            <td><button><a href="{{ route('transaksi.edit', $item->id) }}">
                Edit</a></button>
            </td>

            <td>
                <form onsubmit="return confirm('Delete this transaksi permanently?')"
                    action="{{ route('transaksi.destroy',$item->id) }}" method="POST">
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

{!! $transaksi->links() !!}
{{-- {{ print_r($transaksi->toArray())}} --}}
