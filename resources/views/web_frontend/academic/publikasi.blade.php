@extends('web_frontend.layout.app')
@section('content')
<section class="service white-bg mt-80 sm-mt-40">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2 class="text-blue">
              @lang('resource.publikasi')
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
                            <th>@lang('resource.nama')</th>
                            <th>@lang('resource.asal')</th>
                            <th>@lang('resource.judul')</th>
                            <th>@lang('resource.tanggal')</th>
                            <th>@lang('resource.jenispublikasi')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                            @foreach($listPerson as $person)
                                @if (is_array($person->publikasi) || is_object($person->publikasi))
                                @foreach($person->publikasi as $item)
                                <tr>
                                <tr>
                                    <td>{!! $no++ !!}</td>
                                    <td>{!! $person->full_name !!}</td>
                                    <td class="text-left">{!! $item['asal_data'] !!}</td>
                                    <td class="text-left">{!! $item['judul'] !!}</td>
                                    <td class="text-left">{!! $item['tanggal'] !!}</td>
                                    <td class="text-left">{!! $item['jenis_publikasi'] !!}</td>
                                </tr>
                                </tr>
                                @endforeach
                                @endif
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
