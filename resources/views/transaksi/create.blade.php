<h1>Form Tambah Data Produk</h1>
<form method="post" action="{{route('transaksi.store')}}">
    @csrf
    <label for="user id">User Id</label>
    <select name="user_id" id="user_id" class="form-control
    @error('user_id') is-invalid @enderror">
        <option value="">-Pilih Id-</option>
        @foreach ($user as $item)
            <option value="{{ $item->id }}"
                @if ($item->id == old('user_id'))
                    selected
                @endif
            >

            {{ $item->name }}
            </option>
        @endforeach
    </select><br>

    <label for="nomor">Nomor</label>
    <input type="text" name="nomor"><br>
    @error('nomor')
    <p>{{ $message}}</p>
    @enderror

    <label for="tanggal">Tanggal</label>
    <input type="date" name="tanggal"><br>
    @error('tanggal')
    <p>{{ $message}}</p>
    @enderror

    <label for="total_harga">Total Harga</label>
    <input type="number" name="total_harga"><br>
    @error('total_harga')
    <p>{{ $message}}</p>
    @enderror

    <label for="status">Status</label>
    <select name="status">
        <option value="belum bayar">Belum Bayar</option>
        <option value="lunas">Lunas</option>
    </select><br>
    @error('status')
    <p>{{ $message}}</p>
    @enderror

    <button type="submit">SIMPAN</button>

</form>
