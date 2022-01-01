<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portal E-STDB</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="http://koperasi-sawit.kutaitimurkab.go.id/storage/settings/April2021/X07Arr4dYPYybtDkozL5.png" />

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
    <section class="height-100vh d-flex align-items-center login bg-overlay-black-50" style="background-image: url('{{asset('image/bg/bg-login.jpg')}}');background-size: cover;background-repeat: no-repeat;background-position: center">
        <div class="container p-0">
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-8 col-md-6 login-fancy-bg">
                    <div class="login-fancy pos-r pb-0">
                        <div class="list-unstyled pos-bot">
                            <div class="list-inline-item d-flex">
                                <img src="http://koperasi-sawit.kutaitimurkab.go.id/storage/settings/April2021/X07Arr4dYPYybtDkozL5.png" alt="" class="img-fluid height-70">
                                <div class="pl-10 pt-1">
                                    <div class="text-white font-medium-3 text-bold-700 mb-0">DINAS PERKEBUNAN</div>
                                    <h6 class="text-white mb-0 text-bold-400">Selamat Datang di Portal E-STDB untuk pengajuan STDB</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 white-bg">
                    <form class="login-fancy pb-40 clearfix" method="post" action="{{ url('/login') }}">
                        @csrf

                        <h6 class="mb-30 text-bold-700 text-uppercase">Sign In Below:</h6>
                        <div class="section-field mb-20">
                            <label class="mb-10 text-blue-grey" for="name">E-mail</label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="E-mail"
                                   class="web form-control rounded-2 font-small-3 text-bold-600 border @error('email') is-invalid @enderror" required>
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="section-field mb-20">
                            <label class="mb-10 text-blue-grey" for="Password">Password</label>
                            <input type="password"
                                   name="password"
                                   placeholder="Password"
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
                                       class="Captcha form-control font-small-3 ml-20 pt-0 pb-0 rounded-2 border @error('captcha') is-invalid @enderror" required>
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
                            <span>Login</span>
                            <i class="fa fa-check"></i>
                        </button>
{{--                        <p class="mb-0 mt-2">--}}
{{--                            <a href="{{ route('register') }}" class="text-center">Belum punya akun? Register disini</a>--}}
{{--                        </p>--}}
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
