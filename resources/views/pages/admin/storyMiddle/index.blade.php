@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Story Middle</h3>
                    <a href="{{ route('storyMiddle.create') }}" class="btn btn-outline-primary icon-left mt-3 mb-3">Add Story Middle</a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Story Middle</li>
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
                                <th>For Page</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Image Cover</th>
                                <th>Image Box</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stories as $story)
                            <tr>
                                <td>{{ $story->Pages->title }}</td>
                                <td>{{ $story->StoryMiddle->name }}</td>
                                <td>{{ Str::limit($story->StoryMiddle->position, 20) }}</td>
                                <td><img src="{{ $story->StoryMiddle->image_cover }}" alt="image" width="90"></td>
                                <td><img src="{{ $story->StoryMiddle->image_box }}" alt="image" width="90"></td>
                                <td>{{ Str::limit($story->StoryMiddle->description,100) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('storyMiddle.edit', $story->id) }}" class="btn btn-outline-warning .icon-left me-2"><i class="bi bi-pencil-square"></i></a>
                                        <form onsubmit="return confirm('Are you sure ?');" action="{{ route('storyMiddle.destroy', $story->id) }}" method="POST">
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
