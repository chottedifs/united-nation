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

    <section class="read-info">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4">
                    <a href="food-protection.html#title" class="read-info-card" data-aos="fade-in">
                        <img src="../assets/images/sub-report-2.svg" alt="" class="read-info-img shadow-sm">
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="strong-health.html#title" class="read-info-card" data-aos="fade-in">
                        <img src="../assets/images/sub-report-3.svg" alt="" class="read-info-img shadow-sm">
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="better-newborn.html#title" class="read-info-card" data-aos="fade-in">
                        <img src="../assets/images/sub-report-4.svg" alt="" class="read-info-img shadow-sm">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
