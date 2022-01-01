@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 bg-success text-white media-body text-left rounded-left">
                            <h5 class="text-white">Total Pengajuan STDB</h5>
                            {{-- <h4 class="text-white text-bold-600 mb-0">{{ \App\Models\Post::count() }}</h4> --}}
                            <h4 class="text-white text-bold-600 mb-0">0</h4>
                        </div>
                        <div class="p-2 text-center bg-success bg-darken-2 rounded-right">
                            <i class="icon-book-open font-large-2 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 bg-warning text-white media-body text-left rounded-left">
                            <h5 class="text-white">STDB Dalam Proses</h5>
                            {{-- <h4 class="text-white text-bold-600 mb-0">{{ \App\Models\Agenda::count() }}</h4> --}}
                            <h4 class="text-white text-bold-600 mb-0">0</h4>
                        </div>
                        <div class="p-2 text-center bg-warning bg-darken-2 rounded-right">
                            <i class="icon-calendar font-large-2 text-white"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 bg-danger text-white media-body text-left rounded-left">
                            <h5 class="text-white">Total Persil STDB</h5>
                            {{-- <h4 class="text-white text-bold-600 mb-0">{{ \App\Models\Galeri::count() }}</h4> --}}
                            <h4 class="text-white text-bold-600 mb-0">0</h4>
                        </div>
                        <div class="p-2 text-center bg-danger bg-darken-2 rounded-right">
                            <i class="icon-picture font-large-2 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 bg-info text-white media-body text-left rounded-left">
                            <h5 class="text-white">Total STDB Verified</h5>
                            {{-- <h4 class="text-white text-bold-600 mb-0">{{ \App\Models\Person::count() }}</h4> --}}
                            <h4 class="text-white text-bold-600 mb-0">0</h4>
                        </div>
                        <div class="p-2 text-center bg-info bg-darken-2 rounded-right">
                            <i class="icon-user font-large-2 text-white"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
{{--        <div class="row mt-1">--}}
{{--            <div class="col-lg-7">--}}
{{--                <div class="card rounded-2 box-shadow-0-1">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="font-medium-3 text-bold-700 black row">--}}
{{--                            <div class="col-6">--}}
{{--                                Post Harian--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
