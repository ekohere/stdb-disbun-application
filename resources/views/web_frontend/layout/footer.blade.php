<div class="divider outset"></div>
<footer class="footer page-section-pt">
{{--    <div class="divider mb-50"></div>--}}
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 sm-mt-30">
                <div class="about-content">
                    <img class="img-fluid" id="logo-footer" src="{{ asset('image/logo/logo-politani-1-black.png') }}" alt="">
                    <p class="font-small-4 text-black mt-20">Sungai Keledang, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75242</p>
                    <p class="font-small-4 text-black mb-0">Tel: (0541) 260421, 260680</p>
                    <p class="font-small-4 text-black mb-0">Fax: (0541) 260680</p>
                    <p class="font-small-4 text-black mb-0">Mail: info@politanisamarinda.ac.id - politanismd@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 sm-mt-30 sm-mb-30">
                <div class="usefull-link">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-20">
                            <h5 class="text-bold-700 text-black">Tentang Politani</h5>
                            <ul>
                                <li><a href="#">@lang('resource.profil')</a></li>
                                <li><a href="#">@lang('resource.visimisi')</a></li>
                                <li><a href="#">@lang('resource.pimpinanstaff')</a></li>
                                <li><a href="#">@lang('resource.senat')</a></li>
                                <li><a href="#">@lang('resource.fasilitasumum')</a></li>
                                <li><a href="#">@lang('resource.datadosen')</a></li>
                                <li><a href="#">@lang('resource.dataplp')</a></li>
                                <li><a href="#">@lang('resource.kalenakademik')</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-20">
                            <h5 class="text-bold-700 text-black">@lang('resource.lembagakampus')</h5>
                            <ul>
                                <li><a href="http://e-journal.politanisamarinda.ac.id/index.php/p2m">LP2M</a></li>
                                <li><a href="http://lsp.politanisamarinda.ac.id/">LSP</a></li>
                                <li><a href="#">SPMI</a></li>
                                <li><a href="#">@lang('resource.laboratorium')</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-20">
                            <h5 class="text-bold-700 text-black">@lang('resource.webprodi')</h5>
                            <ul>
                                <li><a href="http://geomatika.politanisamarinda.ac.id/">@lang('resource.tg')</a></li>
                                <li><a href="http://pengelolaanhutan.politanisamarinda.ac.id/">@lang('resource.ph')</a></li>
                                <li><a href="http://pengelolaanlingkungan.politanisamarinda.ac.id/">@lang('resource.pl')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright gray-bg mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mt-10"> @lang('resource.hakcipta')&copy;<span id="copyright"></span>{{ Carbon\Carbon::now()->format('Y') }} <a href="{{ '/' }}"> Politeknik Pertanian Negeri Samarinda </a></p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-sm-center justify-content-lg-end">
                        <div class="dropdown mr-10">
                            <button class="btn btn-secondary dropdown-toggle dark-theme-bg" type="button" data-toggle="dropdown"><i class="flag-icon @if(Config::get('app.locale')=='id') flag-icon-id @elseif (Config::get('app.locale')=='en') flag-icon-gb @endif box-shadow-1 mr-1"></i></button>
                            <ul class="dropdown-menu mb-10">
                                <li>
                                    <a class="dropdown-item @if(Config::get('app.locale')=='id') active @endif font-small-2" href="{!! LaravelLocalization::getLocalizedURL('id')  !!}"><i class="flag-icon flag-icon-id pr-4"></i> INDONESIA</a>
                                </li>
                                <li>
                                    <a class="dropdown-item @if(Config::get('app.locale')=='en') active @endif font-small-2" href="{!! LaravelLocalization::getLocalizedURL('en')  !!}"><i class="flag-icon flag-icon-gb pr-4"></i> ENGLISH</a>
                                </li>
                            </ul>
                        </div>
                        <div class="social">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/politani.samarinda.716"> <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/politani_samarinda/"> <i class="fa fa-instagram"></i> </a>
                                </li>

                                <!-- <li>
                                    <a href="#"> <i class="fa fa-google"></i> </a>
                                </li> -->

                                <li>
                                    <a href="https://www.youtube.com/channel/UCJTlCvBIS0IU4USFJGa75Xg"> <i class="fa fa-youtube"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
