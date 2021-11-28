@extends('web_frontend.layout.app')
@section('content')
<section class="service white-bg mt-80 sm-mt-40">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2 class="text-blue">
              @lang('resource.penelitian')
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
                            <th>@lang('resource.tahun')</th>
                            <th>@lang('resource.judul')</th>
                            <th>@lang('resource.lamatahun')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                            @foreach($listPerson as $person)
                                @if (is_array($person->penelitian) || is_object($person->penelitian))
                                @foreach($person->penelitian as $item)
                                <tr>
                                <tr>
                                    <td>{!! $no++ !!}</td>
                                    <td>{!! $person->full_name !!}</td>
                                    <td>{!! $item['tahun_pelaksanaan'] !!}</td>
                                    <td class="text-left">{!! $item['judul'] !!}</td>
                                    <td>{!! $item['lama_kegiatan'] !!}</td>
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
