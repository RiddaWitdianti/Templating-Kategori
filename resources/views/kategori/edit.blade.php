<h1>Form Update Data Kategori</h1>

<form method="post" action="{{ route('kategori.update',$kategori->id) }}">
        @csrf
        @method('PUT')

        <label for="nis">Kategori</label>
        <input type="text" class="form-control"
        name="nama_kategori" id="nama_kategori"
        value="{{ $kategori->nama_kategori }}" placeholder="nama kategori" autofocus>
        @error('nama_kategori')
            <div>{{ $message }}</div>
        @enderror
        <button type="submit">UPDATE</button>
</form>


