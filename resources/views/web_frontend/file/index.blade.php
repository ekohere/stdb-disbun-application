@extends('web_frontend.layout.app')
@section('content')
<section class="service white-bg mt-80 sm-mt-40">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2 class="text-blue">
              @if ( Config::get('app.locale') == 'en')
                  {{$fileCategory->name_english}}
              @elseif ( Config::get('app.locale') == 'id' )
                  {{$fileCategory->name}}
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
            @foreach($files as $item)
                <div class="col-md-4 col-sm-6 col-12 mb-3 ">
                    <a target="_blank" href="{!! $item->getFirstMediaUrl() !!}" class="d-flex p-2 rounded gray-bg">
                        <i class="fa
                        @if(strpos($item->getFirstMedia()->mime_type,"image"))
                            fa-file-image-o
                        @elseif(strpos($item->getFirstMedia()->mime_type,"pdf"))
                            fa-file-pdf-o
                        @elseif(strpos($item->getFirstMedia()->mime_type,"excel"))
                            fa-file-excel-o
                        @elseif(strpos($item->getFirstMedia()->mime_type,"powerpoint"))
                            fa-file-powerpoint-o
                        @elseif(strpos($item->getFirstMedia()->mime_type,"word"))
                            fa-file-word-o
                        @else
                            fa-folder-open
                        @endif

                        font-large-1 pt-2 pl-2"></i>
                        <div class="ml-3">
                            <h5 class="text-bold-600 font-small-3 mb-0 text-black">
                                @if ( Config::get('app.locale') == 'en')
                                    {{$item->name_english}}
                                @elseif ( Config::get('app.locale') == 'id' )
                                    {{$item->name}}
                                @endif
                            </h5>
                            <span>Download</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="entry-pagination mt-40 mb-40">
        <nav aria-label="Page navigation example text-center">
            <style>
                .pagination {
                    justify-content: center;
                }
            </style>
            {{ $files->links() }}
        </nav>
    </div>

  </div>
</section>

@endsection
