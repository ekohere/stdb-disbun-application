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
                    <h1 class="title text-bold-700 mb-0 p-2">{!! $galeri->title !!}</h1>
                    <p>{!! $galeri->content !!}</p>
                    <div class="divider double"></div>
                </div>
            </div>
            <div class="isotope popup-gallery no-title justify-content-center pb-20">
                @foreach($galeri->getMedia() as $media)
                    <div class="grid-item p-2" style="width: 250px">
                    <div class="portfolio-item rounded">
                        <img src="{{ asset($media->getUrl('thumb')) }}" alt="">
                        <a class="popup portfolio-img" href="{{ asset($media->getUrl("cover")) }}"><i class="fa fa-arrows-alt"></i></a>
                    </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection
