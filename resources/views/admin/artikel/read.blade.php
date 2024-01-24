@extends('layouts.admin.app')


@section('title', 'Create Artikel')

@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Detail Artikel</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Read Artikel
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Read Artikel</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="content">
                    <div class="container">
                        <br>
                        <h1 class="text-center titlePage">{{ $artikel->judul }}</h1>
                        {!! $artikel->content !!}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection


