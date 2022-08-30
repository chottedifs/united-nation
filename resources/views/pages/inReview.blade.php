@extends('layouts.master-app')

@section('content')
        <section class="about">
            <div class="container">
                <div class="row">
                    <h3 class="text-title">{{($page->title)}}</h3>
                </div>
                <div class="row mb-4">
                    <p class="text-content">
                        <img src="{{ $content->Content->image_1 }}" class="img-fluid me-4" style="float: left; width: 40%;" alt="img-conten-1">
                        {!!$content->Content->content_1!!}
                    </p>
                </div>
                <div class="row mb-2">
                    <p class="text-content">
                        <img src="{{ $content->Content->image_2 }}" class="img-fluid ms-4" style="float: right; width: 40%;" alt="img-conten-2">
                        {!!$content->Content->content_2!!}
                    </p>
                </div>
                <div class="row mb-2">
                    <p class="text-content">
                        {!!$content->Content->content_3!!}
                    </p>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-12">
                        <div class="card p-3 shadow-sm border-0">
                            <div id="chart-review"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <p class="text-content">
                        {!!$content->Content->content_4!!}
                    </p>
                </div>
            </div>
        </section>
@endsection

@push('style')
<style>
    section .jumbotron {
        height: 650px;
        background-image: url({{$page->image_cover}});
        background-repeat: no-repeat;
        background-size: cover;
    }
</sty
@endpush

@push('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
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
    Highcharts.chart('chart-review', {

    chart: {
        style: {
            fontFamily: 'Montserrat, bold, sans-serif'
        }
    },

    title: {
        text: 'Indonesia Economic Growth',
    },

    subtitle: {
            text: 'Source: BPS (Constant Price)',
    },

    xAxis: {
    accessibility: {
        rangeDescription: 'Range: 2010 to 2017'
    }
    },

    plotOptions: {
        series: {
                label: {
                connectorAllowed: false
                },
                pointStart: 2015
        },
        line : {
                dataLabels : {
                    enabled : true,
                    // formatter : function() {
                    //     return this.y + '%';
                    // }
                }
        }
    },

    series: [{
        name: 'Per Capita Income Growth (%)',
        data: [7.64, 6.21, 8.35, 7.90, 5.89, -3.37, 9.28],
        marker: {
            symbol: 'url(assets/images/motif-red.svg)'
        },
        color: '#ED4328'
    },
    {
            name: 'GDP Growth (%)',
            data: [4.88, 5.03, 5.07, 5.17, 5.02,-2.07, 3.69],
            marker: {
                symbol: 'url(assets/images/motif-blue.svg)'
            },
            color: '#278DE1'
        },
    ],

    responsive: {
    rules: [{
        condition: {
        maxWidth: 500
        }
    }]
    },

    yAxis: {
        visible: false,
    },

    credits: {
        enabled: false
    },

    });
</script>
@endpush
