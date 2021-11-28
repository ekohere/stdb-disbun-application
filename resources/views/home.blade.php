@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
        @can('post.index')
            {{-- <a href="{{ url('posts') }}" class="card"> --}}
        @endcan
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 bg-success text-white media-body text-left rounded-left">
                            <h5 class="text-white">Posting</h5>
                            {{-- <h4 class="text-white text-bold-600 mb-0">{{ \App\Models\Post::count() }}</h4> --}}
                            <h4 class="text-white text-bold-600 mb-0">0</h4>
                        </div>
                        <div class="p-2 text-center bg-success bg-darken-2 rounded-right">
                            <i class="icon-book-open font-large-2 text-white"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
        @can('agendas.index')
            {{-- <a href="{{ url('agendas') }}" class="card"> --}}
        @endcan
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 bg-warning text-white media-body text-left rounded-left">
                            <h5 class="text-white">Agenda</h5>
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
        @can('galeris.index')
            {{-- <a href="{{ url('galeris') }}" class="card"> --}}
        @endcan
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 bg-danger text-white media-body text-left rounded-left">
                            <h5 class="text-white">Galeri</h5>
                            {{-- <h4 class="text-white text-bold-600 mb-0">{{ \App\Models\Galeri::count() }}</h4> --}}
                            <h4 class="text-white text-bold-600 mb-0">0</h4>
                        </div>
                        <div class="p-2 text-center bg-danger bg-darken-2 rounded-right">
                            <i class="icon-picture font-large-2 text-white"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
        @can('personDewans.index')
            {{-- <a href="{{ url('personDewans') }}" class="card"> --}}
        @endcan
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 bg-info text-white media-body text-left rounded-left">
                            <h5 class="text-white">Pegawai</h5>
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
    <div class="row mt-1">
        <div class="col-lg-7">
            <div class="card rounded-2 box-shadow-0-1">
                <div class="card-body">
                    <div class="font-medium-3 text-bold-700 black row">
                        <div class="col-6">
                            Post Harian
                        </div>
                        @can('posts.create')
                        <div class="col-6 text-right">
                            {{-- <a href="{{ url('posts/create') }}" class=""><i class="fa fa-plus green"></i></a> --}}
                        </div>
                        @endcan
                    </div>
                    {{-- <div class="font-small-3 text-bold-500 black mb-2"><i>Data {{ $post->count() }} of {{ \App\Models\Post::count() }}</i></div> --}}
                    {{-- @foreach($post as $item)
                        <a href="{{ url('post/'.$item->slug) }}" class="d-flex mb-1">
                            <img class="width-50 rounded" src="{{ asset($item->getFirstMediaUrl("default","thumb")) }}" alt="">
                            <div class="pl-1">
                                <span class="font-small-3 grey darken-3"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D/m/Y') }}</span>
                                <div class="font-small-3 text-bold-600 black desc-p-1">{{ $item->title }}</div>
                            </div>
                        </a>
                    @endforeach --}}
                    @can('posts.index')
                    <div class="mt-2" style="border-bottom: 1px solid #dcdcdc"></div>
                    {{-- <div class="text-center mt-1"><a href="{{ url('posts') }}" class="darken-4 blue">Selengkapnya</a></div> --}}
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card rounded-2 box-shadow-0-1">
                <div class="card-body">
                    <div class="font-medium-3 text-bold-700 black row">
                        <div class="col-6">
                            Agenda Politani Samarinda
                        </div>
                        @can('agendas.create')
                        <div class="col-6 text-right">
                            {{-- <a href="{{ url('agendas/create') }}" class=""><i class="fa fa-plus green"></i></a> --}}
                        </div>
                        @endcan
                    </div>
                    {{-- <div class="font-small-3 text-bold-500 black mb-1"><i>Data {{ $agenda->count() }} of {{ \App\Models\Agenda::count() }}</i></div> --}}
                    {{-- @foreach($agenda as $item)
                        <a href="{{ url('agenda/agenda-detail/'.$item->slug) }}" class="mb-1">
                            <div class="font-medium-1 desc-p-1 black text-bold-600">{{ $item->title }}</div>
                            <div class="font-small-3 desc-p-1 grey darken-2">{!!  $item->content !!}</div>
                            <div class="font-small-3 darken-3 danger text-bold-700">
                                <span><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($item->schedule_date)->isoFormat('D MMMM Y') }}</span>
                                <span class="pl-1"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($item->schedule_time)->format('h:i A') }}</span>
                            </div>
                        </a>
                    @endforeach --}}
                    @can('agendas.index')
                    <div class="mb-0-1 mt-0-1" style="border-bottom: 1px solid #dcdcdc"></div>
                    {{-- <div class="text-center mt-1"><a href="{{ url('agendas') }}" class="darken-4 blue">Selengkapnya</a></div> --}}
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
