@extends('layouts.client.app')


@section('title', ' || Profile')

@section('content')
<div class="container">
    <br>
    @foreach ($profile as $value)
        <h1 class="text-center titlePage">Profile Kelurahan {{ $value->nama_kelurahan }}</h1>
        {!! $value->content !!}
    @endforeach
</div>
@endsection
