@extends('layouts.client.app')


@section('title', ' || berita read')

@section('content')
<div class="content">
    <div class="container">
        <br>
        <h1 class="text-center titlePage">{{ $artikel->judul }}</h1>
        <p class="text-center">{{ $artikel->tgl }}</p>
        <div class="text-center">
            <img src="{{ asset('storage/artikel/'.$artikel->foto) }}" width="70%">
        </div>
        <br>
        {!! $artikel->content !!}
    </div>
</div>
@endsection
