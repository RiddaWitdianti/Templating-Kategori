<h1>Form Tambah Data Produk</h1>
<form method="post" action="{{route('pembayaran.store')}}">
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

    <label for="Jumlah Bayar">Jumlah Bayar</label>
    <input type="number" name="jumlah_bayar"><br>
    @error('jumlah_bayar')
    <p>{{ $message}}</p>
    @enderror

    <label for="pembayaran">Metode Bayar</label>
    <select name="metode_bayar">
        <option value="cash">Cash</option>
        <option value="transfer">Transfer</option>
    </select><br>
    @error('metode_bayar')
    <p>{{ $message}}</p>
    @enderror

    <button type="submit">SIMPAN</button>

</form>
