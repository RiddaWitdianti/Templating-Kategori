
<h1>Form Tambah Data Produk</h1>
<form method="post" action="{{route('produk.store')}}" enctype="multipart/form-data">
    @csrf
    <label for="kode">Kode Produk</label>
    <input type="text" name="kode"><br>
    @error('kode')
    <p>{{ $message}}</p>
    @enderror

    <label for="kategori">Kategori</label>
    <select name="kategori_id" id="kategori_id" class="form-control
    @error('kategori_id') is-invalid @enderror">
        <option value="">-Pilih Kategori-</option>
        @foreach ($kategori as $item)
            <option value="{{ $item->id }}"
                @if ($item->id == old('kategori_id'))
                    selected
                @endif
            >

            {{ $item->nama_kategori }}
            </option>
        @endforeach
    </select><br>

    <label for="nama">Nama</label>
    <input type="text" name="nama"><br>
    @error('nama')
        <p>{{ $message}}</p>
    @enderror

    <label for="photo">Photo</label>
    <input type="file" name="photo"><br>
    @error('photo')
        <p>{{ $message}}</p>
    @enderror


    <label for="deskripsi">Deskripsi</label>
    <input type="text" name="deskripsi"><br>
    @error('deskripsi')
    <p>{{ $message}}</p>
    @enderror

    <label for="jenis">Jenis</label>
    <select name="jenis">
        <option value="produk">Produk</option>
        <option value="jasa">Jasa</option>
    </select><br>
    @error('jenis')
    <p>{{ $message}}</p>
    @enderror

    <label for="stok">Stok</label>
    <input type="text" name="stok"><br>
    @error('stok')
    <p>{{ $message}}</p>
    @enderror



    <label for="harga">Harga</label>
    <input type="text" name="harga"><br>
    @error('harga')
    <p>{{ $message}}</p>
    @enderror

    <button type="submit">SIMPAN</button>

</form>
