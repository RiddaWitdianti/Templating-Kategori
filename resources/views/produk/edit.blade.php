<h1>Form Update Data Produk</h1>

<form method="post" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data">
    @method('put')
    @csrf


    <label for="kode">Kode Produk</label>
    <input type="text" name="kode" id="kode" value="{{ $produk->kode }}"><br>

 

    <label for="kategori">Kategori</label>
    <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
        <option value="">-Pilih Kategori-</option>
        @foreach ($kategori as $item)
            <option value="{{ $item->id }}" @if ($item->id == old('kategori_id'))
                selected
        @endif
        >

        {{ $item->nama_kategori }}
        </option>
        @endforeach
    </select><br>

    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="{{ $produk->nama }}"><br>
    @error('nama')
        <div>{{ $message }}</div>
    @enderror

    <label for="photo">photo</label>
    <input type="file" name="photo" id="photo"><br>

    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" cols="20" rows="2">{{ $produk->deskripsi }}</textarea><br>

    <label for="jenis">Jenis</label>
    <select name="jenis" id="jenis">
        {{-- @if ($produk->jenis === 'produk') --}}
            {{-- <option value="produk" selected>Produk</option> --}}
        {{-- @else --}}
            {{-- <option value="jasa">Jasa</option> --}}
        {{-- @endif --}}

        <option value="jasa" @if ($produk->jenis == 'jasa')
            selected
            @endif>Jasa</option>
        <option value="produk" @if ($produk->jenis == 'produk')
            selected
            @endif>Produk</option>
    </select><br>

    <label for="stok">Stok</label>
    <input type="text" name="stok" id="stok" value="{{ $produk->stok }}"><br>
    @error('stok')
        <div>{{ $message }}</div>
    @enderror

    <label for="harga">Harga</label>
    <input type="number" name="harga" id="harga" value="{{ $produk->harga }}"><br>
    @error('harga')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">UPDATE</button>
</form>
