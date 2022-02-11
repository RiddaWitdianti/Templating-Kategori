@extends('layouts.admin')
@section('content')
<h1>Form Tambah Data Kategori</h1>
<form method="post" action="{{route('kategori.store')}}">
    @csrf
    <input type="text" name="nama_kategori">
    <button type="submit">SIMPAN</button>
    @error('nama_kategori')
    <p>{{ $message}}</p>
    @enderror
</form>
@endsection
