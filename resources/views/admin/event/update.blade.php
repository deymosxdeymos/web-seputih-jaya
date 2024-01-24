@extends('layouts.admin.app')


@section('title', 'Create Event')

@section('content')

<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Ubah Event</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Update Event
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
              <h4 class="card-title">Update Event</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form id="myForm" class="form" data-parsley-validate action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group mandatory @error('nama_event') is-invalid @enderror">
                                <label for="nama_event" class="form-label">Nama Event</label>
                                <input type="text" id="nama_event-column" class="form-control @error('nama_event') is-invalid @enderror" placeholder="Masukkan Nama Event" name="nama_event" value="{{ $event->nama_event }}" required>
                                @error('nama_event')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group @error('foto') is-invalid @enderror">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" id="foto-column" class="form-control @error('foto') is-invalid @enderror" placeholder="Masukkan Foto" name="foto">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group mandatory @error('tgl_for_set') is-invalid @enderror"">
                                <label for="tgl_for_set" class="form-label">Tanggal Event</label>
                                <input type="datetime-local" id="tgl_for_set-column" class="form-control @error('tgl_for_set') is-invalid @enderror" placeholder="Pilih Tanggal Berapa event Dilaksanakan" name="tgl_for_set" value="{{ $event->original_tgl }}" min="{{ $event->original_tgl }}">
                                @error('tgl_for_set')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <input type="hidden" name="tgl" id="tgl">

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
        // Ubah format tanggal sebelum dikirim ke server
        let inputDate = document.getElementById('tgl_for_set-column').value;
        let formattedDate = formatDate(inputDate);
        document.getElementById('tgl').value = formattedDate;

        function formatDate(inputDate) {
            let date = new Date(inputDate);
            var options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                timeZoneName: 'short',
            };
            return date.toLocaleDateString('id-ID', options);
        }
        // Get Quill content
        var content = quill.root.innerHTML;

        // Set Quill content to the hidden input
        document.getElementById('content').value = content;

        // Continue with form submission
        return true;
    };
</script>
@endsection
