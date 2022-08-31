@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Report Un Reform</h3>
                    <a href="{{ route('reportUn.create') }}" class="btn btn-outline-primary icon-left mt-3 mb-3">Add Report Un Reform</a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Report Un Reform</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>For Page</th>
                                <th>Title</th>
                                <th>Content 1</th>
                                <th>Image 1</th>
                                <th>Content 2</th>
                                <th>Image 2</th>
                                <th>Content 3</th>
                                <th>Image 3</th>
                                <th>Content 4</th>
                                <th>Image 4</th>
                                <th>Content 5</th>
                                <th>Image 5</th>
                                <th>Content 6</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                            <tr>
                                <td class="serial">{{ $loop->iteration }}</td>
                                <td>{{$content->Pages->title}}</td>
                                <td>{{$content->ReportUn->title}}</td>
                                <td>{{ Str::limit($content->ReportUn->content_1,100) }}</td>
                                <td><img src="{{ $content->ReportUn->image_1 }}" alt="" style="width: 50px;"></td>
                                <td>{{ Str::limit($content->ReportUn->content_2,100) }}</td>
                                <td><img src="{{ $content->ReportUn->image_2 }}" alt="" style="width: 50px;"></td>
                                <td>{{ Str::limit($content->ReportUn->content_3,100) }}</td>
                                <td><img src="{{ $content->ReportUn->image_3 }}" alt="" style="width: 50px;"></td>
                                <td>{{ Str::limit($content->ReportUn->content_4,100) }}</td>
                                <td><img src="{{ $content->ReportUn->image_4 }}" alt="" style="width: 50px;"></td>
                                <td>{{ Str::limit($content->ReportUn->content_5,100) }}</td>
                                <td><img src="{{ Storage::url($content->ReportUn->image_5) }}" alt="" style="width: 50px;"></td>
                                <td>{{ Str::limit($content->ReportUn->content_6,100) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('reportUn.edit', $content->id) }}" class="btn btn-outline-warning .icon-left me-2"><i class="bi bi-pencil-square"></i></a>
                                        <form onsubmit="return confirm('Are you sure ?');" action="{{ route('reportUn.destroy', $content->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger .icon-left"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('template/admin/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/dist/assets/css/pages/datatables.css') }}">
@endpush

@push('script')
    <script src="{{ asset('template/admin/dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('template/admin/dist/assets/js/pages/datatables.js') }}"></script>
@endpush
