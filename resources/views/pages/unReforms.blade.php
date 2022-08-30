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
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/aos-master/dist/aos.css')}}">
    <style>
        section .jumbotron {
            height: 650px;
            background-image: url('{{$page->image_cover}}');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush

@push('script')
<script src="{{ asset('template/united-nation/assets/script/script.js') }}"></script>
@endpush
