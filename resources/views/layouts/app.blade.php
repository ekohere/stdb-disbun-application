<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="author" content="Britech">
        <title>Backend :: Dashboard</title>
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('asset-web/images/logo-icon-dark.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('asset-web/images/logo-icon-dark.png')}}">
        <link rel="shortcut icon" type="image/png" href="{{asset('asset-web/images/logo-icon-dark.png')}}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <link href="{{asset('master/app-assets/css/font.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700')}}" rel="stylesheet">
        @livewireStyles
        @include('layouts.css')
        @yield('css')
        <style>
            /*Legend specific*/
            .legend {
                padding: 6px 8px;
                font: 14px Arial, Helvetica, sans-serif;
                background: white;
                background: rgba(255, 255, 255, 0.8);
                /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
                /*border-radius: 5px;*/
                line-height: 24px;
                color: #555;
            }
            .legend h4 {
                text-align: center;
                font-size: 16px;
                margin: 2px 12px 8px;
                color: #777;
            }

            .legend span {
                position: relative;
                bottom: 3px;
            }

            .legend i {
                width: 18px;
                height: 18px;
                float: left;
                margin: 0 8px 0 0;
                opacity: 0.7;
            }

            .legend i.icon {
                background-size: 18px;
                background-color: rgba(255, 255, 255, 1);
            }
        </style>
    </head>
    <body class="vertical-layout vertical-mmenu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-mmenu" data-col="2-columns">
        @include('layouts.toolbar')

        @include('layouts.sidebar')
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                @yield('content')
            </div>
        </div>

        @include('layouts.js')
        @yield('scripts')
        @livewireScripts
    </body>
</html>
