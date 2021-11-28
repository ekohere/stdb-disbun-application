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
                    <div class="blog-entry mb-10">
                        <div class="section-title text-left mb-20">
                            <h1 class="title text-black text-bold-700 mb-30">
                                @if ( Config::get('app.locale') == 'en')
                                    {!! $pageDetail->title_english !!}
                                @elseif ( Config::get('app.locale') == 'id' )
                                    {!! $pageDetail->title !!}
                                @endif
                            </h1>
                            <div class="row">
                                <div class="col-4">
                                <h4 class="subtitle">{{ \Carbon\Carbon::parse($pageDetail->created_at)->isoFormat('D MMMM Y') }} </h4>
                                </div>

                                <div class="col-8 text-right">
                                    <div class="social-icons color-icon social-border">
                                        <ul>
                                            <li class="social-facebook"><a target="popup" onclick="window.open('{!! Share::page(Request::url(),$pageDetail->title)->facebook()->getRawLinks(); !!}','popup','width=300,height=300,scrollbars=no,resizable=no'); return false;" href=""><i class="fa fa-facebook"></i></a></li>
                                            <li class="social-twitter"><a target="popup" onclick="window.open('{!! Share::page(Request::url(),$pageDetail->title)->twitter()->getRawLinks(); !!}','popup','width=300,height=300,scrollbars=no,resizable=no'); return false;" href=""><i class="fa fa-twitter"></i></a></li>
                                            <li class="social-linkedin"><a target="popup" onclick="window.open('{!! Share::page(Request::url(),$pageDetail->title)->linkedin()->getRawLinks(); !!}','popup','width=300,height=300,scrollbars=no,resizable=no'); return false;" href=""><i class="fa fa-google-plus text-danger"></i></a></li>
                                            <li class="social-android"><a target="popup" onclick="window.open('{!! Share::page(Request::url(),$pageDetail->title)->whatsapp()->getRawLinks(); !!}','popup','width=300,height=300,scrollbars=no,resizable=no'); return false;" href="">WA</a></li>
                                        </ul>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>

                                            <li class="mr-0"> <i class="fa fa-folder-open-o"></i> <a href="#"> {{ $pageDetail['pageCategory']['name'] }} </a> </li>
                                            <li class="mr-0"><a href="#"><i class="fa fa-eye"></i> {!! views($pageDetail)->count(); !!}</a></li>
<!--                                            <li class="mr-0"><span><i class="fa fa-comment-o"></i> 0</span></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="divider dashed"></div>
                        </div>
                        <div class="entry-image clearfix">
                                <div class="owl-carousel bottom-center-dots popup-gallery" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                                    @foreach($pageDetail->getMedia() as $image)
                                        <div class="item">
{{--                                            <img class="img-fluid" src="{{ asset($image->getUrl("cover")) }}" alt="" style="height: 500px;width: 100%;object-fit: cover">--}}
{{--                                            <div class="portfolio-item">--}}

                                                <a class="popup portfolio-img" href="{{ asset($image->getUrl("cover")) }}"><img src="{{ asset($image->getUrl("thumb")) }}" alt="" style="height: 500px"/></a>
{{--                                                <a class="popup portfolio-img" href="{{ asset($image->getUrl("cover")) }}"><i class="fa fa-arrows-alt"></i></a>--}}
{{--                                            </div>--}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="blog-detail">
                            <div class="entry-content" style="font-size: 1rem">
                                @if ( Config::get('app.locale') == 'en')
                                    {!! $pageDetail->content_english !!}
                                @elseif ( Config::get('app.locale') == 'id' )
                                    {!! $pageDetail->content !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
