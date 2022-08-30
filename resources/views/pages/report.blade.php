@extends('layouts.master-app')

@section('content')
    <section class="carousel-ihd" >
        <div class="container">
            <div class="row mt-5">
                <h3 class="text-title" id="title">{{$report->title}}</h3>
            </div>
        </div>
    </section>

    <section class="carousel-ihd">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="owl-carousel carousel-card-infografis">
                    <div class="item">
                        <img class="card-img" src="../assets/images/social-protection/social-infografis-1.svg" alt="Card image">
                    </div>
                    <div class="item">
                        <img class="card-img" src="../assets/images/social-protection/social-infografis-2.svg" alt="Card image">
                    </div>
                    <div class="item">
                        <img class="card-img" src="../assets/images/social-protection/social-infografis-3.svg" alt="Card image">
                    </div>
                    <div class="item">
                        <img class="card-img" src="../assets/images/social-protection/social-infografis-4.svg" alt="Card image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    <img src="{{ Storage::url($report->image) }}" alt="" class="img-fluid me-4" style="float: left;" width="50%">
                    {!!$report->description!!}
                </p>
            </div>
        </div>
    </section>
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/css/owl.theme.default.min.css') }}">
@endpush

@push('script')
<script src="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/js/owl.carousel.js')}}"></script>
<script>
    $('.carousel-card-infografis').owlCarousel({
            loop: true,
            center: false,
            items: 3,
            margin: 15,
            // autoplay: true,
            // dots:true,
            nav:true,
            navText: [
                "<img alt='Slider' src='{{ asset('template/united-nation/assets/images/prev-btn.svg') }}'/>",
                "<img alt='Slider' src='{{ asset('template/united-nation/assets/images/next-btn.svg') }}'/>"],
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 2
                }
            }
        });
</script>
@endpush
