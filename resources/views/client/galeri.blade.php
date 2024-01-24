@extends('layouts.client.app')

@section('title', ' || galeri')

@section('content')
<div class="container">
    <br>
    <h1 class="text-center titlePage">Galeri Kelurahan</h1>
    <div class="row">
        @foreach ($galeri as $value)
            <div class="col-sm text-center">
                <a href="{{ asset('storage/galeri/'.$value->foto) }}" data-lightbox="gallery">
                    <img src="{{ asset('storage/galeri/'.$value->foto) }}" class="galeri" style="width:100%;max-width:300px">
                </a>
            </div>
        @endforeach
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<script>
    $(document).ready(function(){
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    });
</script>
@endsection
