<h1>Form Tambah Data Produk</h1>
<form method="post" action="{{route('user.store')}}">
    @csrf
    <label for="name">Name User</label>
    <input type="text" name="name"><br>
    @error('name')
    <p>{{ $message}}</p>
    @enderror

    <label for="email">Email</label>
    <input type="text" name="email"><br>
    @error('email')
    <p>{{ $message}}</p>
    @enderror

    <label for="password">Password</label>
    <input type="password" name="password"><br>
    @error('password')
    <p>{{ $message}}</p>
    @enderror

    <label for="hak_akses">Hak Akses</label>
    <select name="hak_akses">
        <option value="admin">Admin</option>
        <option value="pelanggan">Pelanggan</option>
    </select><br>
    @error('hak_akses')
    <p>{{ $message}}</p>
    @enderror

    <button type="submit">SIMPAN</button>

</form>
