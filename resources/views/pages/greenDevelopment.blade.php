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
            <div class='shadow-sm'>
                <img alt='Slider' src='assets/images/ihd-infografis/ihd-infografis-1.svg'/>
            </div>
            <div class='shadow-sm'>
                <img alt='Slider' src='assets/images/ihd-infografis/ihd-infografis-2.svg'/>
            </div>
            <div class='shadow-sm'>
                <img alt='Slider' src='assets/images/ihd-infografis/ihd-infografis-3.svg'/>
            </div>
            <div class='shadow-sm'>
                <img alt='Slider' src='assets/images/ihd-infografis/ihd-infografis-4.svg'/>
            </div>
            <div class='shadow-sm'>
                <img alt='Slider' src='assets/images/ihd-infografis/ihd-infografis-5.svg'/>
            </div>
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
                        <a href="{{ route('report', $reports->Report->id) }}#title">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="{{ Storage::url($reports->Report->image_cover)}}" alt="Card image">
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @foreach ($content as $contents)
    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    {!!$contents->Content->content_1!!}
                </p>
            </div>
        </div>
    </section>

    <section class="story-ihd">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-6">
                    <a data-bs-toggle="modal" data-bs-target="#story-1" style="cursor: pointer;">
                        <div class="card" data-aos="fade-right">
                            <div class="card-body p-0">
                                <img src="assets/images/story-1.webp" class="img-card-ihd me-3" alt="..." style="float: left; width: 45%;">
                                <p class="text-card-story mt-5">
                                    <img src="assets/images/motif-read-blue.svg" alt="motif-read" class="me-2" width="40">Eni's Story
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a data-bs-toggle="modal" data-bs-target="#story-2" style="cursor: pointer;">
                        <div class="card" data-aos="fade-left">
                            <div class="card-body p-0">
                                <img src="assets/images/story-2.webp" class="img-card-ihd me-3" alt="..." style="float: left; width: 45%;">
                                <p class="text-card-story mt-5">
                                    <img src="assets/images/motif-read-blue.svg" alt="motif-read" class="me-2" width="40">Nia's Story
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    {!!$contents->Content->content_2!!}
                </p>
            </div>
        </div>
    </section>

    <section class="story-ihd">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-6">
                    <a data-bs-toggle="modal" data-bs-target="#story-3" style="cursor: pointer;">
                        <div class="card" data-aos="fade-right">
                            <div class="card-body p-0">
                                <img src="assets/images/story-3.webp" class="img-card-ihd me-3" alt="..." style="float: left; width: 45%;">
                                <p class="text-card-story mt-5">
                                    <img src="assets/images/motif-read-blue.svg" alt="motif-read" class="me-2" width="40">Jeni's Story
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a  data-bs-toggle="modal" data-bs-target="#story-4" style="cursor: pointer;">
                        <div class="card" data-aos="fade-left">
                            <div class="card-body p-0">
                                <img src="assets/images/story-4.webp" class="img-card-ihd me-3" alt="..." style="float: left; width: 45%;">
                                <p class="text-card-story mt-5">
                                    <img src="assets/images/motif-read-blue.svg" alt="motif-read" class="me-2" width="40">Hasanah's Story
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    {!!$contents->Content->content_3!!}
                </p>
            </div>
        </div>
    </section>

    <section class="story-ihd">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-sm-6">
                    <a data-bs-toggle="modal" data-bs-target="#story-5" style="cursor: pointer;">
                        <div class="card" data-aos="fade-right">
                            <div class="card-body p-0">
                                <img src="assets/images/story-5.jpg" class="img-card-ihd me-3" alt="..." style="float: left; width: 45%;">
                                <p class="text-card-story mt-5">
                                    <img src="assets/images/motif-read-blue.svg" alt="motif-read" class="me-2" width="40">Helwana’s Story
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">
                    {!!$contents->Content->content_4!!}
                </p>
            </div>
        </div>
    </section>
    @endforeach
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/united-nation/assets/library/aos-master/dist/aos.css')}}">
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
                "<img alt='Slider' src='assets/images/prev-btn.svg'/>",
                "<img alt='Slider' src='assets/images/next-btn.svg'/>"],
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
        "<img alt='Slider' src='assets/images/prev-btn.svg'/>",
        "<img alt='Slider' src='assets/images/next-btn.svg'/>"],
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
