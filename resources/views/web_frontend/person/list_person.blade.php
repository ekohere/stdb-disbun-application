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
                    <div class="font-medium-5 text-black text-bold-700">{!! $headTitle !!}</div>
                    <div class="font-medium-5 text-black text-bold-700">@lang('resource.name')</div>
            </div>

            {{--Tree 1--}}
            {{--@foreach($listDapil as $dapil)
                <div class="text-center mb-20 mt-50">
                    <div class="font-medium-2 text-black text-bold-700">{!! $dapil->name !!}</div>
                    <div class="font-medium-1 text-black ">{!! $dapil->definition !!}</div>
                </div>--}}
            <div class="row justify-content-center">
                @foreach($listPerson as $person)
                    <a href="{{ route('detail-person',[$person->slug]) }}" class="width-150 m-2">
                        <div class="team team-hover box-shadow-6 rounded">
                            <div class="team-photo">
                                @if(trim($person->getFirstMediaUrl('default','thumb'))==='')
                                <img class="img-fluid mx-auto" src="{!! asset('image/no-photo.png') !!}" alt="">
                                @else
                                <img class="img-fluid mx-auto" src="{!! $person->getFirstMediaUrl('default','thumb') !!}" alt="">
                                @endif
                            </div>
                            <div class="team-description p-1">
                                <div class="team-info">
                                    <label class="text-bold-600 font-small-2 text-black text-capitalize mb-0" style="line-height: normal">{!! $person->full_name !!}</label><br>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            {{--@endforeach--}}
        </div>
    </section>
@endsection
