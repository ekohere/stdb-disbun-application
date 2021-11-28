@extends('web_frontend.layout.app')
@section('content')
    <style>
        p {
            color: black;
            font-weight: 500;
        }
    </style>
    <section class="blog blog-single white-bg pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="text-left mb-50">
                        <div class="font-large-1 text-bold-600 text-black mb-10">{{ $agendaDetail->title }}</div>
                        <div class="font-medium-1 text-black">{!! $agendaDetail->content !!}</div>
                        <div class="text-gray-dark mt-20 font-medium-1 text-bold-500">
                            <span><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($agendaDetail->schedule_date)->isoFormat('dddd, D MMMM Y') }}</span><br>
                            <span><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($agendaDetail->schedule_time)->format('h:i A') }}</span><br>
                            <span><i class="fa fa-bookmark"></i> {{ $agendaDetail['agendaCategory']['name'] }}</span>
                        </div>
                    </div>
{{--                    <div class="divider outset mb-20"></div>--}}

                </div>
                <div class="col-lg-4">
{{--                    <div class="sidebar-widget mt-30 mb-10">--}}
{{--                        <div class="widget-search border rounded">--}}
{{--                            <i class="fa fa-search"></i>--}}
{{--                            <input type="search" class="form-control" placeholder="Cari....">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @include('web_frontend.include.berita_lainnya')--}}
{{--                    @include('web_frontend.include.indeks_post')--}}
                    <div class="fb-page rounded mb-20" style="width: 100%" data-href="https://www.facebook.com/humasdprdkaltimofficial/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/humasdprdkaltimofficial/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/humasdprdkaltimofficial/">DPRD Provinsi Kalimantan Timur</a></blockquote></div>
                    <a class="twitter-timeline mb-30" data-theme="dark" data-width="" data-height="500" href="https://twitter.com/dprd_kaltim?ref_src=twsrc%5Etfw" >Tweets by dprd_kaltim</a>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link type="text/css" rel="stylesheet" href="{!! asset('css/ycp.css') !!}" />

    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0&appId=298637494983635&autoLogAppEvents=1" nonce="hYx81EtD"></script>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection
@section('scripts')
    <!-- jQuery -->
    <script src="{!! asset('js/ycp.js') !!}"></script>
    <script>
        $(function() {

            $("#channel-dprd-kaltim").ycp({
                apikey : 'AIzaSyBy_wcF4Lnkd9uigQCuJaRNUNtgQ6RIXdI',
                playlist : 7,
                autoplay : false,
                related : true
            });

        });
    </script>
@endsection
