@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Input</h3>
                <p class="text-subtitle text-muted">Give textual form controls like input upgrade with custom styles,
                    sizing, focus states, and more.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('infografis.update', $relasiInfografis->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon" for="title">Title</label>
                                                    <div class="position-relative">
                                                        <fieldset class="form-group">
                                                            <label for="pages_id" class="form-label">Select Page</label>
                                                            <select name="pages_id" class="form-select" id="basicSelect">
                                                                @foreach ($pages as $page)
                                                                    @if(old('pages_id') == $page->id || $relasiInfografis->Pages->id == $page->id)
                                                                        <option value="{{ $page->id }}" selected>{{ $page->title }}</option>
                                                                    @else
                                                                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <label class="first-name-icon" for="image">Image Cover</label>
                                                    <div class="position-relative">
                                                        <input class="form-control @error('image') is-invalid @enderror" id="imgInp" name="image" type="file" id="formFileMultiple" multiple>
                                                        @error('image')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-image"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    @if($relasiInfografis->Infografis->image)
                                                        <img id="blah" src="{{ Storage::url($relasiInfografis->Infografis->image) }}"/>
                                                    @else
                                                        <img id="blah"/>
                                                    @endif
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
    {{--  <link rel="stylesheet" href="{{ asset('template/admin/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/dist/assets/css/pages/datatables.css') }}">  --}}
    <link rel="stylesheet" href="{{ asset('template/admin/dist/assetsassets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@push('script')
<script>
    imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>
    <script src="{{ asset('template/admin/dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('template/admin/dist/assets/js/pages/datatables.js') }}"></script>
@endpush
