<li>
    <a href="#"><i class="fa fa-bell"></i>Politani{{--@lang('resource.infumum')--}}<i class="fa fa-angle-down fa-indicator"></i></a>
    <ul class="drop-down-multilevel left-side box-shadow-1 rounded">
        @foreach($tentangPolitaniMenu->pages as $item)
            <li><a href="{!! route('detail-page',[$item->slug]) !!}">
                    @if ( Config::get('app.locale') == 'en')
                        {{$item->title_english}}
                    @elseif ( Config::get('app.locale') == 'id' )
                        {{$item->title}}
                    @endif
                </a></li>
        @endforeach
            <li><a href="{!! route('person-lembaga',['direktorat']) !!}">
                    @lang('resource.struktur_pimpinan')
                </a></li>
        @foreach($categoryPersonMenu as $item)
            <li><a href="{!! route('all-person',[$item->slug]) !!}">
                    @if ( Config::get('app.locale') == 'en')
                        {{$item->name_english}} Data
                    @elseif ( Config::get('app.locale') == 'id' )
                        Data {{$item->name}}
                    @endif
                </a></li>
        @endforeach

    </ul>
</li>
<li><a href="{{ '/' }}"><i class="fa fa-building"></i> @lang('resource.lembaga_kampus')</a>
    <ul class="drop-down-multilevel left-side">
        <li>
            <a href="#">@lang('resource.jurusan')<i class="fa fa-angle-down fa-indicator"></i></a>
            <ul class="drop-down-multilevel right-side">
                @foreach($lembagaJurusanMenu as $item)
                    <li><a href="{!! route('detail-lembaga',[$item->slug]) !!}">
                            @if ( Config::get('app.locale') == 'en')
                                {{$item->name_english}}
                            @elseif ( Config::get('app.locale') == 'id' )
                                {{$item->name}}
                            @endif
                        </a></li>
                @endforeach
            </ul>
        </li>

        <li>
            <a href="#"> @lang('resource.prodi') <i class="fa fa-angle-down fa-indicator"></i></a>
            <ul class="drop-down-multilevel right-side">
                @foreach($lembagaProgramStudiMenu as $item)
                    <li><a href="{!! route('detail-lembaga',[$item->slug]) !!}">
                            @if ( Config::get('app.locale') == 'en')
                                {{$item->name_english}}
                            @elseif ( Config::get('app.locale') == 'id' )
                                {{$item->name}}
                            @endif
                        </a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>

<li>
    <a href="#"><i class="fa fa-graduation-cap "></i>
        @lang('resource.akademik')
        <i class="fa fa-angle-down fa-indicator"></i></a>
    <ul class="drop-down-multilevel left-side">
        <li>
            <a href="{!! route('listAkademikKekayaanIntelektual') !!}">
                @lang('resource.kekayaan-intelektual')
            </a>
        </li>

        <li>
            <a href="{!! route('listAkademikPublikasi') !!}">
            @lang('resource.publikasi')
            </a>
        </li>

        <li>
            <a href="{!! route('listAkademikPenelitian') !!}">
            @lang('resource.penelitian')
            </a>
        </li>
    </ul>
</li>

{{--@if(isset($akademikMenu))
<li>
    <a href="#"><i class="fa fa-graduation-cap "></i>
        @if ( Config::get('app.locale') == 'en')
            {{$akademikMenu->name_english}}
        @elseif ( Config::get('app.locale') == 'id' )
            {{$akademikMenu->name}}
        @endif
        <i class="fa fa-angle-down fa-indicator"></i></a>
    <ul class="drop-down-multilevel left-side">
        @foreach($akademikMenu->childs as $childMenu)
        <li>
            <a href="#">
                @if ( Config::get('app.locale') == 'en')
                    {{$childMenu->name_english}}
                @elseif ( Config::get('app.locale') == 'id' )
                    {{$childMenu->name}}
                @endif
                <i class="fa fa-angle-down fa-indicator"></i></a>

                    <ul class="drop-down-multilevel right-side">
                        @foreach($childMenu->pages as $page)
                            <li>
                                <a href="{!! route('detail-page',[$page->slug]) !!}">
                                    @if ( Config::get('app.locale') == 'en')
                                        {{$page->name_english}}
                                    @elseif ( Config::get('app.locale') == 'id' )
                                        {{$page->name}}
                                    @endif
                            </li>
                        @endforeach
                    </ul>
        </li>
        @endforeach
    </ul>
</li>
@endif--}}

