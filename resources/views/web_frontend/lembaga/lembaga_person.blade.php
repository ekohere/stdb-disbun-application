@extends('web_frontend.layout.app')
@section('content')
    <style>
        p {
            color: black;
            font-weight: 500;
        }
    </style>
    <section class="blog blog-single white-bg pt-40 pb-40">
        <div class="container">
            <div class="text-center mb-30">
                <div class="font-medium-5 text-black text-bold-700 text-uppercase" style="line-height: 1.5rem">

                    @if ( Config::get('app.locale') == 'en')
                        {!! $lembaga->name_english !!} @lang('resource.struktur')
                    @elseif ( Config::get('app.locale') == 'id' )
                        @lang('resource.struktur') {!! $lembaga->name !!}
                    @endif
                    </div>
                <div class="divider double mt-10"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    {{--Tree 1--}}
                    @foreach($listLembagaPerson as $index=>$lembagaPerson)
                        <div class="row justify-content-center">
                            @foreach($lembagaPerson as $item)
                                <a href="{!! route('detail-person',[$item->person->slug]) !!}" class="width-130 m-2">
                                    <div class="team team-hover box-shadow-6 rounded">
                                        <div class="team-photo">
                                            <img class="img-fluid mx-auto" src="{!! $item->person->getFirstMediaUrl('default','thumb') !!}" alt="">
                                        </div>
                                        <div class="team-description p-1">
                                            <div class="team-info">
                                                <label class="text-bold-600 font-small-1 text-black text-capitalize mb-0" style="line-height: 1rem">{!! $item->person->full_name !!}</label><br>
                                                <span class="font-small-1 text-capitalize text-gray-dark">{!! $item->jabatan->name !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
