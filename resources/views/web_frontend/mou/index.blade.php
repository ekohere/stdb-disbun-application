@extends('web_frontend.layout.app')
@section('content')
<section class="service white-bg mt-80 sm-mt-40">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2 class="text-blue">
              @if ( Config::get('app.locale') == 'en')
                  Memorandum of Understanding with {{$categoryMou->name_english}}
              @elseif ( Config::get('app.locale') == 'id' )
                  Perjanjian Kerjasama dengan {{$categoryMou->name}}
              @endif
          </h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="mb-80" id="font-awesome-icons">
  <div class="container">
{{--    <div class="font-medium-2 text-blue-grey text-bold-700"><i>300 File data tersedia</i></div>--}}
    <div class="divider outset mt-10"></div>
    <div class="mt-40 mb-60">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-2 text-center table-striped">
                        <thead>
                        <tr>
                            <th>@lang('resource.no')</th>
                            <th>@lang('resource.instansi')</th>
                            <th>@lang('resource.nosurat')</th>
                            <th>@lang('resource.mulai')</th>
                            <th>@lang('resource.berakhir')</th>
                            <th>@lang('resource.keterangan')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($listMou as $item)
                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td class="text-left">{!! $item->instansi_external !!}</td>
                                    <td class="text-left">{!! $item->number_external !!}<br> {!! $item->number_internal !!}</td>
                                    <td class="text-left">{!! $item->date_start->format('d F Y') !!}</td>
                                    <td class="text-left">{!! isset($item->date_end)?$item->date_end->format('d F Y'):"Tanpa Batasan" !!}</td>
                                    <td class="text-left">{!! $item->definition !!}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

  </div>
</section>

@endsection
