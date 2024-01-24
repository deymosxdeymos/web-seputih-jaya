@extends('layouts.admin.app')


@section('title', 'Kelola Event')

@section('content')<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kelola Event</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Event</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Data Event
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Tanggal Event</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event as $data => $value)
                            <tr>
                                <td>{{ $event->firstItem() + $data}}</td>
                                <td>{{ $value->nama_event }}</td>
                                <td>{{ $value->tgl }}</td>
                                <td>
                                    <a href="{{route('admin.event.edit', $value->id) }}" class="btn btn-light-primary">Edit</a>
                                    <a href="{{route('admin.event.show', $value->id) }}" class="btn btn-light-success">Read</a>
                                    <form method="POST" action="{{route('admin.event.destroy', $value->id)}}"  enctype='multipart/form-data' style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-light-danger ml-1">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $event->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>

    </section>
</div>
@endsection
