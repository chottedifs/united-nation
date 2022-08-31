@extends('layouts.master-app')

@section('content')
    <section class="carousel-ihd">
        <div class="container">
            <div class="row mt-5">
                <h3 class="text-title">{{$page->title}}</h3>
            </div>
        </div>
    </section>

    <section class="carousel-ihd-infografis">
        <!-- Slider Carousel Focus -->
        <div class='container'>
            <div class='owl-carousel carousel-infografis'>
            <!-- START -->
            @foreach ($infografis as $infographics)
            <div class='shadow-sm'>
                <img alt='Slider' src="{{ $infographics->Infografis->image }}"/>
            </div>
            @endforeach
            <!-- End -->
            </div>
        </div>
        <!-- End Slider Carousel Focus -->
    </section>

    <section class="carousel-ihd">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="owl-carousel carousel-card">
                    @foreach ($report as $reports)
                    <div class="item">
                        <a href="{{ route('report', $reports->Report->slug) }}#title">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="{{ $reports->Report->image_cover }}" alt="Card image">
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
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

    <section class="story-ihd">
        <div class="container">
            <div class="row mb-5">
                @foreach ($storyUp as $storyUps)
                <div class="col-sm-12 col-md-6">
                    <a data-bs-toggle="modal" data-bs-target="#story-{{$storyUps->StoryUp->id}}" style="cursor: pointer;">
                        <div class="card" data-aos="fade-right">
                            <div class="card-body p-0">
                                <img src="{{ $storyUps->StoryUp->image_cover }}" class="img-card-ihd me-3" alt="..." style="float: left; width: 45%;">
                                <p class="text-card-story mt-5">
                                    <img src="{{ asset('template/united-nation/assets/images/motif-read-blue.svg')}}" alt="motif-read" class="me-2" width="40">{{ $storyUps->StoryUp->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Modal --}}
                <div class="modal fade" id="story-{{$storyUps->StoryUp->id}}" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
                    <div class="modal-dialog modal-fullscreen">
                      <div class="modal-content">
                        <div class="modal-body pt-0 pb-0">
                            <div class="row">
                                <div class="col-lg-5 p-0 order-last">
                                    <img src="{{ $storyUps->StoryUp->image_box }}" class="img-responsive me-3" height="100%" width="100%" alt="...">
                                </div>
                                <div class="col-lg-7 order-first">
                                    <button type="button" class="btn-close me-3 mb-3 my-3 bg-white" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>
                                    <p class="text-content" style="font-size: 18px; padding: 40px 20px 40px 20px;">
                                        <span class="text-modal-story"><img src="{{ asset('template/united-nation/assets/images/motif-read-blue.svg')}}" alt="motif-read" class="me-2" width="40">{{$storyUps->StoryUp->name}}</span> <br>
                                        <span class="text-submodal-story">{{$storyUps->StoryUp->position}}</span><br><br>
                                        {!!$storyUps->StoryUp->description!!}
                                     </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                {{-- End Modal --}}
                @endforeach
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    {!!$content->Content->content_2!!}
                </p>
            </div>
        </div>
    </section>

    <section class="story-ihd">
        <div class="container">
            <div class="row mb-5">
                @foreach ($storyMiddle as $storyMiddle)
                <div class="col-sm-12 col-md-6">
                    <a data-bs-toggle="modal" data-bs-target="#story-{{$storyMiddle->StoryMiddle->id}}" style="cursor: pointer;">
                        <div class="card" data-aos="fade-right">
                            <div class="card-body p-0">
                                <img src="{{ $storyMiddle->StoryMiddle->image_cover }}" class="img-card-ihd me-3" alt="..." style="float: left; width: 45%;">
                                <p class="text-card-story mt-5">
                                    <img src="{{ asset('template/united-nation/assets/images/motif-read-blue.svg')}}" alt="motif-read" class="me-2" width="40">{{ $storyMiddle->StoryMiddle->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Modal --}}
                <div class="modal fade" id="story-{{$storyMiddle->StoryMiddle->id}}" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
                    <div class="modal-dialog modal-fullscreen">
                      <div class="modal-content">
                        <div class="modal-body pt-0 pb-0">
                            <div class="row">
                                <div class="col-lg-5 p-0">
                                    <img src="{{ $storyMiddle->StoryMiddle->image_box }}" class="img-responsive me-3" height="100%" width="100%" alt="...">
                                </div>
                                <div class="col-lg-7">
                                    <button type="button" class="btn-close me-3 mb-3 my-3 bg-white" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>
                                    <p class="text-content" style="font-size: 18px; padding: 40px 20px 40px 20px;">
                                        <span class="text-modal-story"><img src="{{ asset('template/united-nation/assets/images/motif-read-blue.svg')}}" alt="motif-read" class="me-2" width="40">{{$storyMiddle->StoryMiddle->name}}</span> <br>
                                        <span class="text-submodal-story">{{$storyMiddle->StoryMiddle->position}}</span><br><br>
                                        {!!$storyMiddle->StoryMiddle->description!!}
                                     </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                {{-- End Modal --}}
                @endforeach
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    {!!$content->Content->content_3!!}
                </p>
            </div>
        </div>
    </section>

    <section class="story-ihd">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                @foreach ($storyDown as $storyDowns)
                <div class="col-sm-12 col-md-6">
                    <a data-bs-toggle="modal" data-bs-target="#story-{{$storyDowns->StoryDown->id}}" style="cursor: pointer;">
                        <div class="card" data-aos="fade-right">
                            <div class="card-body p-0">
                                <img src="{{ $storyDowns->StoryDown->image_cover }}" class="img-card-ihd me-3" alt="..." style="float: left; width: 45%;">
                                <p class="text-card-story mt-5">
                                    <img src="{{ asset('template/united-nation/assets/images/motif-read-blue.svg')}}" alt="motif-read" class="me-2" width="40">{{ $storyDowns->StoryDown->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Modal --}}
                <div class="modal fade" id="story-{{$storyDowns->StoryDown->id}}" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
                    <div class="modal-dialog modal-fullscreen">
                      <div class="modal-content">
                        <div class="modal-body pt-0 pb-0">
                            <div class="row">
                                <div class="col-lg-5 p-0">
                                    <img src="{{ $storyDowns->StoryDown->image_box }}" class="img-responsive me-3" height="100%" width="100%" alt="...">
                                </div>
                                <div class="col-lg-7">
                                    <button type="button" class="btn-close me-3 mb-3 my-3 bg-white" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>
                                    <p class="text-content" style="font-size: 18px; padding: 40px 20px 40px 20px;">
                                        <span class="text-modal-story"><img src="{{ asset('template/united-nation/assets/images/motif-read-blue.svg')}}" alt="motif-read" class="me-2" width="40">{{$storyDowns->StoryDown->name}}</span> <br>
                                        <span class="text-submodal-story">{{$storyDowns->StoryDown->position}}</span><br><br>
                                        {!!$storyDowns->StoryDown->description!!}
                                     </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                {{-- End Modal --}}
                @endforeach
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    {!!$content->Content->content_4!!}
                </p>
            </div>
        </div>
    </section>
    {{-- @endforeach --}}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/css/owl.theme.default.min.css') }}">
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
<script src="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/js/owl.carousel.js')}}"></script>
<script type="text/javascript">
    function actionToggle() {
        var action = document.querySelector('.action');
        action.classList.toggle('active')
    }

    var action = document.querySelector('.action');
    window.onscroll = function(){
        action.classList.toggle('show', window.scrollY >= 600);
    }
</script>
<script>
    $('.carousel-card').owlCarousel({
            loop: true,
            center: false,
            items: 4,
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
                    items: 4
                }
            }
        });
</script>
<script>
    $('.carousel-infografis').owlCarousel({
    loop: true,
    center: true,
    items: 3,
    margin: 150,
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
                items: 3
            }
        }
    });
</script>

@endpush
