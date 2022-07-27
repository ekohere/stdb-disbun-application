<html>
    <head>
        <title>Cetak STDB</title>
        <meta charset="utf-8">
        <style type="text/css">
            #judul {
                text-align: center;
                font-family: "Arial", sans-serif;
                color: #000000;
                font-size: 22px;
            }

            .isi_surat {
                font-family: "Arial", sans-serif;
                color: #000000;
                font-size: 18px;
            }

            .default-font {
                font-family: "Arial", sans-serif;
            !important;
                color: #000000;
            }

            #halaman {
                width: auto;
                background-color: #FFFFFF;
                height: auto;
                /*position: absolute;*/
                /*border: 1px solid;*/
                padding-top: 0px;
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 80px;
            }

            #lampiran {
                width: auto;
                background-color: #FFFFFF;
                height: auto;
                padding-top: 80px;
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 30px;
            }

            #lampiran-map {
                width: auto;
                justify-items: center;
                justify-content: center;
                align-content: center;
                align-items: center;
                justify-self: center;
                align-self: center;
                text-align: center;
                background-color: #FFFFFF;
                height: auto;
                padding-top: 80px;
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 30px;

            }

            div.page {
                page-break-after: always
            }

            @media print {
                @page {
                    margin: 0;
                }

                body {
                    /*margin: 1.6cm;*/
                    size: 7in 9.25in;
                }
            }
        </style>
        @include('layouts.css')
        @yield('css')
    </head>

    <body style="background-color: #FFFFFF;">
        <div class="page" id=halaman>
            <img class="mt-1 mb-0 p-0" width="100%" src="{{asset('image/kop_surat_stdb.jpg')}}"/>
            <svg height="10" width="100%">
                <line x1="100%" y1="0" style="stroke:rgb(0,0,0);stroke-width:10"></line>
            </svg>
            <h5 id="judul" class="m-0 p-0">SURAT TANDA DAFTAR USAHA PERKEBUNAN UNTUK BUDIDAYA (STD-B)</h5>
            <h5 id="judul" class="m-0 p-0">Desa {{$sTDBRegister->anggota->alamat_desa_ktp}},
                Kecamatan {{$sTDBRegister->anggota->alamat_kec_ktp}} </h5>
            <h5 id="judul" class="m-0 p-0">Kabupaten Kutai Timur </h5>
            <svg height="5" width="100%">
                <line x1="100%" y1="0" style="stroke:rgb(0,0,0);stroke-width:5"></line>
            </svg>
            <h5 id="judul" class="m-0-1">525/{{ $sTDBRegister->no_surat<10?"00".$sTDBRegister->no_surat:($sTDBRegister->no_surat<100?"0".$sTDBRegister->no_surat:$sTDBRegister->no_surat) }}/DISBUN-KT/STD-B/{{$sTDBRegister->desa}} -
                {{$sTDBRegister->kecamatan}}/X/{{date_format($sTDBRegister->latest_status->pivot->created_at,'Y')}} </h5>

            <div class="col-sm-12 pl-5 mt-1 isi_surat">
                <h5 class="isi_surat text-bold-700">A. Keterangan Pemilik</h5>
                <table class="ml-2 isi_surat">
                    <tr>
                        <td width="15px">1.</td>
                        <td width="200px">Nama</td>
                        <td>:</td>
                        <td>{{$sTDBRegister->anggota->nama_ktp}}</td>
                    </tr>
                    <tr>
                        <td width="15px">2.</td>
                        <td width="200px">Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{$sTDBRegister->anggota->tempat_lahir}}
                            , {{date_format($sTDBRegister->anggota->tgl_lahir,'d M Y')}}</td>
                    </tr>
                    <tr>
                        <td width="15px">3.</td>
                        <td width="200px">Nomor KTP</td>
                        <td>:</td>
                        <td>{{$sTDBRegister->anggota->nomor_ktp}}</td>
                    </tr>
                    <tr>
                        <td width="15px">4.</td>
                        <td width="200px">Alamat</td>
                        <td>:</td>
                        <td>{{$sTDBRegister->anggota->alamat_ktp}}</td>
                    </tr>
                </table>
                <br>
                <h5 class="isi_surat text-bold-700">B. Data Kebun</h5>
                @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
                    <h5 class="isi_surat ml-2 m-0">Kebun ke: {{$key+1}}</h5>
                    <table class="ml-2 isi_surat">
                        <tr>
                            <td width="210px">Lokasi/Titik Koordinat kebun</td>
                            <td>:</td>
                            <td>{{$sTDBRegister->anggota->alamat_desa_ktp}}</td>
                        </tr>
                        <tr>
                            <td width="210px"></td>
                            <td></td>
                            <td>X:&nbsp;{{$item->persil->center_point->x}} &nbsp;&nbsp;&nbsp;&nbsp;
                                Y:&nbsp;{{$item->persil->center_point->y}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Status Kepemilikan Tanah</td>
                            <td>:</td>
                            <td>{{!empty($item->persil->status_lahan)?$item->persil->status_lahan:"Tidak diketahui"}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Nomor</td>
                            <td>:</td>
                            <td>{{!empty($item->persil->nomor_surat_lahan)?$item->persil->nomor_surat_lahan:"-"}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Luas Areal</td>
                            <td>:</td>
                            <td>{{$item->persil->luas_lahan}} Ha</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <td width="210px">Luas Ditanami</td>--}}
{{--                            <td>:</td>--}}
{{--                            <td>{{$item->persil->luas_lahan_tanam_telah_produksi + $item->persil->luas_lahan_tanam_belum_produksi}} Ha</td>--}}
{{--                        </tr>--}}
                        <tr>
                            <td width="210px">Jenis Tanaman</td>
                            <td>:</td>
                            <td>{{$item->persil->jenis_tanaman}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Produksi Perhektar Pertahun</td>
                            <td>:</td>
                            <td>{{$item->persil->total_produksi_setahun}} Ton</td>
                        </tr>
                        <tr>
                            <td width="210px">Asal Benih</td>
                            <td>:</td>
                            <td>{{!empty($item->persil->asal_benih)?$item->persil->asal_benih:"Distributor benih tak bersertifikat"}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Jumlah Pohon</td>
                            <td>:</td>
                            <td>{{!empty($item->persil->jml_pohon)?$item->persil->jml_pohon:"0"}} Pohon</td>
                        </tr>
                        <tr>
                            <td width="210px">Pola Tanam</td>
                            <td>:</td>
                            <td>{{!empty($item->persil->pola_tanam)?$item->persil->pola_tanam:"-"}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Jenis Pupuk</td>
                            <td>:</td>
                            <td>{{!empty($item->persil->jenis_pupuk)?$item->persil->jenis_pupuk:"-"}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Mitra Pengolahan</td>
                            <td>:</td>
                            <td>{!! !empty($item->persil->mitra_pengolahan)?implode(",",\GuzzleHttp\json_decode($item->persil->mitra_pengolahan)):"-" !!}</td>
                        </tr>
                        <tr>
                            <td width="210px">Jenis Tanah</td>
                            <td>:</td>
                            <td>{{!empty($item->persil->laham_gambut_or_non)?$item->persil->laham_gambut_or_non:"-"}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Tahun Tanam</td>
                            <td>:</td>
                            <td>{{!empty($item->persil->tahun_tanam)?$item->persil->tahun_tanam:"-"}}</td>
                        </tr>
                        <tr>
                            <td width="210px">Usaha lain di kebun</td>
                            <td>:</td>
                            <td>Tidak Ada</td>
                        </tr>
                    </table>
                    <br class="mt-0 mb-0 p-0">
                @endforeach
                <h5 class="isi_surat">STD-B ini hanya sebagai tanda daftar budidaya perkebunan bukan merupakan hak keperdataan. STD-B ini tidak berlaku apabila terjadi perubahan terhadap informasi tersebut diatas.</h5>
                <div class="float-right col-sm-6 pl-5 mt-1 isi_surat">
                    <div class="mb-0" style="width: 100%; text-align: center;">
                        Sangatta, {{date_format($sTDBRegister->latest_status->pivot->created_at,'d M Y')}}</div>
                    <div class="mt-0" style="width: 100%; text-align: center;">Kepala Dinas Perkebunan</div>
                    {{--            <br><br><br><br>--}}
                    <div class="mt-0 mb-110" style="width: 100%; text-align: center; height:50px">
{{--                        {!! QrCode::size(150)->margin(3)->merge('/public/image/logo.png', .2)->generate(route('sTDBRegisters.print',$sTDBRegister->id)); !!}--}}

{{--                        <a style="width: 100%; text-align: center;" rel='nofollow' href='https://www.qr-code-generator.com'--}}
{{--                           border='0' style='cursor:default'></a><img--}}
{{--                            src='https://chart.googleapis.com/chart?cht=qr&chl=http%3A%2F%2Fstdb-kutim.britech.id%2FsTDBRegisters%2Fprint%2F21&chs=180x180&choe=UTF-8&chld=L|2'--}}
{{--                            alt=''>--}}
                    </div>
                    <div style="width: 100%; text-align: center;"><b><u>M. Alfian, S.Sos</u></b></div>
                    <div style="width: 100%; text-align: center;">NIP. 19680520 199003 1 009</div>
                </div>
            </div>
        </div>

        @include('s_t_d_b_registers.print_stdb.lampiran_map')
        @include('s_t_d_b_registers.print_stdb.lampiran_pendukung')

    </body>
</html>
