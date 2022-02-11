<h1>Form Update Data Pembayaran</h1>

<form method="post" action="{{ route('pembayaran.update', $pembayaran->id) }}" >
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

    <label for="jumlah_bayar">Jumlah Bayar</label>
    <input type="number" name="jumlah_bayar" id="jumlah_bayar" value="{{ $pembayaran->jumlah_bayar}}"><br>
    @error('jumlah_bayar')
        <div>{{ $message }}</div>
    @enderror

    <label for="metode_bayar">Metode Bayar</label>
    <select name="metode_bayar" id="metode_bayar">
        <option value="cash" @if ($pembayaran->metode_bayar == 'cash')
            selected
            @endif>Transfer</option>
        <option value="transfer" @if ($pembayaran->metode_bayar == 'transfer')
            selected
            @endif>Transfer</option>
    </select><br>

    <button type="submit">UPDATE</button>
</form>
