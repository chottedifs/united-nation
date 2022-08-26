@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Content</h3>
                    <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required)</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Content</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form Create Content</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('content.store') }}" class="form form-vertical" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="description-id-icon">Content 1</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_1') is-invalid @enderror" cols="10" rows="10" placeholder="content_1" id="summernote1" name="content_1">{{ old("content_1") }}</textarea>
                                                            @error('content_1')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="description-id-icon">Content 2</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_2') is-invalid @enderror" cols="10" rows="10" placeholder="content_2" id="summernote2" name="content_2">{{ old("content_2") }}</textarea>
                                                            @error('content_2')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="description-id-icon">Content 3</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_3') is-invalid @enderror" cols="10" rows="10" placeholder="content_3" id="summernote3" name="content_3">{{ old("content_3") }}</textarea>
                                                            @error('content_3')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="description-id-icon">Content 4</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_4') is-invalid @enderror" cols="10" rows="10" placeholder="content_4" id="summernote4" name="content_4">{{ old("content_4") }}</textarea>
                                                            @error('content_4')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content mt-3">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('library/summernote/summernote.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('template/admin/dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('library/summernote/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote();
        });
        $(document).ready(function() {
            $('#summernote2').summernote();
        });
        $(document).ready(function() {
            $('#summernote3').summernote();
        });
        $(document).ready(function() {
            $('#summernote4').summernote();
        });
    </script>
@endpush
