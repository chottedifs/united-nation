@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Report Un Reform</h3>
                    <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required)</p>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form Create Report Un Reform</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('reportUn.update', $content->id) }}" class="form form-vertical"
                                        method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <label for="pages_id" class="form-label">Select Page</label>
                                                                <select name="pages_id" class="form-select"
                                                                    id="basicSelect">
                                                                    @foreach ($pages as $page)
                                                                        @if (old('pages_id') == $page->id || $content->Pages->id == $page->id)
                                                                            <option value="{{ $page->id }}" selected>
                                                                                {{ $page->title }}</option>
                                                                        @else
                                                                            <option value="{{ $page->id }}">
                                                                                {{ $page->title }}</option>
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
                                                            <input type="text"
                                                                class="form-control @error('title') is-invalid @enderror"
                                                                placeholder="title" id="first-name-icon" name="title"
                                                                value="{{ old('title', $content->ReportUn->title) }}">
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
                                                            @if ($content->ReportUn->image_1)
                                                                <img class="img-responsive" id="blah"
                                                                    src="{{ $content->ReportUn->image_1 }}" />
                                                            @else
                                                                <img class="img-responsive" id="blah" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image 1</label>
                                                        <div class="position-relative">
                                                            <input type="hidden" name="oldImage1"
                                                                value="{{ $content->ReportUn->image_1 }}">
                                                            <input type="file"
                                                                class="form-control @error('image_1') is-invalid @enderror"
                                                                placeholder="image_1" id="imgInp1" name="image_1"
                                                                value="{{ old('image_1', $content->ReportUn->image_1) }}">
                                                            @error('image_1')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description-id-icon">Paragraph 1</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_1') is-invalid @enderror" cols="10" rows="10"
                                                                placeholder="Create a sentence in this text area..." id="summernote1" name="content_1">{{ old('content_1', $content->ReportUn->content_1) }}</textarea>
                                                            @error('content_1')
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
                                                            @if ($content->ReportUn->image_2)
                                                                <img class="img-responsive" id="blih"
                                                                    src="{{ $content->ReportUn->image_2 }}" />
                                                            @else
                                                                <img class="img-responsive" id="blih" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image 2</label>
                                                        <div class="position-relative">
                                                            <input type="hidden" name="oldImage2"
                                                                value="{{ $content->ReportUn->image_2 }}">
                                                            <input type="file"
                                                                class="form-control @error('image_2') is-invalid @enderror"
                                                                placeholder="image_2" id="imgInp2" name="image_2"
                                                                value="{{ old('image_2', $content->ReportUn->image_2) }}">
                                                            @error('image_2')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description-id-icon">Paragraph 2</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_2') is-invalid @enderror" cols="10" rows="10"
                                                                placeholder="Create a sentence in this text area..." id="summernote2" name="content_2">{{ old('content_2', $content->ReportUn->content_2) }}</textarea>
                                                            @error('content_2')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon" for="title">Image Preview
                                                            3</label>
                                                        <div class="card shadow-sm p-2 m-0">
                                                            @if ($content->ReportUn->image_3)
                                                                <img class="img-responsive" id="bluh"
                                                                    src="{{ $content->ReportUn->image_3 }}" />
                                                            @else
                                                                <img class="img-responsive" id="bluh" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image 3</label>
                                                        <div class="position-relative">
                                                            <input type="hidden" name="oldImage3"
                                                                value="{{ $content->ReportUn->image_3 }}">
                                                            <input type="file"
                                                                class="form-control @error('image_3') is-invalid @enderror"
                                                                placeholder="image_3" id="imgInp3" name="image_3"
                                                                value="{{ old('image_3', $content->ReportUn->image_3) }}">
                                                            @error('image_3')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description-id-icon">Paragraph 3</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_3') is-invalid @enderror" cols="10" rows="10"
                                                                placeholder="Create a sentence in this text area..." id="summernote3" name="content_3">{{ old('content_3', $content->ReportUn->content_3) }}</textarea>
                                                            @error('content_3')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon" for="title">Image Preview
                                                            4</label>
                                                        <div class="card shadow-sm p-2 m-0">
                                                            @if ($content->ReportUn->image_4)
                                                                <img class="img-responsive" id="bleh"
                                                                    src="{{ $content->ReportUn->image_4 }}" />
                                                            @else
                                                                <img class="img-responsive" id="bleh" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image 4</label>
                                                        <div class="position-relative">
                                                            <input type="hidden" name="oldImage4"
                                                                value="{{ $content->ReportUn->image_4 }}">
                                                            <input type="file"
                                                                class="form-control @error('image_4') is-invalid @enderror"
                                                                placeholder="image_4" id="imgInp4" name="image_4"
                                                                value="{{ old('image_4', $content->ReportUn->image_4) }}">
                                                            @error('image_4')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description-id-icon">Paragraph 4</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_4') is-invalid @enderror" cols="10" rows="10"
                                                                placeholder="Create a sentence in this text area..." id="summernote4" name="content_4">{{ old('content_4', $content->ReportUn->content_4) }}</textarea>
                                                            @error('content_4')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon" for="title">Image Preview
                                                            5</label>
                                                        <div class="card shadow-sm p-2 m-0">
                                                            @if ($content->ReportUn->image_5)
                                                                <img class="img-responsive" id="bloh"
                                                                    src="{{ $content->ReportUn->image_5 }}" />
                                                            @else
                                                                <img class="img-responsive" id="bloh" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image 5</label>
                                                        <div class="position-relative">
                                                            <input type="hidden" name="oldImage4"
                                                                value="{{ $content->ReportUn->image_5 }}">
                                                            <input type="file"
                                                                class="form-control @error('image_5') is-invalid @enderror"
                                                                placeholder="image_5" id="imgInp5" name="image_5"
                                                                value="{{ old('image_5', $content->ReportUn->image_5) }}">
                                                            @error('image_5')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description-id-icon">Paragraph 5</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_5') is-invalid @enderror" cols="10"
                                                                rows="10" placeholder="Create a sentence in this text area..." id="summernote5" name="content_5">{{ old('content_5', $content->ReportUn->content_5) }}</textarea>
                                                            @error('content_5')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description-id-icon">Paragraph 6</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('content_6') is-invalid @enderror" cols="10"
                                                                rows="10" placeholder="Create a sentence in this text area..." id="summernote5" name="content_6">{{ old('content_6', $content->ReportUn->content_6) }}</textarea>
                                                            @error('content_6')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content mt-3">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
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

@push('script')
    <script src="{{ asset('template/admin/dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        imgInp2.onchange = evt => {
            const [file] = imgInp2.files
            if (file) {
                blih.src = URL.createObjectURL(file)
            }
        }
        imgInp3.onchange = evt => {
            const [file] = imgInp3.files
            if (file) {
                bluh.src = URL.createObjectURL(file)
            }
        }
        imgInp4.onchange = evt => {
            const [file] = imgInp4.files
            if (file) {
                bleh.src = URL.createObjectURL(file)
            }
        }
        imgInp5.onchange = evt => {
            const [file] = imgInp5.files
            if (file) {
                bloh.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
