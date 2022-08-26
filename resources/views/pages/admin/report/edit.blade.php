@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Report</h3>
                    <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required)</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Report</li>
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
                                <h3 class="card-title">Form Create Report</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('report.update', $report->id) }}" class="form form-vertical" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Title</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="title" id="first-name-icon" name="title" value="{{ old("title", $report->title) }}">
                                                            @error('title')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-textarea-t"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="description-id-icon">Description</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" cols="10" rows="10" placeholder="description" id="summernote" name="description">{{ old("description", $report->description) }}</textarea>
                                                            @error('description')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image Cover</label>
                                                        <div class="position-relative">
                                                        <input type="hidden" name="oldImageCover" value="{{ $report->image_cover }}">
                                                        <input type="file" class="form-control @error('image_cover') is-invalid @enderror" placeholder="image_cover" id="image_cover-id-icon" name="image_cover" value="{{ old("image_cover", $report->image_cover) }}">
                                                        @error('image_cover')
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
            $('#summernote').summernote();
        });
    </script>
@endpush
