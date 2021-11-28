@extends('web_frontend.beranda.main')
@section('middle_content')
    <div class="newsletter fancy text-center mb-20 mt-20">
        <form action="{{ route('search') }}">
            <input class="form-control placeholder text-bold-600 font-small-3 rounded" type="text" placeholder="Pencarian . . . ." name="query">
            <div class="clear">
                <button type="submit" class="button font-medium-1 text-bold-600"> <i class="fa fa-search"></i> </button>
            </div>
        </form>
    </div>
    @foreach($listResult as $key=>$result)
        @if(count($result)>0)
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title line-dabble mb-30">
                    <div class="title mb-0 text-bold-800 font-small-3 text-gray-dark text-uppercase"><i class="fa fa-search pr-2"></i>{!! $key !!} <i class="fa fa-angle-right text-primary pl-2 font-medium-1"></i></div>
                </div>
            </div>
            @foreach($result as $item)
                @if($key==="post" || $key==="page")
                <div class="col-lg-12 col-md-12 col-sm-12 mb-15">
                @else
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-15">
                @endif
                    <div class="blog blog-simple blog-left text-left clearfix typography ">
                        <div class="row">
                            @if($item->getFirstMediaUrl('default','thumb')!=="")
                            <div class="col-lg-2 col-md-2">
                                <img class="img-fluid mb-15 rounded" src="{{ asset($item->getFirstMediaUrl('default','thumb')) }}" alt="" style="height: auto;width: auto;object-fit: cover">
                            </div>
                            @endif

                            @if($item->getFirstMediaUrl('default','thumb')!=="")
                            <div class="col-lg-10 col-md-10">
                            @else
                            <div class="col-lg-12 col-md-12">
                            @endif
                                <div>
                                    @if($key==="post")
                                        <h6 class="text-black text-bold-600 font-small-3 desc-p"><a href="{{ url('post/'.$item->slug) }}">{!! $item->title  !!}</a></h6>
                                        <p class="desc-p">
                                            {!!  strip_tags($item->content,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si')  !!}
                                        </p>
                                    @elseif($key==="page")
                                        <h6 class="text-black text-bold-600 font-small-3 desc-p"><a href="{{ url('page/'.$item->slug) }}">{!! $item->title  !!}</a></h6>
                                        <p class="desc-p">
                                            {!!  strip_tags($item->content,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si')  !!}
                                        </p>
                                    @elseif($key==="anggota dewan")
                                        <h6 class="text-black text-bold-600 font-small-3 desc-p"><a href="{{ url('detail-person-dewan/'.$item->slug) }}">{!! $item->name  !!}</a></h6>
                                    @elseif($key==="anggota sekretariat")
                                        <h6 class="text-black text-bold-600 font-small-3 desc-p"><a href="{{ url('detail-person-sekretariat/'.$item->slug) }}">{!! $item->name  !!}</a></h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{--<div class="entry-pagination mt-40 mb-40">
                <nav aria-label="Page navigation example text-center">
                    <style>
                        .pagination {
                            justify-content: center;
                        }
                    </style>
                    {{ $listPost[$index]->links() }}
                </nav>
            </div>--}}

        </div>
        @endif
    @endforeach
@endsection
