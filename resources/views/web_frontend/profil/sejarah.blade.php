@extends('web_frontend.layout.app')
@section('content')
    <section class="blog blog-single white-bg pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    Belum Ada Data Ditampilkan
                </div>
                <div class="col-lg-4">
                    @include('web_frontend.include.berita_lainnya')
                    <img class="img-fluid mb-30" src="{{ asset('image/bg/banner_static.png') }}" alt="">
                    @include('web_frontend.include.indeks_post')
                </div>
            </div>
        </div>
    </section>
@endsection
