@extends('layouts.admin.app')


@section('title', 'Create Galeri')

@section('content')

<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Buat Galeri</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Create Galeri
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
              <h4 class="card-title">Create Galeri</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form id="myForm" class="form" data-parsley-validate action="{{route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group mandatory @error('foto') is-invalid @enderror">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" id="foto-column" class="form-control @error('foto') is-invalid @enderror" placeholder="Masukkan Foto" name="foto" value="{{ old('foto') }}" required>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="save btn btn-primary me-1 mb-1">
                        Submit
                      </button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection


