@extends('layouts.master-app')

@section('content')
    <section class="carousel-ihd">
        <div class="container">
            <div class="row mt-5">
                <div class="motif-title">
                    <h3 class="text-title w-75" id="title">{{ $report->title }}</h3>
                </div>
            </div>
        </div>
    </section>

    @if ($report->slug ==
        'building-community-resilience-and-ensuring-a-gender-responsive-approach-to-preventing-violent-extremism')
    @elseif ($report->slug == 'advancing-policies-to-prevent-violent-extremism')
    @else
        <section class="carousel-ihd">
            <div class="container">
                <div class="row mt-5 mb-5">
                    <div class="owl-carousel carousel-card-infografis">
                        @foreach ($reportInfografis as $reportGraphics)
                            <div class="item">
                                <img class="card-img" src="{{ $reportGraphics->Infografis->image }}" alt="Card image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    @if ($report->slug == 'stronger-health-systems')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @elseif ($report->slug == 'training-skill-development-and-public-educaction')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @elseif ($report->slug == 'agriculture-and-food-systems-development')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @elseif ($report->slug == 'local-firms-equipped-for-the-global-market')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @elseif ($report->slug == 'building-gender-equal-child-friendly-workplaces-and-protecting-workers-rights')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @elseif ($report->slug ==
                        'policy-making-and-institutional-capacity-building-for-inclusive-and-non-discriminatory-workplaces')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @elseif ($report->slug ==
                        'climate-change-adaptation-and-mitigation-reduced-environmental-degradation-and-improved-early-warning-systems-for-disaster-risk-reduction')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @elseif ($report->slug == 'land-and-marine-ecosystems-habitats-and-species-protected')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @elseif ($report->slug == 'evidence-based-land-management-and-planning')
                        <img src="{{ $report->image }}" alt="" class="img-content mb-2" width="100%">
                        {!! $report->description !!}
                    @else
                        <img src="{{ $report->image }}" alt="" class="img-content me-4" style="float: left;"
                            width="50%">
                        {!! $report->description !!}
                    @endif
                </p>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <link rel="stylesheet"
        href="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/css/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/css/owl.theme.default.min.css') }}">
    <style>
        section .jumbotron {
            height: 650px;
            background-image: url('{{ $report->RelasiReportPages->Pages->image_cover }}');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/js/owl.carousel.js') }}"></script>
    <script>
        $('.carousel-card-infografis').owlCarousel({
            loop: true,
            center: false,
            items: 3,
            margin: 15,
            autoplay: true,
            // dots:true,
            nav: true,
            navText: [
                "<img alt='Slider' src='{{ asset('template/united-nation/assets/images/prev-btn.svg') }}'/>",
                "<img alt='Slider' src='{{ asset('template/united-nation/assets/images/next-btn.svg') }}'/>"
            ],
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
