@extends('web_frontend.layout.app')
@section('css')
@livewireStyles

@endsection
@section('content')
<!---Banner Slider Politani Full Weight Responsive--->
<!---=================v.1.1.2019==================--->
<section class="rev-slider">
    <div id="rev_slider_275_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="webster-slider-10" data-source="gallery" style="margin:0 auto;background:transparent;padding:0;">
        <div id="rev_slider_275_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6.3">
            <ul>
                @foreach($banner as $item)
                    <li data-index="rs-{{ $item->id }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb=""  data-delay="7000"  data-rotate="0"  data-saveperformance="off"  data-title="{{ $item->name }}" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        @if ( Config::get('app.locale') == 'en')
                            <img src="{{ url($item->getFirstMediaUrl("english","thumb")) }}" data-bgcolor='#141414' style='background:#141414' alt="" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        @elseif ( Config::get('app.locale') == 'id' )
                            <img src="{{ url($item->getFirstMediaUrl("default","thumb")) }}" data-bgcolor='#141414' style='background:#141414' alt="" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        @endif
                    </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
</section>

<section class="page-section-ptb">
    <div class="container">
        <div class="section-title text-center mb-40">
            <h2 class="text-bold-800 letter-spacing-1 ">@lang('resource.sepukam')</h2>
        </div>
        <livewire:show-posts>
    </div>
</section>

@if(!empty($sambutanPimpinan))
    <section class="gray-bg page-section-pt happy-clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-end">
                    <img class="d-xs-block d-lg-block img-fluid" src="{{ url($sambutanPimpinan->getFirstMediaUrl('default')) }}" alt="">
                </div>
                <div class="col-lg-6 mt-60">
                    <div class="section-title">
                        @if ( Config::get('app.locale') == 'en')
                        <h2 class="mb-20 text-bold-700">Message from Director of the <span class="theme-color"> Samarinda State </span> Polytechnic of Agriculture </h2>
                        @elseif ( Config::get('app.locale') == 'id' )
                        <h2 class="mb-20 text-bold-700">Sambutan Direktur <span class="theme-color"> Politeknik Pertanian</span> Negeri Samarinda </h2>
                        @endif
                    </div>
                    <div class="tab">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="testi-01">
                                <span class="quoter-icon">“</span>
                                <p>
                                    @if ( Config::get('app.locale') == 'en')
                                        {!! $sambutanPimpinan->content_english !!}
                                    @elseif ( Config::get('app.locale') == 'id' )
                                        {!! $sambutanPimpinan->content !!}
                                    @endif
                                </p>
                                <div class="testimonial-avatar">
                                    <h5>Hamka, S.TP.,M.Sc., MP </h5>
                                    @if ( Config::get('app.locale') == 'en')
                                        <span>Director</span>
                                    @elseif ( Config::get('app.locale') == 'id' )
                                        <span>Direktur</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<section class="page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 sm-mb-30">

                @if ( Config::get('app.locale') == 'en')
                    <h6>Education & Achievement</h6>
                    <h3 class="mb-20 text-bold-700">Students excel<span class="theme-color"> in education </span>and competitions</h3>
                    <p class="mb-40 jps-desc font-medium-1">Samarinda State Polytechnic of Agriculture excels in producing reliable students in education and competitions at the national and international levels</p>
                @elseif ( Config::get('app.locale') == 'id' )
                    <h6>Pendidikan & Prestasi</h6>
                    <h3 class="mb-20 text-bold-700">Mahasiswa berprestasi dalam<span class="theme-color"> bidang Pendidikan </span>serta Perlombaan</h3>
                    <p class="mb-40 jps-desc font-medium-1">Politeknik pertanian negeri samarinda unggul dalam mencetak mahasiswa yang handal di dalam pendidikan serta perlombaan pada tingkat nasional maupun internasional</p>
                @endif
                <div class="box-shadow-1 height-420 x-resp-290" style="background-image: url('{{ asset('image/bg/prestasi_pendidikan.png') }}');background-position: center;background-repeat: no-repeat;background-size: contain"></div>

            </div>
            <div class="col-md-6">
                <div class="box-shadow-1 height-420 x-resp-240" style="background-image: url('{{ asset('image/example/teamwork.jpg') }}');background-position: top;background-repeat: no-repeat;background-size: cover"></div>
                @if ( Config::get('app.locale') == 'en')
                    <h6 class="mt-40">Collaboration</h6>
                    <h3 class="text-bold-700">Industrial Cooperation <span class="theme-color"> as a supporter of </span> campus advancement</h3>
                    <p class="mt-20 jps-desc font-medium-1">Building cooperative connections between campuses and companies in the fields of agriculture, plantations, forestry, remote sensing, and information technology in order to create a modern campus that is in line with the times</p>
                @elseif ( Config::get('app.locale') == 'id' )
                    <h6 class="mt-40">Kolaborasi</h6>
                    <h3 class="text-bold-700">Kerja Sama Industri <span class="theme-color"> sebagai pendukung</span> kemajuan kampus.</h3>
                    <p class="mt-20 jps-desc font-medium-1">Membangun koneksi kerja sama antara kampus dengan perusahaan baik dibidang pertanian, perkebunan, kehutanan, penginderaan jauh, dan teknologi informasi demi mewujudkan kampus modern yang sesuai dengan perkembangan jaman</p>
                @endif

            </div>
        </div>
    </div>
