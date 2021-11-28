<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator - Politeknik Pertanian Negeri Samarinda</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/logo/logo-politani.png') }}" />

    <!-- font -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900|Open Sans:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/plugins-css.css') }}" />

    <!-- Typography -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/typography.css') }}" />

    <!-- Shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/shortcodes/shortcodes.css') }}" />

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/style.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/demo-categories/css/menu-center.css') }}" />

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('master/web-assets/css/responsive.css') }}" />

</head>

<body>

<div class="wrapper">
    <section class="height-100vh d-flex align-items-center page-section-ptb login blue-bg-dark">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-3 col-md-6 login-fancy-bg bg-overlay-black-20">
                    <div class="login-fancy pos-r">
                        <img src="{{ asset('image/logo/logo-politani-white.png') }}" alt="" class="img-fluid height-100">
                        <div class="text-white mb-20 font-large-2 text-bold-700">Admin</div>
                        <p class="mb-20 text-white">Selamat Datang Admin Website Politeknik Pertanian Negeri Samarinda.</p>
                        <ul class="list-unstyled pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white">HakCipta@ {{ \Carbon\Carbon::now()->format('Y') }}</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 white-bg">
                    <form class="login-fancy pb-40 clearfix" method="post" action="{{ url('/login') }}">
                        @csrf

                        <h3 class="mb-30 text-bold-700">Login</h3>
                        <div class="section-field mb-20">
                            <label class="mb-10 text-blue-grey" for="name">Alamat Email</label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="Masukan Email"
                                   class="web form-control rounded-2 font-small-3 text-bold-600 border @error('email') is-invalid @enderror" required>
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="section-field mb-20">
                            <label class="mb-10 text-blue-grey" for="Password">Kata Sandi </label>
                            <input type="password"
                                   name="password"
                                   placeholder="Masukan Kata Sandi"
                                   class="Password form-control rounded-2 font-small-3 text-bold-600 border @error('password') is-invalid @enderror" required>
                        </div>
                        <div class="section-field mb-20">
                            <div class="d-flex">
                                <div class="refereshrecaptcha">
                                    {!! captcha_img('flat') !!}
                                </div>
                                <input type="text"
                                       maxlength="6"
                                       placeholder="Masukkan Kode Captcha"
                                       name="captcha"
                                       class="Captcha form-control font-small-3 ml-20 rounded-2 border @error('captcha') is-invalid @enderror" required>
                            </div>
                            <a href="javascript:void(0)" onclick="refreshCaptcha()"><i class="fa fa-refresh"></i> Refresh Captcha</a>
                            <script>
                                function refreshCaptcha(){
                                    $.ajax({
                                        url: "/refereshcaptcha",
                                        type: 'get',
                                        dataType: 'html',
                                        success: function(json) {
                                            $('.refereshrecaptcha').html(json);
                                        },
                                        error: function(data) {
                                            alert('Try Again.');
                                        }
                                    });
                                }
                            </script>
                        </div>
                        <button type="submit" class="button button-border black small">
                            <span>Login Sekarang</span>
                            <i class="fa fa-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- jquery -->
<script src="{{ asset('master/web-assets/js/jquery-3.4.1.min.js') }}"></script>

<script src="{{ asset('js/share.js') }}"></script>

<!-- plugins-jquery -->
<script src="{{ asset('master/web-assets/js/plugins-jquery.js') }}"></script>

<!-- plugin_path -->
<script>var plugin_path = '{{  asset('master/web-assets/js/') }}/';</script>

<!-- custom -->
<script src="{{ asset('master/web-assets/js/custom.js') }}"></script>


</body>
</html>
