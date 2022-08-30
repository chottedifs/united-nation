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
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <label for="pages_id" class="form-label">Select Page</label>
                                                                <select name="pages_id" class="form-select" id="basicSelect">
                                                                    @foreach ($pages as $page)
                                                                        @if(old('pages_id') == $page->id || $report->Pages->id == $page->id)
                                                                            <option value="{{ $page->id }}" selected>{{ $page->title }}</option>
                                                                        @else
                                                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Title</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="title" id="first-name-icon" name="title" value="{{ old("title", $report->Report->title) }}">
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
                                                        <label for="first-name-icon">Slug</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="slug" id="first-name-icon" name="slug" value="{{ old("slug", $report->Report->slug) }}" disabled>
                                                            @error('slug')
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
                                                    <div class="form-group">
                                                        <label for="description-id-icon">Description</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" cols="10" rows="10" placeholder="description" id="description" name="description">{{ old("description", $report->Report->description) }}</textarea>
                                                            @error('description')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon" for="title">Image Cover Preview</label>
                                                        <div class="card shadow-sm p-2 m-0">
                                                            @if($report->Report->image_cover)
                                                                <img class="img-responsive" id="blah" src="{{ $report->Report->image_cover }}"/>
                                                            @else
                                                                <img class="img-responsive" id="blah"/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image Cover</label>
                                                        <div class="position-relative">
                                                        <input type="hidden" name="oldImageCover" value="{{ $report->Report->image_cover }}">
                                                        <input type="file" class="form-control @error('image_cover') is-invalid @enderror" placeholder="image_cover" id="imgInp" name="image_cover" value="{{ old("image_cover", $report->Report->image_cover) }}">
                                                        @error('image_cover')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon" for="title">Image Preview</label>
                                                        <div class="card shadow-sm p-2 m-0">
                                                            @if($report->Report->image)
                                                                <img class="img-responsive" id="blah2" src="{{ $report->Report->image }}"/>
                                                            @else
                                                                <img class="img-responsive" id="blah2"/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image</label>
                                                        <div class="position-relative">
                                                        <input type="hidden" name="oldImage" value="{{ $report->Report->image }}">
                                                        <input type="file" class="form-control @error('image') is-invalid @enderror" placeholder="image" id="imgInp2" name="image" value="{{ old("image", $report->Report->image) }}">
                                                        @error('image')
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
    imgInp2.onchange = evt => {
        const [file] = imgInp2.files
        if (file) {
            blah3.src = URL.createObjectURL(file)
        }
    }
    </script>
@endpush
