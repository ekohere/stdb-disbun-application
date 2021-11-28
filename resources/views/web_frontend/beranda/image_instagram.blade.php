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
                    @if(isset($instagram))
                        @foreach($instagram as $media)
                            @if($media->getId() == $slug)
                                <a href="{{ $media->getLink() }}">
                                    <span class="font-medium-1 text-black text-bold-600">Kabar Instagram</span>
                                    <span class="font-small-3 text-black desc-p">{!! $media->getCaption() !!}</span>
                                    <div class="text-gray-dark mt-1"><span class="mr-10"><i class="fa fa-heart"></i> {{ $media->getLikesCount() }}</span><span><i class="fa fa-comments font-medium-1"></i> {{ $media->getCommentsCount() }}</span></div>
                                </a>
                                <div class="divider dashed mt-1 mb-20"></div>
                                <div class="isotope columns-3 popup-gallery">
                                    @foreach($media->getSidecarMedias() as $item)
                                        <div class="grid-item">
                                            <div class="portfolio-item">
                                                <img src="{{ $item->getImageHighResolutionUrl() }}" alt="">
                                                <a class="popup portfolio-img" href="{{ asset($item->getImageHighResolutionUrl()) }}"><i class="fa fa-arrows-alt"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="col-lg-4">
                    @include('web_frontend.include.berita_lainnya')
                    @include('web_frontend.include.indeks_post')
                </div>
            </div>
        </div>
    </section>
@endsection
