<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    {!! SEO::generate(true) !!}

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/logo/logo-politani.png') }}" />

    <!-- font -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,500,500i,600,700,800,900|Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900|Open Sans:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/plugins-css.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/revolution/css/settings.css') }}" media="screen" />

    <!-- Typography -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/typography.css') }}" />

    <!-- Shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/shortcodes/shortcodes.css') }}" />

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/style.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/demo-categories/css/menu-center.css') }}" />

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/responsive.css') }}" />

    <!-- jquery -->
    <script src="{{ asset('master/web-assets/js/jquery-3.4.1.min.js') }}"></script>

    @yield('css')
</head>

<body>

    <div class="wrapper">
        <!--=================================
         preloader -->

{{--        <div id="pre-loader">--}}
{{--            <img src="master/web-assets/images/pre-loader/loader-01.svg" alt="">--}}
{{--        </div>--}}

        <!--=================================
         preloader -->

        <!--=================================
         toolbar -->
        @include('web_frontend.layout.toolbar')
        <!--=================================
         toolbar -->

        @yield('content')

        <!--=================================
         footer -->

        @include('web_frontend.layout.footer')

        <!--=================================
         footer -->

    </div>

    <div id="back-to-top"><a class="top arrow pl-1 pr-1 pb-2 box-shadow-1" href="#top"><i class="ti-angle-up"></i><span class="font-small-1 text-bold-700">
                @if ( Config::get('app.locale') == 'en')
                    TO THE TOP
                @elseif ( Config::get('app.locale') == 'id' )
                    KE ATAS
                @endif
            </span></a></div>

    <!--=================================
     jquery -->

    <script src="{{ asset('js/share.js') }}"></script>

    <!-- plugins-jquery -->
    <script src="{{ asset('master/web-assets/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>var plugin_path = '{{  asset('master/web-assets/js/') }}/';</script>


    <script src="{{ asset('master/web-assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('master/web-assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('master/web-assets/revolution/js/revolution-custom.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset('master/web-assets/js/custom.js') }}"></script>

    @yield('scripts')
</body>
</html>

