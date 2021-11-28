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
                <div class="col-lg-12">
                    <div class="mt-30">
                        <div class="section-title line center text-center">
                            <h6 class="font-medium-3">Biodata Anggota Sekretariat DPRD </h6>
                            <h1 class="font-large-1 title text-black">{!! $person->name !!}</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-7 col-sm-7">
                            <div class="team-photo mb-30">
                                <img class="img-fluid rounded" src="{!! $person->getFirstMediaUrl() !!}" alt=""  style="width: 100%">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="mb-20">
                                <i class="font-small-2">Tempat & Tanggal Lahir</i>
                                <h6 class="text-black text-bold-500">{!! $person->place_of_birth !!}<br>{{ \Carbon\Carbon::parse($person->date_of_birth)->format('d F Y') }}</h6>
                            </div>
                            <div class="mb-20">
                                <i class="font-small-2">Alamat</i>
                                <h6 class="text-black text-bold-500">{!! $person->address !!}</h6>
                            </div>
                            <div class="mb-20">
                                <i class="font-small-2">Jabatan</i>
                                <h6 class="text-black text-bold-500">{!! $person->jabatanSekretariat->name !!}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
