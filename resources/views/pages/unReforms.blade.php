@extends('layouts.master-app')

@section('content')
    <section class="carousel-ihd">
        <div class="container">
            <div class="row mt-5">
                <h3 class="text-title">{{$page->title}}</h3>
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    {!!$content->Content->content_1!!}
                </p>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <div class="row mb-4">
                @foreach ($reportUns as $reportUn)
                    <a href="{{ route('reportUns', $reportUn->ReportUn->slug) }}#title" class="menus-reform shadow-sm">
                        {{ $reportUn->ReportUn->title}}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/aos-master/dist/aos.css')}}">
@endpush

@push('script')
<script src="{{ asset('template/united-nation/assets/script/script.js') }}"></script>
@endpush
