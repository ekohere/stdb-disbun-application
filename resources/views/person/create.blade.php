@extends('layouts.app')

@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card rounded-1 box-shadow-0-1">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-green p-2 media-middle rounded-1">
                                    <i class="fa fa-pencil-square font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-1">
                                    <span class="green font-medium-5 text-bold-700">Input Anggota Dewan</span><br>
                                    <span style="margin-top: -5px">Tambah Anggota Dewan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card rounded-1 box-shadow-1">
                        <div class="card-content">
                            <div class="card-body">
                                {!! Form::open(['route' => 'person.store', 'files' => true], ['class' => 'form']) !!}
                                <div class="form-body">
                                    @include('person.fields')
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/media-pro/styles.css')}}">

    <livewire:styles />
    <livewire:scripts />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
@endsection

@section('scripts')

@endsection
