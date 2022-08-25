<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Annual Results Report | United Nation Indonesia {{ date('Y') }}</title>

    @include('components.frontend.style')
</head>
<body>
    <header>
        <nav class="navbar fixed-top shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('template/united-nation/assets/images/logo-uncro.svg') }}" alt="logo-uncro-indonesia" class="img-logo">
                </a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Scroll Up -->
        <a class="shadow-sm" id="scroll-up"><i class="bi bi-chevron-up"></i>Top</a>
        <!-- End Scroll Up -->

         <!-- Floating menu -->
         <div class="action shadow-sm" onclick="actionToggle();">
            <span class="toggle-menu"><i class="bi bi-list"></i></span>
            <span class="text-menu">Menu</span>
            <ul class="navbar-nav shadow-sm">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">A Year in Review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inclusive Human Development</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Economic Tranformation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Green Development, Climate Change, and Natural Disasters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Innovation to Accelerate Progress Towards the SDGs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">UN Reform in Indonesia</a>
                </li>
            </ul>
        </div>
        <!-- End Floating menu -->

        <section class="hero">
            <div class="jumbotron p-4 mb-4">
                <div class="container py-5">
                  <p class="text-jumbotron">
                    United Nations In Indonesia <br>
                    <span>Country Results Report 2021</span>
                  </p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-2" style="position: relative;">
                        <div >
                            <a href="review-year.html" class="menus bg-color-bluelight">A Year in Review</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2" style="position: relative;">
                        <div>
                            <a href="inclusive-human.html" class="menus bg-color-red">Inclusive Human Development</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2"  style="position: relative;">
                        <div>
                            <a href="economic-transformation.html" class="menus bg-color-yellow">Economic Transformation</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2"  style="position: relative;">
                        <div>
                            <a href="review-year.html" class="menus bg-color-orange">Green Development, Climate Change, and Natural Disasters</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2"  style="position: relative;">
                        <div>
                            <a href="review-year.html" class="menus bg-color-greenlight">Innovation to Accelerate Progress Towards the SDGs</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2"  style="position: relative;">
                        <div>
                            <a href="un-reform.html" class="menus bg-color-greendark">UN Reform in Indonesia</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="row">
                    <h3 class="text-title">About Us</h3>
                </div>
                <div class="row mb-4">
                    <p class="text-content"  style="font-size: 18px;">
                        <img src="{{('template/united-nation/assets/images/img-content-7.webp')}}" style="float: left;" class="me-4" width="45%" height="100%" alt="">
                        The year 2021 challenged Indonesia and the UN System like few others in recent
                        memory. As Indonesia grappled with the socio-economic fallout of COVID-19's first
                        year, it was hit with a devasting wave of infections driven by COVID-19's Delta
                        Variant. <br><br>
                        These challenges played out against the backdrop of the first year of the United
                        Nations Sustainable Development Cooperation Framework 2021-2025 (UNSDCF), a
                        five-year strategy agreed between the UN and the Government of Indonesia to
                        advance the Sustainable Development Goals (SDGs) and Indonesia's national
                        development priorities. <br><br>
                        The UN in Indonesia’s Country Results Report 2021 details the collective
                        achievements of the UN and the Government of Indonesia. The results it
                        contains—organised under the UNSDCF's four outcome areas of inclusive Human
                        Development, Economic Transformation, Green Development, and Innovation to
                        Accelerate the SDGs—evidence our shared commitment to leaving no one behind. <br><br>
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
                    <div class="col-sm-6">
                        <a data-bs-toggle="modal" data-bs-target="#story-{{ $stories->id }}" style="cursor: pointer;">
                            <div class="card" data-aos="fade-right">
                                <div class="card-body p-0">
                                    <img src="{{ Storage::url($stories->image) }}" class="img-card-ihd me-3" alt="vallerie" style="float: left; width: 49%;">
                                    <p class="text-card-story">
                                        <span class="text-name">{{ ($stories->name) }}</span>
                                    <p class="text-occupation">{{($stories->position)}}</p>
                                    <span class="read-more"><img src="{{ asset('template/united-nation/assets/images/motif-read.svg')}}" alt="motif-read" class="me-2" width="20">Read more</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-sm-6">
                        <a  data-bs-toggle="modal" data-bs-target="#story-2" style="cursor: pointer;">
                            <div class="card" data-aos="fade-left">
                                <div class="card-body p-0">
                                    <img src="{{ asset('template/united-nation/assets/images/suharso.webp') }}" class="img-card-ihd me-3" alt="suharso" style="float: left; width: 50%;">
                                    <p class="text-card-story">
                                        <span class="text-name">Suharso Monoarfa</span>
                                    <p class="text-occupation">Minister of National Development Planning/Head of National Development Planning Agency (Bappenas)</p>
                                    <span class="read-more"><img src="assets/images/motif-read.svg" alt="motif-read" class="me-2" width="20">Read more</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div> --}}
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
                        The boat motif that appears throughout the report was inspired by the <i>Ulap
                        Doyo</i> weaving technique that originated with the Dayak people of
                        Kalimantan. It symbolises how the UN, the Government, and Indonesian
                        people remained steadfast to the SDGs and came together to navigate the
                        treacherous waters of 2021. <br><br>
                    </p>
                </div>
            </div>
        </section>

        <!-- Modal Story -->
        @foreach ($story as $stories)
        <div class="modal fade" id="story-{{$stories->id}}" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body pt-0 pb-0">
                    <div class="row">
                            <div class="col-lg-5 p-0">
                                <img src="{{ Storage::url($stories->image) }}" class="img-responsive me-3" alt="valerie" width="100%" height="100%">
                            </div>
                        <div class="col-lg-7 bg-color-bluedark bg-box-story">
                            <button type="button" class="btn-close me-3 mb-3 my-3 bg-white" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>
                            <p class="text-content text-white" style="font-size: 13px; padding: 40px 20px 40px 20px">
                                <span class="text-name-box">{{ ($stories->name) }}</span><br>
                                <span class="text-occupation-box">{{ ($stories->position) }}</span> <br><br>
                                {{ ($stories->description) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach

        {{-- <div class="modal fade" id="story-2" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body pt-0 pb-0">
                    <div class="row">
                            <div class="col-lg-5 p-0">
                            <img src="assets/images/story-suharso.png" class="img-responsive me-3" alt="valerie" width="100%" height="100%">
                            </div>
                        <div class="col-lg-7 bg-color-bluedark bg-box-story">
                            <button type="button" class="btn-close me-3 mb-3 my-3 bg-white" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>
                            <p class="text-content text-white" style="font-size: 13px; padding: 40px 20px 40px 20px">
                                <span class="text-name-box"></span><br>
                                <span class="text-occupation-box">Minister of National Development Planning/Head of National Development Planning Agency (Bappenas)
                                </span> <br><br>
                                I would first like to compliment the UN Agencies in Indonesia for the United Nations Sustainable Development Cooperation Framework (UNSDCF) Results Report 2021. This report highlights the cordial relationship between the Government of Indonesia and the United Nations System and this report affirms that relationship as we work together to advance Indonesia’s development agenda and priorities, particularly the Sustainable Development Goals (SDGs) 2030 and Indonesia’s National Medium- Term Development Plan (RPJMN) 2020-2024. The Report includes the progress and accomplishments to deliver four outcomes of UNSDCF 2021-2025: (i) Inclusive Human Development; (ii) Economic Transformation; (iii) Green Development, Climate Change and Natural Disasters; and (iv) Innovation to Accelerate Progress towards the SDGs. <br><br>
                                I wish to extend my deepest appreciation to all UN agencies and government partners for all their joint works, especially in facing the challenges during the ongoing COVID-19 pandemic. In 2021, we aimed for better and stronger recovery that drove us to reshape our development priorities and strategies to support health and social recovery efforts. Our partnership with the UN agencies is crucial to achieve resilient recovery including the implementation of UN Joint program through the “UN COVID-19 Multi-Partner Trust Fund” to scale up inclusive social protection programs and the UN Joint program on “Adaptive Social Protection for all in Indonesia” to ensure that the most vulnerable groups, including women and children, are protected against adverse socio-economic impact of the crisis. <br><br>
                                As we approach the deadline to achieve the SDGs, the next eight years would require stronger collaboration and strategic partnerships between the Government of Indonesia and the UN to further benefit the people of Indonesia. Significant resource mobilization and innovative financing are crucial to setting our work towards achieving the SDGs back on track, amid the setbacks caused by the pandemic and the financing gap. Under the coordination of the UN Resident Coordinator Office Indonesia, the UN system can play a greater role to address this matter and resolve the SDGs financing gap. We should redouble our efforts to continue strengthening data analysis, technology, digitalization, and innovation to provide recommendations for government strategies and policies, and reaffirm our shared commitment to leave no one behind that can greatly contribute to achieving the SDGs by 2030. <br><br>
                                In this context, I am honored to highlight that Indonesia assumes a most important role as G20 Presidency in 2022 under the collective actions to “recover together, recover stronger”, with Bappenas as the Chair of the Development Working Group. We will embrace this momentum for stronger commitment and concrete action to recovery and resilience, and to implement the global development agenda. <br><br>
                                I would like to, once again, thank all UN agencies for their enduring support to Indonesia over the past decades and I look forward to our continued partnership. <br><br>
                                Together, the Government of the Republic of Indonesia and the United Nations will play an impactful role to advance the SDGs while ensuring that no one is left behind. <br><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div> --}}
        <!-- end modals -->

    @include('components.frontend.footer')

    </main>

    @include('components.frontend.script')

</body>
</html>
