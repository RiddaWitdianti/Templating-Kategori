<h1>Form Tambah Data Produk</h1>
<form method="post" action="{{route('item_transaksi.store')}}">
    @csrf

    <label for="transaksi_id">Transaksi Id</label>
    <select name="transaksi_id" id="transaksi_id" class="form-control
    @error('transaksi_id') is-invalid @enderror">
        <option value="">-Pilih Id-</option>
        @foreach ($transaksi as $item)
            <option value="{{ $item->id }}"
                @if ($item->id == old('transaksi_id'))
                    selected
                @endif
            >

            {{ $item->nomor }}
            </option>
        @endforeach
    </select><br>

    <label for="produk_id">Produk Id</label>
    <select name="produk_id" id="produk_id" class="form-control
    @error('produk_id') is-invalid @enderror">
        <option value="">-Pilih Id-</option>
        @foreach ($produk as $item)
            <option value="{{ $item->id }}"
                @if ($item->id == old('produk_id'))
                    selected
                @endif
            >

            {{ $item->nama }}
            </option>
        @endforeach
    </select><br>


    <label for="Jumlah">Jumlah</label>
    <input type="number" name="jumlah"><br>
    @error('jumlah')
    <p>{{ $message}}</p>
    @enderror

    <label for="harga">Harga</label>
    <input type="number" name="harga"><br>
    @error('harga')
    <p>{{ $message}}</p>
    @enderror

    {{-- <label for="total_harga">Total Harga</label>
    <input type="number" name="total_harga"><br>
    @error('total_harga')
    <p>{{ $message}}</p>
    @enderror --}}

    <button type="submit">SIMPAN</button>

</form>
