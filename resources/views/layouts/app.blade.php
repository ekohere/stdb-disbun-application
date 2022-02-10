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
            /*.timeline{*/
            /*    !*width:800px;*!*/
            /*    !*background-color:#072736;*!*/
            /*    color:#fff;*/
            /*    padding:10px 10px;*/
            /*    !*box-shadow:0px 0px 10px rgba(0,0,0,.5);*!*/
            /*}*/
            .timeline ul{
                list-style-type:none;
                border-left:2px dashed #bcbcbc;
                padding:0px 5px;
            }
            .timeline ul li{
                padding:20px 10px;
                position:relative;
                cursor:pointer;
                transition:.5s;
                border-radius: 5%;
                color:#fff;
            }
            .timeline ul li span{
                display:inline-block;
                background-color:#1685b8;
                border-radius:25px;
                padding:2px 5px;
                font-size:12px;
                text-align:center;
            }
            .timeline ul li:before{
                position:absolute;
                content:'';
                width:10px;
                height:10px;
                background-color: #adadad;
                border-radius:50%;
                left:-11px;
                top:28px;
                transition:.5s;
            }
            .timeline ul li:hover{
                background-color: rgb(204, 204, 204);
            }
            .timeline ul li:hover:before{
                background-color: #38c7ff;
                box-shadow:0px 0px 10px 2px #38C7FF;
            }
            .timeline ul li:first-child:before{
                background-color:#0F0;
                box-shadow:0px 0px 10px 2px #0F0;
            }
            @media (max-width:300px){
                .timeline{
                    width:100%;
                    padding:30px 5px 30px 10px;
                }
                .timeline ul li .content h3{
                    color:#34ace0;
                    font-size:12px;
                }

            }

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
