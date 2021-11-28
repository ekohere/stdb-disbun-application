@extends('web_frontend.layout.app')
@section('content')
{{--    <section class="slider-parallax bg-overlay-black-50 listing-banner parallax" data-jarallax='{"speed": 0.6}' style="background-image: url({{ asset('image/bg/bgdpr.jpg') }})">--}}
{{--    </section>--}}
    <section class="page-section-pb pb-20">
        <div class="container p-0" style="width: 100%;max-width: 100%">
            <div class="row m-0">
                <div class="col-lg-12 col-md-12 p-0">
                    <div class="owl-carousel" data-nav-dots="false" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
                        @foreach($postInSlider as $item)
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div style="background-image: url('{!! $item->getFirstMediaUrl('default','cover') !!}');background-size: cover;background-repeat: no-repeat;background-position: center">
                                            <div class="padding-responsive">
{{--                                                <h4 class="text-white p-4 mb-0">Legislator Soroti Rendahnya Realisasi Kartu Prakerja di Kota Sukabumi</h4>--}}
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="col-lg-3 col-sm-4">--}}
{{--                                    </div>--}}
                                    <div class="col-12" style="background-image: linear-gradient(rgba(255,255,255,0),#97FF00 ,#48BA00);width: 100%; position: absolute;bottom: 0;right: 0;">
                                        <div class="row">
                                            <div class="col-lg-12 pb-4 pt-40 text-center">
                                                <span class="text-white ">DEWAN PERWAKILAN RAKYAT DAERAH KAL-TIM</span>
                                                <h3 class="text-black mb-0 text-bold-700 desc-p-center"><a href="{{ url('post/'.$item->slug) }}">{{ $item->title }}</a></h3>
                                                <div class="text-black font-small-3 mt-2"><span class="badge badge-pill badge-warning">{{ $item['postCategory']['name'] }}</span> <i class="fa fa-circle pl-2 pr-2"> </i> {{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="image-left" style="position: absolute;bottom: 0;top:0;right: 0;background: url({{ asset('image/bg/back_gallery_2.png') }}) no-repeat;background-size: cover;width: 540px;height: 100%;--}}
{{--                                    justify-content: end;align-items: start;">--}}
{{--                                    <img class="mt-70 mr-50" src="{{ asset('image/logo/LOGO-DPRD-KALTIM.png') }}" style="height: 240px;width: auto;  justify-content: end;align-items: start;" alt="">--}}
{{--                                </div>--}}
                            </div>
                        @endforeach
                        @foreach($galeriSlider as $item)
                            <div class="item">
                                <div class="row">
                                    <div class="col-12">
                                        <div style="background-image: url('{!! $item->getFirstMediaUrl('default','cover') !!}');background-size: cover;background-repeat: no-repeat;background-position: center">
                                            <div class="padding-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="background-image: linear-gradient(rgba(255,255,255,0),#97FF00 ,#48BA00);width: 100%; position: absolute;bottom: 0;right: 0;">
                                        <div class="row">
                                            <div class="col-lg-12 pb-4 pt-40 text-center">
                                                <span class="text-white ">DEWAN PERWAKILAN RAKYAT DAERAH KAL-TIM</span>
                                                <h3 class="text-black mb-0 text-bold-700  desc-p-center"><a href="{{ url('post/'.$item->slug) }}">{{ $item->title }}</a></h3>
                                                <div class="text-black font-small-3 mt-2"><span class="badge badge-pill badge-warning">Galeri DPRD</span> <i class="fa fa-circle pl-2 pr-2"> </i> {{ Carbon\Carbon::parse($item->event_date)->isoFormat('dddd, D MMMM Y') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="alerts-and-callouts mb-20 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-6 col-sm-12 col-md-offset-1">

                    @yield("middle_content")

                    <div class="section-title line-dabble mt-10 mb-20">
                        <div class="title text-bold-800 text-gray-dark font-small-3 text-uppercase"><i class="fa fa-youtube-play pr-2"></i>Youtube DPRD Provinsi Kalimantan Timur</div>
                    </div>
                    <!-- Selector by Id -->
                    <div id="channel-dprd-kaltim" data-ycp_title="Youtube DPRD Prov. Kalimantan Timur" data-ycp_channel="UCGBqtbZRxFShQggQDY3uAqQ"></div> <!-- By ChannelId -->
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12">
                    @if(!empty(\App\Models\Profile::where('key','banner')->value('value')))
                        <img class="img-fluid mb-20 mt-30" src="{{ asset(\App\Models\Profile::where('key','banner')->value('value')) }}" alt="">
                    @endif
                    @if(count($agenda) > 0)
                        <div class="section-title line-dabble mb-20">
                            <div class="title mb-0 text-bold-800 text-gray-dark font-small-3 text-uppercase"><i class="fa fa-bullhorn pr-2"></i>Agenda</div>
                        </div>
                        @foreach($agenda as $item)
                            <a href="{{ url('agenda/agenda-detail/'.$item->slug) }}" class="text-black font-small-2">
                                <div class=" text-bold-600">{{ $item->title }}</div>
                                <div class=" desc-p">{{ strip_tags($item->content,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si') }}</div>
                                <div><i class="fa fa-filter text-primary"></i> {{ $item['agendaCategory']['name'] }}</div>
                                <div><i class="fa fa-calendar text-primary"></i> {{ \Carbon\Carbon::parse($item->schedule_date)->isoFormat('dddd D MMMM Y') }}</div>
                                <div><i class="fa fa-clock-o text-primary"></i> {{ \Carbon\Carbon::parse($item->schedule_time)->format('H:i') }}</div>
                            </a>
                            <div class="divider mt-10 mb-10"></div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="section-title line-dabble mb-25 col-12">
                            <div class="title mb-0 text-bold-800 font-small-3 text-gray-dark"><a href="https://www.facebook.com/humasdprdkaltimofficial/" class="text-gray-dark text-uppercase"><i class="fa fa-facebook pr-2"></i>Facebook <i class="fa fa-angle-right text-primary pl-2 font-medium-1"></i> </a></div>
                        </div>
                        <div class="col-12">
                            <div class="fb-page rounded" style="width: 100%" data-href="https://www.facebook.com/humasdprdkaltimofficial/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/humasdprdkaltimofficial/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/humasdprdkaltimofficial/">DPRD Provinsi Kalimantan Timur</a></blockquote></div>
                        </div>
                        <!-- Plugin Facebook-->
                        <div class="section-title line-dabble mb-25 mt-30 col-12">
                            <div class="title mb-0 text-bold-800 font-small-3 text-gray-dark"><a href="https://twitter.com/dprd_kaltim?ref_src=twsrc%5Etfw" class="text-gray-dark text-uppercase"><i class="fa fa-twitter pr-2"></i>Twitter <i class="fa fa-angle-right text-primary pl-2 font-medium-1"></i> </a></div>
                        </div>
                        <div class="col-12">
                            <a class="twitter-timeline" data-theme="dark" data-width="" data-height="500" href="https://twitter.com/dprd_kaltim?ref_src=twsrc%5Etfw" >Tweets by dprd_kaltim</a>
                        </div>
                        <!-- Plugin Twitter-->

                        @if(isset($instagram))
                        <div class="section-title line-dabble mb-25 mt-30 col-12">
                            <div class="title mb-0 text-bold-800 font-small-3 text-gray-dark"><a target="_blank" href="https://www.instagram.com/dprdkaltimofficial/" class="text-gray-dark text-uppercase"><i class="fa fa-instagram pr-2"></i>Instagram <i class="fa fa-angle-right text-primary pl-2 font-medium-1"></i> </a></div>
                        </div>
                        <div class="col-12">
                            <div class="isotope columns-2 popup-gallery">
                                @foreach($instagram as $media)
                                    @if($loop->iteration <= 10)
                                        <a target="_blank" href="{{ url($media['permalink']) }}" class="grid-item">
                                            <div class="portfolio-item">
                                                <img src="{{ $media['url'] }}" alt="">
                                                {{--<div class="portfolio-overlay p-2" style="text-align: center;background: black">
                                                    <span class="mr-1"><i class="fa fa-heart"></i> {{ $media->getLikesCount() }}</span>
                                                    <span><i class="fa fa-comment"></i> {{ $media->getCommentsCount() }}</span>
                                                </div>--}}
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

{{--                    <img class="img-fluid mb-40 mt-20" src="{{ asset('image/bg/banner_static.png') }}" alt="">--}}
                </div>
            </div>
        </div>
    </section>

    <section class="white-bg o-hidden mb-40 mt-40 bg-transparent">
        <div class="container">
            <div class="section-title line-dabble mb-15">
                <div class="row">
                    <div class="col-7" style="align-self: center;justify-content: center">
                        <span class="text-bold-800 text-gray-dark font-small-3 text-uppercase"><i class="fa fa-users pr-2"></i>Anggota Dewan</span>
                    </div>
                    <div class="col-5 text-right"><a href="{{ url('semua-anggota-dewan') }}" class="btn btn-warning x-small font-small-2  text-bold-700">SELENGKAPNYA</a></div>
                </div>
                <div class="title text-bold-700 text-black text-uppercase"></div>
            </div>
        </div>
    </section>

@foreach($lembagaInContent as $itemInContent)
    <section class="pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title line-dabble mb-15">
                        <div class="title text-bold-800 text-gray-dark font-small-3 text-uppercase"><i class="fa fa-font-awesome pr-2"></i>{!! $itemInContent->name !!}</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="clients-list clients-border">
                        <ul class="list-unstyled">
                            @foreach($itemInContent->childs as $item)
                                <li>
                                    <a href="{!! route("alat-kelengkapan-dewan",[$item->slug]) !!}">
                                    <img class="img-fluid" src="{{ asset($item->getFirstMediaUrl('default','thumb'))}}" alt="">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach

{{--<!--Channel Youtube-->--}}
{{--<section class="pt-40 pb-40">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12 col-md-12">--}}
{{--                <div class="section-title line-dabble mb-15">--}}
{{--                    <div class="title text-bold-800 text-gray-dark font-small-3 text-uppercase"><i class="fa fa-youtube-play pr-2"></i>Youtube DPRD Provinsi Kalimantan Timur</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-12 col-md-12">--}}
{{--                <!-- Selector by Id -->--}}
{{--                <div id="channel-dprd-kaltim" data-ycp_title="Youtube DPRD Provinsi Kalimantan Timur" data-ycp_channel="UCGBqtbZRxFShQggQDY3uAqQ"></div> <!-- By ChannelId -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}


<section class="page-section-ptb bg-overlay-black-80 parallax" data-jarallax='{"speed": 0.6}' style="background: url({{ asset('image/bg/back_gallery.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-30">
                <div class="section-title text-center">
                    <h6 class="text-white">DPRD Provinsi Kalimantan Timur</h6>
                    <a href="{{ url('galeri-foto') }}" class="text-white title-effect dark font-large-1 text-bold-600">Galeri Foto</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($galeri as $item)
                @if($loop->first)
                    <div class="col-lg-6 mb-30">
                        <div class="card grid-item"  style="border: solid white 4px">
                            <div class="portfolio-item">
                                <img src="{{ asset($item->getFirstMediaUrl('default','thumb')) }}" alt="">
                                <div class="portfolio-overlay p-1" style="text-align: center">
                                    <a href="{!! route('detail-galeri-foto',[$item->slug]) !!}" class="text-white font-small-2 desc-p-center">{{ $item->title }}</a>
                                </div>
                                <a class="popup portfolio-img" href="{{ asset($item->getFirstMediaUrl()) }}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="col-lg-6 col-sm-12 mb-30">
                <div class="row">
                    @foreach($galeri->slice(0, 5) as $index => $item)
                        @if($index != 0)
                            <a href="{!! route('detail-galeri-foto',[$item->slug]) !!}">
                            <div class="col-6">
                                <div class="card grid-item mb-30" style="border: solid white 4px">
                                    <div class="portfolio-item">
                                        <img class="img-fluid" src="{{ asset($item->getFirstMediaUrl()) }}" alt="" style="height: 150px;object-fit: cover">
                                        <div class="portfolio-overlay p-1" style="text-align: center">
                                            <a href="{!! route('detail-galeri-foto',[$item->slug]) !!}" class="text-white font-small-2 text-bold-500 desc-p-center">{{ $item->title }}</a>
                                        </div>
                                        {{--<a class="popup portfolio-img" href="{!! route('detail-galeri-foto',[$item->slug]) !!}"><i class="fa fa-arrows-alt"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('css')
    <link type="text/css" rel="stylesheet" href="{!! asset('css/ycp.css') !!}" />

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
