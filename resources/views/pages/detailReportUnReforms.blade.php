@extends('layouts.master-app')

@section('content')
    <section class="carousel-ihd">
        <div class="container">
            <div class="row mt-5">
                <h3 class="text-title">{{$unReports->title}}</h3>
            </div>
        </div>
    </section>

    <section class="content-ihd">
        <div class="container">
            <div class="row">
                <p class="text-content">

                    @if($unReports->slug == "our-common-agenda")
                        @if($unReports->image_1)
                        <img src="{{ $unReports->image_1 }}" alt="our-common" class="img-fluid ms-5 img-responsiv" style="float: right;" width="40%">
                        @endif
                    {!!$unReports->content_1!!}
                    @endif

                    @if($unReports->slug == "how-we-walk-the-talk-on-leaving-no-one-behind")
                        {!!$unReports->content_1!!}
                            <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> The No Manel Pledge</span> <br><br>
                        @if($unReports->content_2)
                        {!!$unReports->content_2!!}
                        @endif
                            <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> Scorecards to Measure Our Progress on Leaving No One Behind</span> <br><br>
                        @if($unReports->content_3)
                        {!!$unReports->content_3!!}
                        @endif
                    @endif

                    @if($unReports->slug == "transparancy-and-accountability")
                        {!!$unReports->content_1!!}
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> Joint Work Plans</span> <br><br>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-content">
                                        {!!$unReports->content_2!!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> Monitoring and Evaluation</span><br><br>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-content">
                                        {!!$unReports->content_3!!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> UN INFO</span><br><br>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-content">
                                        {!!$unReports->content_4!!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> Joint Evaluations</span><br><br>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-content">
                                        {!!$unReports->content_5!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($unReports->slug == "data-driven-interventions")
                        <section class="content-ihd">
                            <div class="container">
                                <div class="row">
                                    <p class="text-content">
                                        {!!$unReports->content_1!!}
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> SDG Data</span> <br><br>
                                        {!!$unReports->content_2!!}
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> Data on Disabilities in Indonesia and Leaving No One Behind</span><br><br>
                                        {!!$unReports->content_3!!}
                                    </p>
                                </div>
                                <div class="row py-0">
                                    <p class="text-content">
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> DOMES</span><br><br>
                                        <img src="{{ $unReports->image_4 }}" alt="" class="img-fluid me-4 img-content img-responsiv" style="float: left;" width="45%">
                                        {!!$unReports->content_4!!}
                                    </p>
                                </div>
                                <div class="row mb-5">
                                    <p class="text-content">
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> OURS</span><br><br>
                                        <img src="{{ $unReports->image_5 }}" alt="" class="img-fluid me-4 img-content img-responsiv" style="float: left;" width="45%">
                                        {!!$unReports->content_5!!}
                                    </p>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if($unReports->slug == "the-un-efficiency-agenda")
                        <section class="content-ihd">
                            <div class="container">
                                <div class="row mb-5">
                                    <p class="text-content">
                                        {!!$unReports->content_1!!}
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> The Business Operations Strategy</span> <br><br>
                                        {!!$unReports->content_2!!}
                                        <span class="list-text"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif" width="40" class="me-3"> The Operations Management Team</span><br><br>
                                        {!!$unReports->content_3!!}
                                        <img src="{{ $unReports->image_3 }}" alt="" width="100%" class="shadow-sm">
                                    </p>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if($unReports->slug == "mutual-support-through-the-pandemic")
                        <section class="content-ihd">
                            <div class="container">
                                <div class="row mb-5">
                                    <p class="text-content">
                                        {!!$unReports->content_1!!}
                                        <ul class="text-content">
                                            <div class="card shadow-sm" style="padding: 10px;" data-aos="fade-right">
                                                <li class="list-motif" style="margin: 0px;">
                                                    {!!$unReports->content_2!!}
                                                </li>
                                            </div>
                                            <div class="card shadow-sm" style="padding: 10px; margin-top: 20px;" data-aos="fade-right">
                                                <li class="list-motif" style="margin: 0px;">
                                                    {!!$unReports->content_3!!}
                                                </li>
                                            </div>
                                            <div class="card shadow-sm" style="padding: 10px; margin-top: 20px;" data-aos="fade-right">
                                                <li class="list-motif" style="margin: 0px;">
                                                    {!!$unReports->content_4!!}
                                                </li>
                                            </div>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if($unReports->slug == "un-volunteers-in-2021")
                        {!!$unReports->content_1!!}
                    @endif

                    @if($unReports->slug == "resources-and-expertise-to-guard-against-sexual-exploitation-abuse-and-harassment")
                        <section class="content-ihd">
                            <div class="container">
                                <div class="row mb-5">
                                    <p class="text-content">
                                        {!!$unReports->content_1!!}
                                        <ul class="text-content">
                                            <div class="card" class="card-list" style="padding: 10px;"  data-aos="fade-right">
                                                <li class="list-motif" style="margin: 0px;">
                                                    {!!$unReports->content_2!!}
                                                </li>
                                            </div>
                                            <div class="card" class="card-list" style="padding: 10px; margin-top: 20px;"  data-aos="fade-right">
                                                <li class="list-motif" style="margin: 0px;">
                                                    {!!$unReports->content_3!!}
                                                </li>
                                            </div>
                                            <div class="card" style="padding: 10px; margin-top: 20px;"  data-aos="fade-right">
                                                <li class="list-motif" style="margin: 0px;">
                                                    {!!$unReports->content_4!!}
                                                </li>
                                            </div>
                                            <div class="card" style="padding: 10px; margin-top: 20px;"  data-aos="fade-right">
                                                <li class="list-motif" style="margin: 0px;">
                                                    {!!$unReports->content_5!!}
                                                </li>
                                            </div>
                                            <div class="card" style="padding: 10px; margin-top: 20px;"  data-aos="fade-right">
                                                <li class="list-motif" style="margin: 0px;">
                                                    {!!$unReports->content_6!!}
                                                </li>
                                            </div>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </section>
                    @endif

                </p>
            </div>
        </div>

        @if($unReports->slug == "how-we-walk-the-talk-on-leaving-no-one-behind")
            <section class="content-ihd">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-4">
                            <a data-bs-toggle="modal" data-bs-target="#scorecard1" style="cursor: pointer;" class="story-card-box">
                                <div class="card pt-3 pb-3 shadow-sm">
                                    <div class="card-body">
                                        <p class="card-text">The Gender Scorecard</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a data-bs-toggle="modal" data-bs-target="#scorecard2" style="cursor: pointer;" class="story-card-box">
                                <div class="card pt-3 pb-3 shadow-sm">
                                    <div class="card-body">
                                        <p class="card-text">The Disability Scorecard</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a data-bs-toggle="modal" data-bs-target="#scorecard3" style="cursor: pointer;" class="story-card-box">
                                <div class="card pt-3 pb-3 shadow-sm">
                                    <div class="card-body">
                                        <p class="card-text">The Youth Scorecard</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section class="read-info">
            <div class="container">
                <div class="row mb-5">
                    <p>
                        <a href="{{ route('unReforms') }}" class="btn-back"><i class="bi bi-chevron-left me-1"></i>Back</a>
                    </p>
                </div>
            </div>
        </section>
    </section>


    <div class="modal fade" id="scorecard1" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
          <div class="modal-content p-3">
              <button type="button" class="btn-close ms-auto mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body bg-box-scorecard">
                <div class="row">
                    <span class="text-modal-story"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif-read" class="me-2" width="40">The Gender Scorecard</span><br>
                </div>
                <div class="row mt-4 mb-4">
                    <div id="scoredcard-gender"></div>
                </div>
                <div class="row">
                    <p class="text-content">
                        The UNCT System-wide Action Plan (UNCT-SWAP) Gender Equality Scorecard monitors progress on gender mainstreaming across the UN system in Indonesia. The scorecard encompasses 15 performance indicators that address the UNCT’s performance against benchmarks agreed by the UN Sustainable Development Goals Group. <br><br>

                        The UNCT-SWAP reporting follows a two-pronged methodology: a comprehensive assessment at the UNSDCF planning stage, undertaken in 2019 in Indonesia, and annual progress updates. The 2021 annual progress update shows goodexcellent progress on gender equality, with the UNCT either meeting or exceeding 11 of the scorecard’s 15 performance indicators. That’s a significant improvement over 2020, when just seven of those 15 indicators were met or exceeded. For example, the performance indicator on gender parity evaluates whether UNCTs have set up a system for monitoring gender parity in staffing. In 2020 such a monitoring tool was developed, with the UN in Indonesia to monitoring gender parity in staffing across the entire UNCT on a quarter-yearly basis. The proportion of women in the UNCT rose from 51% in 2020, to 53% in 2021. An area that requires more attention in 2022 is mainstreaming gender into Joint Programmes, Cooperation Framework monitoring and evaluation, and resource allocation and tracking. <br><br>

                    </p>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="scorecard2" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
          <div class="modal-content p-3">
              <button type="button" class="btn-close ms-auto mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body bg-box-scorecard">
                <div class="row">
                    <span class="text-modal-story"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif-read" class="me-2" width="40">The Disability Scorecard</span><br>
                </div>
                <div class="row mt-4 mb-4">
                    <div id="scoredcard-disability"></div>
                </div>
                <div class="row">
                    <p class="text-content">
                        The UN’s global Disability Inclusion Scorecard shows the UN in Indonesia made progress on disability inclusion in 2021 across areas including leadership, the procurement of goods and services, employment, and communications. In total, seven of the scorecard’s 14 indicators showed the UNCT either meeting or exceeding the criteria in 2021, compared to only four in 2020. <br><br>

                        For example, the UNCT exceeded the disability inclusion requirement on communications. The UN Communications Group (UNCG) advanced disability inclusion in several ways: it disseminated the global UN Disability-Inclusive Communications Guidelines among all UNCT communication officers, and it engaged in joint outreach activities such as a UN media briefing on recovering better that incorporated disability inclusion guidelines. The UNCG also foregrounded people with disabilities in communications campaigns, such as the Show Your Sign competition in December 2021, which promoted the use of Indonesian sign language to break down communication barriers. <br><br>

                        This UNCT will take steps to improve disability inclusion in 2022, including making UN premises, ICT and Digital tools more accessible and inclusive, and advancing inclusive human resources services.  <br><br>
                    </p>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="scorecard3" aria-hidden="true" aria-labelledby="story-1" tabindex="-1">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
          <div class="modal-content p-3">
              <button type="button" class="btn-close ms-auto mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body bg-box-scorecard">
                <div class="row">
                    <span class="text-modal-story"><img src="{{ Storage::url('public/images/united-nation/motif-title-story.svg') }}" alt="motif-read" class="me-2" width="40">The Youth Scorecard</span><br>
                </div>
                <div class="row mt-4 mb-4">
                    <img src="{{ Storage::url('public/images/united-nation/walk-infografis-1.svg') }}" alt="motif" width="40" class="me-3" data-aos="fade-in">
                    <!-- <div id="scoredcard-gender"></div> -->
                </div>
                <div class="row">
                    <p class="text-content">
                        The 2021 Youth scorecard shows the UN in Indonesia made progress in implementing the global Youth 2030 Strategy’s three main pillars: peace and security, human rights and sustainable development, which is reflected through 13 out of the scorecard’s 26 indicators improving on their 2020 status. <br><br>

                        Notable 2021 initiatives on youth engagement include the UN’s assistance to BAPPENAS on organizing the first youth consultation on the Voluntary National Review to ensure that adolescents’ and young people’s voices are incorporated in national development planning. <br><b></b>

                        Despite this progress, the scorecard shows that more concerted efforts are required to enhance the implementation of joint UN programming with and for youth. Priorities identified for 2021 include familiarising all UN staff with the Youth 2030 Strategy and enhancing transparency through making reporting on joint programming for youth publicly available. <br><br>

                    </p>
                </div>
            </div>
          </div>
        </div>
    </div>
    <!-- End Modal Story -->
@endsection


@push('style')
    <link rel="stylesheet" href={{ asset('template/united-nation/assets/library/aos-master/dist/aos.css')}}">
@endpush

@push('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="{{ asset('template/united-nation/assets/script/script.js') }}"></script>
<script>
        Highcharts.chart('scoredcard-gender', {
        chart: {
            type: 'bar'
        },

        title: {
            text: ''
        },

        xAxis: {
            categories: ['The Gender Scorecard'],
            title: {
            text: null
            }
        },

        plotOptions: {
            bar: {
            dataLabels: {
                enabled: true
            }
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Total Performance Indicator',
            data: [15]
        }, {
            name: '2021',
            data: [11]
        }, {
            name: '2020',
            data: [7]
        }]
        });
    </script>
<script>
        Highcharts.chart('scoredcard-disability', {
        chart: {
            type: 'bar'
        },

        title: {
            text: ''
        },

        xAxis: {
            categories: ['The Disability Scorecard'],
            title: {
            text: null
            }
        },

        plotOptions: {
            bar: {
            dataLabels: {
                enabled: true
            }
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Total Performance Indicator',
            data: [14]
        }, {
            name: '2021',
            data: [7]
        }, {
            name: '2020',
            data: [4]
        }]
        });
    </script>

@endpush
