@extends('admin.mainn')

@section('content')

<h1>Selamat Datang {{ Auth::user()->Username }}</h1>

@endsection