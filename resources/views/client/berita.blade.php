@extends('layouts.client.app')


@section('title', ' || berita')

@section('content')
<div class="container">
    <br>
    <h1 class="text-center titlePage">Berita Kelurahan</h1>
    <ul class="list-unstyled">
        @foreach ($artikel as $value)
            <li class="media">
                <img class="mr-3 img-thumbnail rounded w-25 p-3" src="{{ asset('storage/artikel/'.$value->foto) }}">
                <div class="media-body">
                    <h5 class="mt-0 mb-1 titlePage">{{ $value->judul }}</h5>
                    {!! substr(strip_tags($value->content, '<p>'), 0, strpos(strip_tags($value->content, '<p>'), '</p>') + 4) !!}
                    <p><a href="{{ Request::routeIs('berita') ? '#' : '/berita/view/'.$value->judul }}" class="text-dark">Baca selengkapnya</a></p>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
