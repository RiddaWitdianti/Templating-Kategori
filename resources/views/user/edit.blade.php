<h1>Form Update Data User</h1>

<form method="post" action="{{ route('user.update', $user->id) }}" >
    @method('put')
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $user->name }}"><br>
    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ $user->email }}"><br>
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="{{ $user->password }}"><br>
    @error('password')
        <div>{{ $message }}</div>
    @enderror

    <label for="hak_akses">Hak Akses</label>
    <select name="hak_akses" id="hak_akses">
        <option value="admin" @if ($user->jenis == 'admin')
            selected
            @endif>Admin</option>
        <option value="pelanggan" @if ($user->jenis == 'pelanggan')
            selected
            @endif>Pelanggan</option>
    </select><br>

    <button type="submit">UPDATE</button>
</form>
