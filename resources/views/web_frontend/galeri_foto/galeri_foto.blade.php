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
            <div class="mb-30 mt-30">
                <div class="text-center">
                    <div class="divider double"></div>
                    <h3 class="title text-bold-700 mb-0 p-2">Galeri Foto</h3>
                    <div class="divider double"></div>
                </div>
            </div>
            <div class="">
                <div class="isotope popup-gallery no-title justify-content-center">
                    @foreach($listGaleri as $item)
                        <a href="{!! route('detail-galeri-foto',[$item->slug]) !!}">
                        <div class="grid-item p-2" style="width: 210px">
    {{--                    <img class="img-fluid" src="{{ asset('storage/media_pro/52/2.jpg') }}" alt="">--}}
                        <div class="portfolio-item rounded">
                            <img src="{{ asset($item->getFirstMediaUrl('default','thumb')) }}" alt="">
                        </div>
                            <span class="font-small-1 text-bold-500">{{ \Carbon\Carbon::parse($item->event_date)->format('d/m/Y') }}</span><br>
                            <a href=""><span class="font-small-2 text-black text-bold-600 desc-p">{!! $item->title !!}</span></a>
                    </div>
                        </a>
                    @endforeach
                </div>
                <div class="entry-pagination mt-40 pb-50">
                    <nav aria-label="Page navigation example text-center">
                        <style>
                            .pagination {
                                justify-content: center;
                            }
                        </style>
                        {{ $listGaleri->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
