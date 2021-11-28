@extends('web_frontend.layout.app')
@section('content')
    <section class="blog blog-single white-bg pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="font-medium-2 text-bold-600 text-black text-uppercase">{!! $activePostCategory->name !!}</div>
                    <div class="newsletter fancy text-center mb-20 mt-20">
                        <form action="{{ url('post-utama/indeks') }}">
                            <input class="form-control placeholder text-bold-600 font-small-3 rounded" type="text" placeholder="Pencarian . . . ." name="pencarian">
                            <div class="clear">
                                <button type="submit" name="submitbtn" class="button font-medium-1 text-bold-600"> <i class="fa fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-30">
                        @foreach($postCategory as $item)
                            <span class="border rounded p-1 text-bold-500 font-small-1 text-uppercase mr-1"><a href="{{ url('post-utama/indeks?pencarian='.$item->name) }}" class="text-black">{{ $item->name }}</a></span>
                        @endforeach
                    </div>
                    <div class="divider mb-20 mt-20"></div>
                    <div class="row">
                        @foreach($listPost as $item)
                            @if($loop->first)
                                <div class="col-lg-12">
                                    <div class="blog-entry mb-30 border rounded">
                                        <div class="entry-image clearfix">
                                            <img class="img-fluid" src="{{ asset($item->getFirstMediaUrl("default")) }}" alt="">
                                        </div>
                                        <div class="pl-4 pr-4 pb-4">
                                            <div class="blog-detail">
                                                <span class="badge badge-warning mb-10">{{ $item['postCategory']->name }}</span>
                                                <div class="entry-title mb-10 text-black">
                                                    <a href="{{ url('post/'.$item->slug) }}" class="text-black desc-p">{{ $item->title }}</a>
                                                </div>
                                            </div>
                                            <div class="entry-meta mb-10">
                                                <ul>
                                                    <li><span class="text-black"><i class="fa fa-eye"></i>{!! views($item)->count() !!}</span></li>
                                                    <li><span class="text-black"><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</span></li>
                                                </ul>
                                            </div>
                                            <div class="entry-content desc-p-3">
                                                {{ strip_tags($item->content,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-6 mb-20">
                                    <div class="blog blog-simple blog-left text-left clearfix typography ">
                                        <img class="img-fluid mb-15 rounded" src="{{ asset($item->getFirstMediaUrl("default","thumb")) }}" alt="" style="height: 200px;width: 100%;object-fit: cover">
                                        <div>
                                            <span class="badge badge-warning mb-10">{{ $item['postCategory']->name }}</span>
                                            <h6 class="text-black text-bold-600 font-small-3 desc-p"><a href="{{ url('post/'.$item->slug) }}">{{ $item->title }}</a></h6>
                                            <div class="row font-small-1 text-bold-600 text-blue-grey">
                                                <div class="col-8">
                                                    <span>{!! $item->usersCreated->display_name !!}</span><i class="fa fa-circle pl-2 pr-2" style="font-size: 6px"></i>
                                                    <span class="">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }} </span>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <span><i class="fa fa-eye"></i>{!! views($item)->count() !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{--                    @foreach($post as $index => $item)--}}
{{--                        @if($index != 0)--}}
{{--                            <div class="col-lg-12 mb-15">--}}
{{--                                <div class="blog blog-simple blog-left text-left clearfix typography ">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-4">--}}
{{--                                            <img class="img-fluid mb-15 rounded" src="{{ asset($item->getFirstMediaUrl()) }}" alt="" style="height: auto;width: 100%;object-fit: cover">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-8 pl-0">--}}
{{--                                            <div>--}}
{{--                                                <h6 class="text-black text-bold-600 font-small-3"><a href="{{ url('post/'.$item->slug) }}">{{ $item->title }}</a></h6>--}}
{{--                                                <span class="font-small-1 text-bold-600 text-blue-grey">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }} </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}

                    <div class="entry-pagination mt-40 mb-40">
                        <nav aria-label="Page navigation example text-center">
                            <style>
                                .pagination {
                                    justify-content: center;
                                }
                            </style>
                                {{ $listPost->links() }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('web_frontend.include.berita_lainnya')
{{--                    <img class="img-fluid mb-30" src="{{ asset('image/bg/banner_static.png') }}" alt="">--}}
                    @if(!empty(\App\Models\Profile::where('key','banner')->value('value')))
                        <img class="img-fluid mb-30" src="{{ asset(\App\Models\Profile::where('key','banner')->value('value')) }}" alt="">
                    @endif
                    @include('web_frontend.include.indeks_post')
                </div>
            </div>
        </div>
    </section>
@endsection
