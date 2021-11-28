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
                                {{$postDetail->title_english}}
                                @elseif ( Config::get('app.locale') == 'id' )
                                {{$postDetail->title}}
                                @endif</h1>
                            <div class="row">
                                <div class="col-4">
                                <h4 class="subtitle">{{ \Carbon\Carbon::parse($postDetail->created_at)->isoFormat('D MMMM Y') }} </h4>
                                </div>

                                <div class="col-8 text-right">
                                    <div class="entry-meta">
                                        <ul>

                                            <li class="mr-0"> <i class="fa fa-folder-open-o"></i> <a href="#"> {{ $postDetail['postCategory']['name'] }} </a> </li>
                                            <li class="mr-0"><a href="#"><i class="fa fa-eye"></i> {!! views($postDetail)->count(); !!}</a></li>
                                            <!--                                            <li class="mr-0"><span><i class="fa fa-comment-o"></i> 0</span></li>-->
                                        </ul>
                                    </div>
                                    <div class="social-icons color-icon social-border mt-1">
                                        <ul>
                                            <li class="social-facebook"><a target="popup" onclick="window.open('{!! Share::page(Request::url(),$postDetail->title)->facebook()->getRawLinks(); !!}','popup','width=300,height=300,scrollbars=no,resizable=no'); return false;" href=""><i class="fa fa-facebook"></i></a></li>
                                            <li class="social-twitter"><a target="popup" onclick="window.open('{!! Share::page(Request::url(),$postDetail->title)->twitter()->getRawLinks(); !!}','popup','width=300,height=300,scrollbars=no,resizable=no'); return false;" href=""><i class="fa fa-twitter"></i></a></li>
                                            <li class="social-linkedin"><a target="popup" onclick="window.open('{!! Share::page(Request::url(),$postDetail->title)->linkedin()->getRawLinks(); !!}','popup','width=300,height=300,scrollbars=no,resizable=no'); return false;" href=""><i class="fa fa-google-plus text-danger"></i></a></li>
                                            <li class="social-android"><a target="popup" onclick="window.open('{!! Share::page(Request::url(),$postDetail->title)->whatsapp()->getRawLinks(); !!}','popup','width=300,height=300,scrollbars=no,resizable=no'); return false;" href="">WA</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="divider dashed"></div>
                        </div>
                        <div class="entry-image clearfix">
                            <div class="owl-carousel bottom-center-dots" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                                @foreach($postDetail->getMedia() as $image)
                                    <div class="item">
                                        <img class="img-fluid mb-15 rounded" src="{!! asset($image->getUrl("cover"))  !!}" alt="" style="height: auto;width: 100%;object-fit: cover">
                                    </div>
                                @endforeach
                            </div>
                            <div class="font-italic">
                                @if ( Config::get('app.locale') == 'en')
                                {!! $postDetail->image_caption_english !!}
                                @elseif ( Config::get('app.locale') == 'id' )
                                {!! $postDetail->image_caption !!}
                                @endif
                                </div>
                        </div>


                        <div class="blog-detail">
                            <div class="entry-content" style="font-size: 1rem">
                                @if ( Config::get('app.locale') == 'en')
                                {!! $postDetail->content_english !!}
                                @elseif ( Config::get('app.locale') == 'id' )
                                {!! $postDetail->content !!}
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="mb-30">
                        <div class="mb-30">
                            <div class="title mb-2 text-bold-800 font-medium-1 text-gray-dark text-uppercase">TULIS KOMENTAR ANDA <i class="fa fa-angle-right text-primary pl-2"></i></div>
                            <div class="divider"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="fb-comments" data-href="{!! Request::url() !!}" data-width="700" data-numposts="10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="port-post mt-40 mb-30">
                        <div class="mb-25">
                            <div class="title mb-0 text-bold-800 font-medium-1"><a href="" class="text-blue-dark"><i class="fa fa-plus"></i>INDEKS BERITA TERKAIT <i class="fa fa-angle-right pl-2"></i> </a></div>
                            <div class="divider"></div>
                        </div>
                        <div class="row">
                            @foreach($listPost as $index => $item)
                                @if($item['postCategory']->name == $postDetail['postCategory']['name'])
                                    @if($item->id != $postDetail->id)
                                        <div class="col-lg-4 col-md-6 col-sm-6 mb-15">
                                            <div class="blog blog-simple blog-left text-left clearfix typography ">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <img class="img-fluid mb-15 rounded" src="{{ asset($item->getFirstMediaUrl("default","thumb")) }}" alt="" style="height: 150px;width: 100%;object-fit: cover">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div>
                                                            <span class="badge badge-warning mb-10">{{ $item['postCategory']->name }}</span>
                                                            <h6 class="text-black text-bold-600 font-small-3"><a href="{{ url('post/'.$item->slug) }}">{{ $item->title }}</a></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget mt-30">
                        <div class="widget-search border rounded">
                            <i class="fa fa-search"></i>
                            <input type="search" class="form-control" placeholder="Cari....">
                        </div>
                    </div>
                    {{--@include('web_frontend.include.berita_lainnya')
                    @include('web_frontend.include.indeks_post')--}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0&appId=298637494983635&autoLogAppEvents=1" nonce="hYx81EtD"></script>
@endsection
