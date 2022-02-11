@extends('layouts.base')
@section('body')
@include('layouts.parts.public-header',[
    'judul'=>'ini judul header',
    'sub_judul'=>'ini Sub judul',
    'testhtml'=>'<b>ini html</b>'
    ])
ini body public
@yield('content')

@endsection