@if(isset($kemahasiswaMenu))
    <li>
        <a href="#"><i class="fa fa-users "></i>
            @if ( Config::get('app.locale') == 'en')
                {{$kemahasiswaMenu->name_english}}
            @elseif ( Config::get('app.locale') == 'id' )
                {{$kemahasiswaMenu->name}}
            @endif
            <i class="fa fa-angle-down fa-indicator"></i></a>
        <ul class="drop-down-multilevel left-side">
            @foreach($kemahasiswaMenu->childs as $childMenu)
                <li>
                    <a href="#">
                        @if ( Config::get('app.locale') == 'en')
                            {{$childMenu->name_english}}
                        @elseif ( Config::get('app.locale') == 'id' )
                            {{$childMenu->name}}
                        @endif
                        <i class="fa fa-angle-down fa-indicator"></i></a>

                    <ul class="drop-down-multilevel right-side">
                        @foreach($childMenu->pages as $page)
                            <li>
                                <a href="{!! route('detail-page',[$page->slug]) !!}">
                                @if ( Config::get('app.locale') == 'en')
                                    {{$page->name_english}}
                                @elseif ( Config::get('app.locale') == 'id' )
                                    {{$page->name}}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </li>
@endif

@if(isset($kerjasamaMenu))
    <li>
        <a href="#"><i class="fa fa-handshake-o "></i>
            @lang('resource.kerjasama')
            <i class="fa fa-angle-down fa-indicator"></i></a>
        <ul class="drop-down-multilevel left-side">
            @foreach($kerjasamaMenu as $item)
                <li>
                    <a href="{!! route('listMouByCategory',[$item->slug]) !!}">
                        @if ( Config::get('app.locale') == 'en')
                            {{$item->name_english}}
                        @elseif ( Config::get('app.locale') == 'id' )
                            {{$item->name}}
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
@endif


{{--<li>
<a href="#"><i class="fa fa-graduation-cap"></i> @lang('resource.prodi') <i class="fa fa-angle-down fa-indicator"></i></a>
<!-- <li><a href="{{ '/' }}"><i class="fa fa-graduation-cap"></i> Program Studi</a></li> -->
<ul class="drop-down-multilevel left-side box-shadow-1 rounded">
    @foreach($lembagaProgramStudiMenu as $item)
        <li><a href="{!! route('detail-lembaga',[$item->slug]) !!}">
                @if ( Config::get('app.locale') == 'en')
                    {{$item->name_english}}
                @elseif ( Config::get('app.locale') == 'id' )
                    {{$item->name}}
                @endif
            </a></li>
    @endforeach

    </ul>

</li>--}}
<li>
    <a href="#"><i class="fa fa-graduation-cap"></i> @lang('resource.file_menu') <i class="fa fa-angle-down fa-indicator"></i></a>
<!-- <li><a href="{{ '/' }}"><i class="fa fa-graduation-cap"></i> Program Studi</a></li> -->
    <ul class="drop-down-multilevel left-side box-shadow-1 rounded">
        @foreach($fileCategoryMenu as $item)
            <li><a href="{!! route('files-download',[$item->slug]) !!}">
                    @if ( Config::get('app.locale') == 'en')
                        {{$item->name_english}}
                    @elseif ( Config::get('app.locale') == 'id' )
                        {{$item->name}}
                    @endif
                </a></li>
        @endforeach

    </ul>
</li>


