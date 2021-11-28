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
                    <div class="font-medium-4 text-bold-600 text-black text-uppercase mb-30">Agenda DPRD</div>
{{--                    <div class="divider outset mb-20"></div>--}}

                    @foreach($agendaDprd as $item)
                        <a href="{{ url('agenda/agenda-detail/'.$item->slug) }}">
                            <span class="text-bold-600 text-red"><i class="fa fa-bullhorn"></i> Agenda DPRD</span>
                            <div class="font-medium-2 text-bold-600 text-black">{!! $item->title !!}</div>
                            <div class="font-small-3 text-gray-dark desc-p mt-1">{!! $item->content !!}</div>
                            <div class="text-green mt-10 font-small-2 text-bold-500">
                                <span><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($item->schedule_date)->isoFormat('dddd, D MMMM Y') }}</span>
                                <span class="pl-10"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($item->schedule_time)->format('h:i A') }}</span>
                                <span class="pl-10"><i class="fa fa-bookmark"></i> {{ $item['agendaCategory']['name'] }}</span>
                            </div>
                        </a>
                        <div class="divider mt-10 mb-10"></div>
                    @endforeach
                    <div class="entry-pagination mt-40 mb-40">
                        <nav aria-label="Page navigation example text-center">
                            <style>
                                .pagination {
                                    justify-content: center;
                                }
                            </style>
                            {{ $agendaDprd->links() }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
{{--                    <div class="sidebar-widget mt-30 mb-10">--}}
{{--                        <div class="widget-search border rounded">--}}
{{--                            <i class="fa fa-search"></i>--}}
{{--                            <input type="search" class="form-control" placeholder="Cari....">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @include('web_frontend.include.berita_lainnya')
                    @include('web_frontend.include.indeks_post')
                    <div class="fb-page rounded mb-20" style="width: 100%" data-href="https://www.facebook.com/humasdprdkaltimofficial/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/humasdprdkaltimofficial/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/humasdprdkaltimofficial/">DPRD Provinsi Kalimantan Timur</a></blockquote></div>
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
