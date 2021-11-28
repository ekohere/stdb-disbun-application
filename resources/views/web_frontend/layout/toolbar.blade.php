<header id="header" class="header {{ isset($theme) ? $theme : 'blue-bg'  }}">
    <div class="topbar blue-bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 xs-mb-10 pr-0">
                    <div class="topbar-call text-center text-md-left text-white">
{{--                        <marquee>--}}
{{--                            @for($i=0;$i<=5;$i++)--}}
{{--                                <img class="mr-2 ml-2" src="{{ asset('image/logo/logo-politani-sm.png') }}" alt="" height="15" width="15"><a href="" class="text-white">Kegiatan pengembangan kepribadian kampus dilakukan secara serentak</a>--}}
{{--                            @endfor--}}
{{--                        </marquee>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pl-0">
                    <div class="topbar-social text-center text-md-right">
                        <ul>
                            <li><span> | </span></li>
                            <li><a href="https://www.youtube.com/channel/UCJTlCvBIS0IU4USFJGa75Xg"><span class="ti-youtube"></span>YouTube</a></li>
                            <li><a href="https://www.facebook.com/politani.samarinda.716"><span class="ti-facebook"></span>Facebook</a></li>
                            <li><a href="https://www.instagram.com/politani_samarinda/"><span class="ti-instagram"></span>Instagram</a></li>
                            <!-- <li><a href="#"><span class="ti-twitter"></span> Twitter</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================mega menu -->
    <div class="menu">
        <!-- menu start -->
        <nav id="menu" class="mega-menu">
            <!-- menu list items container -->
            <section class="menu-list-items" style="background-image: url('{{ asset('image/bg/bg_batik.png') }}');background-repeat: repeat-x;background-size: 80%">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- menu logo -->
                            <ul class="menu-logo">
                                <li>
                                    <a href="{{ LaravelLocalization::localizeUrl('/') }}"><img id="logo_img" src="{{ asset('image/logo/logo-politani-1.png') }}" alt="logo"> </a>
                                </li>
                            </ul>
                            <!-- menu links -->
                            <div class="menu-bar">
                                <ul class="menu-links">
                                    @include('web_frontend.layout.menu')
                                </ul>
                                <div class="search-cart">
                                    <div class="search">
                                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                                        <div class="search-box not-click mt-3 rounded-2">
                                            <form action="{{ '/' }}" method="get">
                                                <input type="text"  class="not-click form-control" name="search" placeholder="Pencarian..." value="" >
                                                <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="shpping-cart">
                                        <a class="cart-btn font-small-4 text-bold-500 text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon mr-1"></i><i class="flag-icon @if(Config::get('app.locale')=='id') flag-icon-id @elseif (Config::get('app.locale')=='en') flag-icon-gb @endif box-shadow-1 mr-1"></i><i class="fa fa-angle-down"></i></a>
                                        <div class="cart pt-2 pb-2 mt-2">
                                            <ul>
                                                <li>
                                                    <a class="dropdown-item @if(Config::get('app.locale')=='id') active @endif font-small-2" href="{!! LaravelLocalization::getLocalizedURL('id')  !!}"><i class="flag-icon flag-icon-id pr-4"></i> INDONESIA</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item @if(Config::get('app.locale')=='en') active @endif font-small-2" href="{!! LaravelLocalization::getLocalizedURL('en') !!}"><i class="flag-icon flag-icon-gb pr-4"></i> ENGLISH</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
        <!-- menu end -->
    </div>
</header>
