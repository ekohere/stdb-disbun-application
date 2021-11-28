@extends('web_frontend.layout.app')
@section('content')
<section class="service white-bg mt-80 sm-mt-40">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2 class="title-effect">
              @if ( Config::get('app.locale') == 'en')
                  {{$lembaga->name_english}}
              @elseif ( Config::get('app.locale') == 'id' )
                  {{$lembaga->name}}
              @endif
          </h2>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="mb-80">
  <div class="container">
      <div class="owl-carousel bottom-center-dots" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
          @foreach($lembaga->getMedia() as $image)
              <div class="item">
                  <img class="img-fluid mb-15 rounded" src="{!! asset($image->getUrl("cover"))  !!}" alt="" style="height: auto;width: 100%;object-fit: cover">
              </div>
          @endforeach
      </div>
    <div class="divider outset mt-30"></div>
    <div class="gray-bg p-5 mt-60 mb-60 sm-mt-0 sm-mb-0">
        @if ( Config::get('app.locale') == 'en')
            {!! $lembaga->definition_english !!}
        @elseif ( Config::get('app.locale') == 'id' )
            {!! $lembaga->definition !!}
        @endif
    </div>
  </div>
</section>

@endsection
