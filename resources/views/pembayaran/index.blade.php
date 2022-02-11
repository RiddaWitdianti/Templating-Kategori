{{-- ini pembayaran index --}}
<h1>Data Pembayaran</h1>
<a href="{{ route('pembayaran.create')}}">TAMBAH DATA</a>
<table>
    <thead>
        <tr>
            <th>Transaksi Id</th>
            <th>Jumlah Bayar</th>
            <th>Metode Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembayaran as $item)
        <tr>
            <td>{{$item->transaksi ? $item->transaksi->nomor : '-'}}</td>
            <td>{{$item->jumlah_bayar}}</td>
            <td>{{$item->metode_bayar}}</td>
            <td>{{$item->status}}</td>

            <td><button><a href="{{ route('pembayaran.edit', $item->id) }}">
                Edit</a></button>
            </td>

            <td>
                <form onsubmit="return confirm('Delete this pembayaran permanently?')"
                    action="{{ route('pembayaran.destroy',$item->id) }}" method="POST">
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

{!! $pembayaran->links() !!}
{{-- {{ print_r($pembayaran->toArray())}} --}}
