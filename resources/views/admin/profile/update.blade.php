@extends('layouts.admin.app')


@section('title', 'Create Galeri')

@section('content')

<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Ubah Profile</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Update Profile
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
              <h4 class="card-title">Update Profile</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form id="myForm" class="form" data-parsley-validate action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group mandatory @error('nama_kelurahan') is-invalid @enderror">
                                <label for="nama_kelurahan" class="form-label">Nama Kelurahan</label>
                                <input type="text" id="nama_kelurahan-column" class="form-control @error('nama_kelurahan') is-invalid @enderror" placeholder="Masukkan Judul" name="nama_kelurahan" value="{{ $profile->nama_kelurahan }}" required>
                                @error('nama_kelurahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group mandatory @error('content') is-invalid @enderror">
                                <label for="content" class="form-label">Konten</label>
                                <div id="editor" class="">
                                    {!! $profile->content !!}
                                </div>
                                <input type="hidden" name="content" id="content">
                                @error('content')
                                    <div class="@error('content') is-invalid @enderror">
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

@section('script')
    <script>var quill = new Quill('#editor', {
        theme: 'snow', // or 'bubble' for a different theme
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],     // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                [{ 'direction': 'rtl' }],                         // text direction

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],

                ['clean'],                                         // remove formatting button

                ['link', 'image', 'video']                         // link and image, video
            ]
        }
    });

    var form = document.getElementById('myForm');

    form.onsubmit = function() {
        // Get Quill content
        var content = quill.root.innerHTML;

        // Set Quill content to the hidden input
        document.getElementById('content').value = content;

        // Continue with form submission
        return true;
    };
</script>
@endsection
