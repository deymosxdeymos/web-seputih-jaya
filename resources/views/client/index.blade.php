@extends('layouts.client.app')

@section('content')
<div class="container text-center">
    <br>
    <h1 class="text-center titlePage">Berita Terkini</h1>
    <div class="row">
        @foreach ($artikel as $value)

            <div class="col-sm">
                <figure class="newsCard mx-auto">
                    <div class="image"><img src="{{ asset('storage/artikel/'.$value->foto) }}"/></div>
                    <figcaption>
                        <div class="date"><span class="day">{{ $value->day }}</span><span class="month">{{ $value->month }}</div>
                        <h3>{{ $value->judul }}</h3>
                        {!! substr(strip_tags($value->content, '<p>'), 0, strpos(strip_tags($value->content, '<p>'), '</p>') + 4) !!}
                        {{-- {!! $value->content !!} --}}
                        <footer>
                            <div class="views"><i class="ion-eye"></i>4182</div>
                        </footer>
                    </figcaption>
                    <a href="{{ Request::routeIs('/') ? '#' : '/berita/view/'.$value->judul }}"></a>
                </figure>
            </div>
        @endforeach
    </div>
</div>
@endsection
