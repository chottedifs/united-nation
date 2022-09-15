@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Story Down</h3>
                    <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required)</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Story Down</li>
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
                                <h3 class="card-title">Form Create Story Down</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('storyDown.update', $story->id) }}" class="form form-vertical"
                                        method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Name</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <label for="pages_id" class="form-label">Select Page</label>
                                                                <select name="pages_id" class="form-select"
                                                                    id="basicSelect">
                                                                    @foreach ($pages as $page)
                                                                        @if (old('pages_id') == $page->id || $story->Pages->id == $page->id)
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
                                                        <label for="first-name-icon">Name</label>
                                                        <div class="position-relative">
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="Name" id="first-name-icon" name="name"
                                                                value="{{ old('name', $story->StoryDown->name) }}">
                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="position-id-icon">Position</label>
                                                        <div class="position-relative">
                                                            <input type="text"
                                                                class="form-control @error('position') is-invalid @enderror"
                                                                placeholder="position" placeholder="position"
                                                                id="position-id-icon" name="position"
                                                                value="{{ old('position', $story->StoryDown->position) }}">
                                                            @error('position')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-trophy"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description-id-icon">Description</label>
                                                        <div class="position-relative">
                                                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" cols="10" rows="10"
                                                                placeholder="description" id="description" name="description">{{ old('description', $story->StoryDown->description) }}</textarea>
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
                                                        <label for="first-name-icon" for="title">Image Cover
                                                            Preview</label>
                                                        <div class="card shadow-sm p-2 m-0">
                                                            @if ($story->StoryDown->image_cover)
                                                                <img class="img-responsive" id="blah1"
                                                                    src="{{ $story->StoryDown->image_cover }}" />
                                                            @else
                                                                <img class="img-responsive" id="blah1" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image Cover</label>
                                                        <div class="position-relative">
                                                            <input type="hidden" name="oldImageCover"
                                                                value="{{ $story->StoryDown->image_cover }}">
                                                            <input type="file"
                                                                class="form-control @error('image_cover') is-invalid @enderror"
                                                                placeholder="image_cover" id="imgInp1" name="image_cover"
                                                                value="{{ old('image_cover', $story->StoryDown->image_cover) }}">
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
                                                        <label for="first-name-icon" for="title">Image Box
                                                            Preview</label>
                                                        <div class="card shadow-sm p-2 m-0">
                                                            @if ($story->StoryDown->image_box)
                                                                <img class="img-responsive" id="blah2"
                                                                    src="{{ $story->StoryDown->image_box }}" />
                                                            @else
                                                                <img class="img-responsive" id="blah2" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="images-id-icon">Image Box</label>
                                                        <div class="position-relative">
                                                            <input type="hidden" name="oldImageBox"
                                                                value="{{ $story->StoryDown->image_box }}">
                                                            <input type="file"
                                                                class="form-control @error('image_box') is-invalid @enderror"
                                                                placeholder="image_box" id="imgInp2" name="image_box"
                                                                value="{{ old('image_box', $story->StoryDown->image_box) }}">
                                                            @error('image_box')
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
                blah1.src = URL.createObjectURL(file)
            }
        }
        imgInp2.onchange = evt => {
            const [file] = imgInp2.files
            if (file) {
                blah2.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