</section>
<section class="bg-overlay-white-80" style="background: url('{{ asset('master/web-assets/images/world-map.png') }}') no-repeat top;">
    <div class="font-large-3 text-gray-light text-bold-800 letter-spacing-2 pl-20" style="position: absolute">
        @if ( Config::get('app.locale') == 'en')
            INSTITUTIONAL ACHIEVEMENTS
        @elseif ( Config::get('app.locale') == 'id' )
            CAPAIAN INSTITUSI
        @endif

    </div>
    <div class="container">
        <div class="row  page-section-ptb">
            <div class="col-lg-12 col-md-12">
                <div class="owl-carousel" data-nav-dots="true" data-items="4" data-md-items="4" data-sm-items="4" data-xs-items="3" data-xx-items="1" data-space="20">
                    <div class="item">
                        <div class="blog-entry rounded-1 box-shadow-1 border mb-20">
                            <div class="blog-detail rounded-1 p-20">
                                <div class="font-medium-2 text-black text-bold-700 mb-10 height-60">Pengolahan Hutan</div>
                                <div class="entry-content">
                                    <p>
                                        Program studi ini didirikan dalam rangka memenuhi tuntutan pembangunan yang terus berkembang dan perlu diiringi dengan upaya pengelolaan lingkungan oleh sumberdaya manusia yang memadai.
                                    </p>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><a href="" class="font-small-2 text-bold-600">@lang('resource.more') <i class="fa fa-long-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-entry rounded-1 box-shadow-1 border mb-20">
                            <div class="blog-detail rounded-1 p-20">
                                <div class="font-medium-2 text-black text-bold-700 mb-10 height-60">Pengolahan Hasil Hutan</div>
                                <div class="entry-content">
                                    <p>
                                        Pengolahan Hasil Hutan secara aktif menyelengga penelitian dan kajian implementasi serta pengabdian masyarakat dibidang teknologi hasil hutan dengan selalu memperhatikan kearifan lokal.
                                    </p>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><a href="" class="font-small-2 text-bold-600">@lang('resource.more') <i class="fa fa-long-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-entry rounded-1 box-shadow-1 border mb-20">
                            <div class="blog-detail rounded-1 p-20">
                                <div class="font-medium-2 text-black text-bold-700 mb-10 height-60">Teknologi Geomatika</div>
                                <div class="entry-content">
                                    <p>
                                        Melaksanakan pengabdian kepada masyarakat, terutama di bidang Geoinformatika terapan yang berorientasi pada kesejahteraan rakyat.
                                    </p>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><a href="" class="font-small-2 text-bold-600">@lang('resource.more') <i class="fa fa-long-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-entry rounded-1 box-shadow-1 border mb-20">
                            <div class="blog-detail rounded-1 p-20">
                                <div class="font-medium-2 text-black text-bold-700 mb-10 height-60">Teknologi Rekayasa Perangkat Lunak</div>
                                <div class="entry-content">
                                    <p>
                                        Menyelenggarakan proses pembelajaran yang berkualitas untuk menghasilkan lulusan yang professional, siap kerja dan mampu bersaing di bidang teknologi informasi.
                                    </p>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><a href="" class="font-small-2 text-bold-600">@lang('resource.more') <i class="fa fa-long-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="clearfix">
    <div class="page-section-ptb blue-bg box-shadow-2 pb-120 bg-overlay-black-10" style="background-image: url('{{ asset('image/bg/bg_batik.png') }}');background-repeat: no-repeat;background-size: 100%">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h5 class="text-bold-600 text-uppercase text-white letter-spacing-1">Kabar Informasi</h5>
                        <h2 class="text-bold-700 letter-spacing-1 text-white">Pengumuman</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-section-pb">
        <div class="container">
            <div class="skill-counter p-0 bg-transparent box-shadow-0" style="position: unset">
                <div class="row justify-content-center">
                    @for($j=0;$j< 2;$j++) <div class="col-lg-6 col-sm-6 pb-30">
                        <div class="blog-entry bg-white box-shadow-1 rounded-2 border">
                            <div class="blog-detail rounded-2">
                                <h5><a href="" class="badge bg-dark text-white">Akademik</a></h5>
                                <a class="text-bold-700 font-medium-1 desc-p" href="#">Pengumuman Pengumpulan Kelengkapan Dokumen Mahasiswa Baru</a>
                                <p class="mt-20 mb-10 l-height-26 desc-p">Pengumuman Pengumpulan Kelengkapan Dokumen Mahasiswa Baru</p>
                                <span class="text-muted">18 Agustus 2021</span>
                            </div>
                        </div>
                </div>
                @endfor
                <div class="col-md-12 text-center mt-30">
                    <a class="button button-border black icon x-small text-capitalize" href="#"> @lang('resource.more') <i class="fa fa-long-arrow-right"></i> </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="o-hidden gray-bg popup-gallery">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel" data-items="9" data-md-items="4" data-sm-items="3" data-xs-items="2" data-xx-items="2" data-space="0">
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/PH1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.ph')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/PH1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/PHH1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.phh')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/PHH1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/BTP1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.btp')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/BTP1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/THP1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.thp')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/THP1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/PL1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.pl')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/PL1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/TG1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.tg')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/TG1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/PP1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.pp')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/PP1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/TRPL1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.trpl')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/TRPL1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="portfolio-item image-text">
                            <img class="object-fit_cover height-320" src="{{ asset('image/bg/RK1.jpg') }}" alt="" />
                            <div class="portfolio-overlay">
                                <h6 class="text-white"><a href="">@lang('resource.rk')</a></h6>
                            </div>
                            <a class="popup portfolio-img" href="{{ asset('image/bg/RK1.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
     action-box -->

<!--=================================
    google-map -->

<section class="google-map black-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="map-icon">

                </div>
            </div>
        </div>
    </div>
    <div class="map-open">
        <iframe src="https://maps.google.com/maps?q=F47F+HCM,%20Sungai%20Keledang,%20Kec.%20Samarinda%20Seberang,%20Kota%20Samarinda,%20Kalimantan%20Timur%2075242&t=&z=17&ie=UTF8&iwloc=&output=embed" style="border:0; width: 100%;"></iframe>
    </div>
</section>
@endsection
@section('scripts')
<script text="text/javascript">
    let flagURL = "{{route('getListPostbyCategory')}}";
</script>
<script src="{{ asset('js/listPost.js') }}"></script>

@livewireScripts
@endsection
