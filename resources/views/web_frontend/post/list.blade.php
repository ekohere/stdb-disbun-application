@extends('web_frontend.layout.app')

@section('css')
@livewireStyles
@endsection

@section('content')
<section class="service white-bg mt-80 sm-mt-40">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="title-effect">
                        @lang('resource.sepukam')
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="mb-80">
    <div class="container">
        <div class="owl-carousel bottom-center-dots" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">

        </div>
        <div class="divider outset mt-30"></div>
        <div class="gray-bg p-5 mt-60 mb-60 sm-mt-0 sm-mb-0">
            <livewire:posts>
        </div>
    </div>
</section>

@endsection

@section('scripts')
@livewireScripts
@endsection