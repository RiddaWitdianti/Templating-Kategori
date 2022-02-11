<h1>Form Update Data Item Transaksi</h1>

<form method="post" action="{{ route('item_transaksi.update', $item_transaksi->id) }}" >
    @method('put')
    @csrf

    <label for="user id">Transaksi Id</label>
    <select name="transaksi_id" id="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror">
        <option value="">-Pilih Id-</option>
        @foreach ($transaksi as $item)
            <option value="{{ $item->id }}" @if ($item->id == old('transaksi_id'))
                selected
        @endif
        >

        {{ $item->nomor}}
        </option>
        @endforeach
    </select><br>
    @error('transaksi_id')
        <div>{{ $message }}</div>
    @enderror

    <label for="produk id">Produk Id</label>
    <select name="produk_id" id="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
        <option value="">-Pilih Id-</option>
        @foreach ($produk as $item)
            <option value="{{ $item->id }}" @if ($item->id == old('produk_id'))
                selected
        @endif
        >

        {{ $item->nama}}
        </option>
        @endforeach
    </select><br>
    @error('produk_id')
        <div>{{ $message }}</div>
    @enderror

    <label for="jumlah">Jumlah</label>
    <input type="number" name="jumlah" id="jumlah" value="{{ $item_transaksi->jumlah}}"><br>
    @error('jumlah')
        <div>{{ $message }}</div>
    @enderror

    <label for="harga">Harga</label>
    <input type="number" name="harga" id="harga" value="{{ $item_transaksi->harga }}"><br>
    @error('harga')
        <div>{{ $message }}</div>
    @enderror

    <label for="total_harga">Total Harga</label>
    <input type="number" name="total_harga" id="total_harga" value="{{ $item_transaksi->total_harga }}"><br>
    @error('total_harga')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">UPDATE</button>
</form>
