{{-- ini produk index --}}
<h1>Data Produk</h1>
<a href="{{ route('produk.create')}}">TAMBAH DATA</a>
<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Photo</th>
            <th>Deskripsi</th>
            <th>Jenis</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $item)
        <tr>
            <td>{{$item->kode}}</td>
            <td>{{$item->kategori ? $item->kategori->nama_kategori : '-'}}</td>
            <td>{{$item->nama}}</td>
            {{-- <td><img src="{{asset('storage/image/'.$item->photo)}}" style="max-width: 50px"></td> --}}
            <td><img src="{{ route('cloud.image',['nama'=>$item->photo]) }}" style="max-width: 50px" img></td>
            {{-- width="100px" height="100px" --}}
            <td>{{$item->deskripsi}}</td>
            <td>{{$item->jenis}}</td>
            <td>{{$item->stok}}</td>
            <td>{{$item->harga}}</td>


            <td><button><a href="{{ route('produk.edit', $item->id) }}">
                Edit</a></button>
            </td>

            <td>
                <form onsubmit="return confirm('Delete this user permanently?')"
                    action="{{ route('produk.destroy',$item->id) }}" method="POST">
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

{!! $produk->links() !!}
{{-- {{ print_r($produk->toArray())}} --}}
