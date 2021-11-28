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
                    <div class="mt-30">
                        <div class="section-title line center text-center">
                            <h6 class="font-medium-3">Biodata  </h6>
                            <h1 class="font-large-1 title text-black">{!! $person->full_name !!}</h1>
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
                                <h6 class="text-black text-bold-500">{!! $person->place_of_birth !!},{{ \Carbon\Carbon::parse($person->date_of_birth)->format('d F Y') }}</h6>
                            </div>
                            <div class="mb-20">
                                <i class="font-small-2">Alamat</i>
                                <h6 class="text-black text-bold-500">{!! $person->address !!}</h6>
                            </div>
                            <div class="mb-20">
                                <i class="font-small-2">Jabatan</i>
                                {{--@foreach($listAkdPersonDewan as $item)
                                <h6 class="text-black text-bold-500">{{ '-'.$item->jabatanDewan->name.' '.$item->akdCategory->name }}</h6>
                                @endforeach--}}
                            </div>
<!--                            <div class="mb-20">
                                <i class="font-small-2">Fraksi</i>
                                <h6 class="text-black text-bold-500">-</h6>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{--<div class="port-post mb-30">
                        <div class="mb-30">
                            <div class="title mb-2 text-bold-700 font-small-3 text-gray-dark text-uppercase">Anggota Dewan</div>
                            <div class="divider"></div>
                            @foreach($listDapil as $dapil)
                                <div class="font-small-2 text-black mt-20 text-uppercase text-bold-600">{!! $dapil->name !!}</div>
                                @foreach($dapil->personDewans as $person)
                                    <a href="{{ url('detail-person-dewan/'.$person->slug) }}" class="text-black">{!! $loop->iteration.'.'.$person->name !!}</a>
                                    </br>
                                @endforeach
                            @endforeach
                        </div>
                    </div>--}}
                    {{--@include('web_frontend.include.berita_lainnya')
                    @include('web_frontend.include.indeks_post')--}}
                </div>
            </div>

            <div class="row mb-50">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <h6 class="text-black text-bold-500">Riwayat Penelitian</h6>
                        <table class="table table-bordered table-2 text-center table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Lama (Thn)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (is_array($person->penelitian) || is_object($person->penelitian))
                            @foreach($person->penelitian as $item)
                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td>{!! $item['tahun_pelaksanaan'] !!}</td>
                                    <td class="text-left">{!! $item['judul'] !!}</td>
                                    <td>{!! $item['lama_kegiatan'] !!}</td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-50">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <h6 class="text-black text-bold-500">Riwayat Kekayaan Intelektual (HKI/Paten)</h6>
                        <table class="table table-bordered table-2 text-center table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Jenis KI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (is_array($person->kekayaan_intelektual) || is_object($person->kekayaan_intelektual))
                            @foreach($person->kekayaan_intelektual as $item)
                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td class="text-left">{!! $item['kategori_kegiatan'] !!}</td>
                                    <td class="text-left">{!! $item['judul'] !!}</td>
                                    <td class="text-left">{!! $item['jenis_publikasi'] !!}</td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-50">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <h6 class="text-black text-bold-500">Riwayat Publikasi</h6>
                        <table class="table table-bordered table-2 text-center table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Asal</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Jenis Publikasi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (is_array($person->publikasi) || is_object($person->publikasi))
                            @foreach($person->publikasi as $item)
                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td class="text-left">{!! $item['asal_data'] !!}</td>
                                    <td class="text-left">{!! $item['judul'] !!}</td>
                                    <td class="text-left">{!! $item['tanggal'] !!}</td>
                                    <td class="text-left">{!! $item['jenis_publikasi'] !!}</td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-50">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <h6 class="text-black text-bold-500">Riwayat Anggota Profesi</h6>
                        <table class="table table-bordered table-2 text-center table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Organisasi</th>
                                <th>Peran</th>
                                <th>Mulai</th>
                                <th>Berakhir</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (is_array($person->anggota_profesi) || is_object($person->anggota_profesi))
                            @foreach($person->anggota_profesi as $item)
                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td class="text-left">{!! $item['nama_organisasi'] !!}</td>
                                    <td class="text-left">{!! $item['peran'] !!}</td>
                                    <td class="text-left">{!! $item['tanggal_mulai_keanggotaan'] !!}</td>
                                    <td class="text-left">{!! $item['tanggal_selesai_keanggotaan'] !!}</td>
                                </tr>
                            @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
