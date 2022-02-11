<h1>Form Update Data Transaksi</h1>

<form method="post" action="{{ route('transaksi.update', $transaksi->id) }}" >
    @method('put')
    @csrf

    <label for="user id">User Id</label>
    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
        <option value="">-Pilih Id-</option>
        @foreach ($user as $item)
            <option value="{{ $item->id }}" @if ($item->id == old('user_id'))
                selected
        @endif
        >

        {{ $item->name}}
        </option>
        @endforeach
    </select><br>
    @error('user_id')
        <div>{{ $message }}</div>
    @enderror

    <label for="nomor">Nomor</label>
    <input type="text" name="nomor" id="nomor" value="{{ $transaksi->nomor }}"><br>
    @error('nomor')
        <div>{{ $message }}</div>
    @enderror

    <label for="tanggal">Tanggal</label>
    <input type="date" name="tanggal" id="tanggal" value="{{ $transaksi->tanggal }}"><br>
    @error('tanggal')
        <div>{{ $message }}</div>
    @enderror

    <label for="total_harga">Number</label>
    <input type="number" name="number" id="number" value="{{ $transaksi->number }}"><br>
    @error('number')
        <div>{{ $message }}</div>
    @enderror

    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="belum bayar" @if ($transaksi->jenis == 'belum bayar')
            selected
            @endif>Belum Bayar</option>
        <option value="lunas" @if ($transaksi->jenis == 'lunas')
            selected
            @endif>Lunas</option>
    </select><br>

    <button type="submit">UPDATE</button>
</form>
