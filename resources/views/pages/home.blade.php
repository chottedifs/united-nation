@extends('layouts.master-app')

@section('content')
    <section class="about">
        <div class="container">
            <div class="row">
                <h3 class="text-title">About This Report</h3>
            </div>
            <div class="row mb-4">
                <p class="text-content" style="font-size: 18px;">
                    <img src="{{ $content->Content->image_1 }}" alt="" class="img-content me-4" style="float: left;" width="50%">
                    {!!$content->Content->content_1!!}
                </p>
            </div>
        </div>
    </section>

    <section class="foreword">
        <div class="container">
            <div class="row">
                <h3 class="text-title">Foreword</h3>
            </div>
            <div class="row mb-4">
                @foreach ($story as $stories)
                    <div class="col-sm-12 col-md-6">
                        <a data-bs-toggle="modal" data-bs-target="#story-{{ $stories->Story->id }}" style="cursor: pointer;">
                            <div class="card" data-aos="fade-right">
                                <div class="card-body p-0">
                                    <img src="{{ $stories->Story->image_cover }}" class="img-card-ihd me-3" alt="stories-foreword" style="float: left; width: 50%;">
                                    <p class="text-card-story">
                                        <span class="text-name">{{ ($stories->Story->name) }}</span>
                                    <p class="text-occupation">{{($stories->Story->position)}}</p>
                                    <span class="read-more read-more d-none d-sm-block d-md-block"><img src="{{ asset('template/united-nation/assets/images/motif-read.svg')}}" alt="motif-read" class="me-2" width="20">Read more</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ulap-doyo">
        <div class="container">
            <div class="row">
                <h3 class="text-title">The Ulap Doyo Pattern</h3>
            </div>
            <div class="row mb-4">
                <p class="text-content" style="font-size: 18px;">
                    <img src="{{ $content->Content->image_2 }}" alt="" class="img-content me-4" style="float: left;" width="50%">
                    {!!$content->Content->content_2!!}
                </p>
            </div>
        </div>
    </section>

    <!-- Modal Story -->
    @foreach ($story as $stories)
        <div class="modal fade" id="story-{{$stories->Story->id}}" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body pt-0 pb-0">
                    <div class="row">
                            <div class="col-lg-5 p-0">
                                <img src="{{ $stories->Story->image_box }}" class="img-responsive me-3" alt="valerie" width="100%" height="100%">
                            </div>
                        <div class="col-lg-7 bg-color-bluedark bg-box-story">
                            <button type="button" class="btn-close me-3 mb-3 my-3 bg-white" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>
                            <p class="text-content text-white" style="font-size: 13px; padding: 40px 20px 40px 20px">
                                <span class="text-name-box">{{ ($stories->Story->name) }}</span><br>
                                <span class="text-occupation-box">{{ ($stories->Story->position) }}</span> <br><br>
                                {!!$stories->Story->description!!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    <!-- Modal Story -->
    @endforeach
@endsection

@push('style')
    <style>
    section .jumbotron {
        height: 650px;
        background-image: url('{{$page->image_cover}}');
        background-repeat: no-repeat;
        background-size: cover;
        max-width: 100%;
    }
    </style>
@endpush
