@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Page</h3>
                    <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required)</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Page</li>
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
                                <h3 class="card-title">Form Create Page</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('pages.store') }}" class="form form-vertical" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon" for="title">Title</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Add Title">
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
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon" for="title">Image Preview</label>
                                                        <div class="card shadow-sm p-2 m-0">
                                                            <img class="img-responsive" id="blah"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="first-name-icon" for="image_cover">Image Cover</label>
                                                        <div class="position-relative">
                                                            <input class="form-control @error('image_cover') is-invalid @enderror" id="imgInp" name="image_cover" type="file" id="formFileMultiple" multiple>
                                                            @error('image_cover')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-image"></i>
                                                        </div>
                                                    </div>
                                                    <label class="first-name-icon" for="image_cover">Image Cover</label>
                                                    <div class="position-relative">
                                                        <input class="form-control @error('image_cover') is-invalid @enderror" id="imgInp" name="image_cover" type="file" id="formFileMultiple" multiple>
                                                        @error('image_cover')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <img id="blah"/>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('style')
    {{-- <link rel="stylesheet" href="{{ asset('library/summernote/summernote.min.css') }}"> --}}
@endpush

@push('script')
    <script src="{{ asset('template/admin/dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script>
        imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    </script>
@endpush
