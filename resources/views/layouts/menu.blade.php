<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="{{route('home')}}"><i class="fa fa-home"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Home</span></a>
</li>
<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Menu Utama</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
@role('koordinator')
<li class="{{ Request::is('anggotas*') ? 'active' : '' }}">
    <a href="{!! route('anggotas.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Pekebun</span></a>
</li>
@endrole


{{--<li class="nav-item"><a href="#"><i class="fa fa-table"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Master Data</span></a>--}}
{{--    <ul class="menu-content">--}}
{{--        <li class="{{ Request::is('sTDBProfiles*') ? 'active' : '' }}">--}}
{{--            <a href="{!! route('sTDBProfiles.index') !!}"><i class="fa fa-user"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> STDB Profiles</span></a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}

<li class="{{ Request::is('sTDBRegisters') ? 'active' : '' }}">
    <a href="{!! route('sTDBRegisters.index') !!}"><i class="fa fa-circle-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> List Pengajuan STDB</span></a>
</li>
<li class="{{ Request::is('sTDBRegister/done-review') ? 'active' : '' }}">
    <a href="{!! route('stdbDoneVerified') !!}"><i class="fa fa-circle-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> STDB Done Reviewed</span></a>
</li>
{{--<li class="{{ Request::is('sTDBDetailRegisters*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('sTDBDetailRegisters.index') !!}"><i class="fa fa-circle-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> STDB Detail Registers</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('sTDBRegisterStatuses*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('sTDBRegisterStatuses.index') !!}"><i class="fa fa-circle-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> Status Pengajuan STDB</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('sTDBPersils*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('sTDBPersils.index') !!}"><i class="fa fa-circle-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> Data Persil STDB</span></a>--}}
{{--</li>--}}

@role('admin')
    <li class="nav-item"><a href="#"><i class="fa fa-table"></i><span class="menu-title" data-i18n="nav.dash.main">Master Data</span></a>
        <ul class="menu-content">
            <li class="{{ Request::is('sTDBStatuses*') ? 'active' : '' }}">
                <a href="{!! route('sTDBStatuses.index') !!}"><i class="fa fa-info-circle"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> Jenis Status STDB</span></a>
            </li>
            <li class="{{ Request::is('kPHS*') ? 'active' : '' }}">
                <a href="{!! route('kPHS.index') !!}"><i class="fa fa-circle-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> Data KPH</span></a>
            </li>
{{--            <li class="{{ Request::is('kphHasKecamatans*') ? 'active' : '' }}">--}}
{{--                <a href="{!! route('kphHasKecamatans.index') !!}"><i class="fa fa-circle-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> KPH Has Kecamatan</span></a>--}}
{{--            </li>--}}
        </ul>
    </li>
    <li class="nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title" data-i18n="nav.dash.main">Pengaturan User</span></a>
        <ul class="menu-content">
            <li class="{{ Request::is('users*') ? 'active' : '' }}">
                <a href="{!! route('users.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Akun Pengguna</span></a>
            </li>
            <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
                <a href="{!! route('permissions.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Permissions</span></a>
            </li>
            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                <a href="{!! route('roles.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Roles</span></a>
            </li>
        </ul>
    </li>
@endrole

{{--<li class="{{ Request::is('anggotas*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('anggotas.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Anggota</span></a>--}}
{{--</li>--}}

{{-- <li class="{{ Request::is('profil*') ? 'active' : '' }}">
    <a href="{!! route('profil') !!}"><i class="fa fa-user"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Akun</span></a>
</li>
<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! url('profiles') !!}"><i class="fa fa-info-circle"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Info</span></a>
</li>
@canany(['pages.index','pageCategories.index'])
<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Page</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-leanpub"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Page</span></a>
    <ul class="menu-content">
        @can('pages.index')
        <li class="{{ Request::is('pages*') ? 'active' : '' }}">
            <a href="{!! route('pages.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Page</span></a>
        </li>
        @endcan
        @can('pageCategories.index')
        <li class="{{ Request::is('pageCategories*') ? 'active' : '' }}">
            <a href="{!! route('pageCategories.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kategori Page</span></a>
        </li>
        @endcan
    </ul>
</li>
@endcanany
@canany(['posts.index','postCategories.index'])
<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Post</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-newspaper-o"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Post</span></a>
    <ul class="menu-content">
        @can('posts.index')
        <li class="{{ Request::is('posts*') ? 'active' : '' }}">
            <a href="{!! route('posts.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Post</span></a>
        </li>
        @endcan
        @can('postCategories.index')
        <li class="{{ Request::is('postCategories*') ? 'active' : '' }}">
            <a href="{!! route('postCategories.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kategori Post</span></a>
        </li>
        @endcan
    </ul>
</li>
@endcanany
@can('galeris.index')
<li class="{{ Request::is('galeris*') ? 'active' : '' }}">
    <a href="{!! route('galeris.index') !!}"><i class="fa fa-picture-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title font-small-4 black">Galeri</span></a>
</li>
@endcan

<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Menu Lembaga / Person</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-font-awesome"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Lembaga / Person</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('categoryLembagas*') ? 'active' : '' }}">
            <a href="{!! route('categoryLembagas.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Category Lembaga</span></a>
        </li> --}}
        {{--@can('personSekretariats.index')--}}
            {{-- <li class="{{ Request::is('lembaga*')&&!Request::is('lembagaPerson*') ? 'active' : '' }}">
                <a href="{!! route('lembaga.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Lembaga</span></a>
            </li> --}}
        {{--@endcan
        @can('jabatanSekretariats.index')--}}
        {{-- <li class="{{ Request::is('categoryPerson*') ? 'active' : '' }}">
            <a href="{!! route('categoryPerson.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Category Person</span></a>
        </li>
            <li class="{{ Request::is('person*') ? 'active' : '' }}">
                <a href="{!! route('person.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Person</span></a>
            </li> --}}
        {{--@endcan--}}
        {{-- <li class="{{ Request::is('jabatan*') ? 'active' : '' }}">
            <a href="{!! route('jabatan.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Jabatan</span></a>
        </li>

    </ul>
<li>
<li class=" nav-item"><a href="#"><i class="fa fa-font-awesome"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Lembaga-Person-Jabatan</span></a>
    <ul class="menu-content">
    @foreach($lembagaMenu as $item)
    <li class="{{ Request::is('lembagaPerson/'.$item->slug.'*') ? 'active' : '' }}">
        <a href="{!! route('lembagaPerson.index',[$item->slug]) !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">{!! $item->name !!}</span></a>
    </li>
    @endforeach
    </ul>
</li>

<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Menu Dokumen Unduhan</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
<li class="nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">File-file</span></a>
    <ul class="menu-content">
            <li class="{{ Request::is('fileCategories*') ? 'active' : '' }}">
                <a href="{!! route('fileCategories.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">File Categories</span></a>
            </li>

            <li class="{{ Request::is('files*') ? 'active' : '' }}">
                <a href="{!! route('files.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Files</span></a>
            </li>
    </ul>
</li> --}}

{{--
@canany(['personSekretariats.index','jabatanSekretariats.index'])
<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Menu Sekretariat</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-font-awesome"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Sekretariat</span></a>
    <ul class="menu-content">
        @can('personSekretariats.index')
        <li class="{{ Request::is('personSekretariats*') ? 'active' : '' }}">
            <a href="{!! route('personSekretariats.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Sekretariat</span></a>
        </li>
        @endcan
        @can('jabatanSekretariats.index')
        <li class="{{ Request::is('jabatanSekretariats*') ? 'active' : '' }}">
            <a href="{!! route('jabatanSekretariats.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Jabatan Sekretariat</span></a>
        </li>
        @endcan
    </ul>
<li>
@endcanany--}}
{{--@canany(['akdCategories.index','akdPersonDewans.index'])
<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Alat Kelengkapan Dewan</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
@can('akdCategories.index')
<li class="{{ Request::is('akdCategories*') ? 'active' : '' }}">
    <a href="{!! route('akdCategories.index') !!}"><i class="fa fa-navicon"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title font-small-4 black">Kategori AKD</span></a>
</li>
@endcan
<li class=" nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Anggota AKD</span></a>
    <ul class="menu-content">
    @can('akdPersonDewans.index')
        @foreach($akdCategoriesMenu as $item)
            @if($item->childs_count>0)
                <li class=" nav-item"><a href="#"><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">{!! $item->name !!}</span></a>
                    <ul class="menu-content">
                        @foreach($item->childs as $child)
                        <li class="{{ Request::is('akdPersonDewans/'.$child->slug.'*') ? 'active' : '' }}">
                            <a href="{!! url('akdPersonDewans/'.$child->slug) !!}">{!! $child->name !!}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            @else
            <li class="{{ Request::is('akdPersonDewans/'.$item->slug.'*') ? 'active' : '' }}">
                <a href="{!! url('akdPersonDewans/'.$item->slug) !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">{!! $item->name !!}</span></a>
            </li>
            @endif
        @endforeach
    @endcan
    </ul>
</li>
@endcanany--}}

{{-- @canany(['agendas.index','agendaCategories.index'])
    <li class="navigation-header">
        <span data-i18n="nav.category.layouts">--Agenda</span>
        <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Agenda"></i>
    </li>
    <li class="nav-item"><a href="#"><i class="fa fa-calendar-o"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Agenda</span></a>
        <ul class="menu-content">
            @can('agendas.index')
            <li class="{{ Request::is('agendas*') ? 'active' : '' }}">
                <a href="{!! route('agendas.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Agenda</span></a>
            </li>
            @endcan
            @can('agendaCategories.index')
            <li class="{{ Request::is('agendaCategories*') ? 'active' : '' }}">
                <a href="{!! route('agendaCategories.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kategori Agenda</span></a>
            </li>
            @endcan
        </ul>
    </li>
@endcanany


<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--MOU/KERJASAMA</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Agenda"></i>
</li>
<li class="nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">MOU/KERJASAMA</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('categoryMous*') ? 'active' : '' }}">
            <a href="{!! route('categoryMous.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Category MOU</span></a>
        </li>

        <li class="{{ Request::is('mous*') ? 'active' : '' }}">
            <a href="{!! route('mous.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">MOU</span></a>
        </li>
    </ul>
</li>
 --}}

{{--
@canany(['jdihs.index','jdihCategories.index','jdihStatuses.index'])
    <li class="navigation-header">
        <span data-i18n="nav.category.layouts">--Menu JDIH</span>
        <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
    </li>
    <li class=" nav-item"><a href="#"><i class="fa fa-newspaper-o"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">JDIH</span></a>
        <ul class="menu-content">
        @can('jdihs.index')
        <li class="{{ Request::is('jdihs*') ? 'active' : '' }}">
            <a href="{!! route('jdihs.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">JDIH</span></a>
        </li>
        @endcan
        @can('jdihCategories.index')
        <li class="{{ Request::is('jdihCategories*') ? 'active' : '' }}">
            <a href="{!! route('jdihCategories.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kategori JDIH</span></a>
        </li>
        @endcan
        @can('jdihStatuses.index')
        <li class="{{ Request::is('jdihStatuses*') ? 'active' : '' }}">
            <a href="{!! route('jdihStatuses.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Status JDIH</span></a>
        </li>
        @endcan
        </ul>
    </li>
@endcanany--}}
{{-- <li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Pengaturan</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
@can('profiles.index')
<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! route('profiles.index') !!}"><i class="fa fa-list-alt"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title font-small-4">Profile DPRD</span></a>
</li>
@endcan

@can('backup-data')
<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Backup</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
<li class="{{ Request::is('backup-data') ? 'active' : '' }}">
    <a href="{!! route('backup-data') !!}"><i class="icon-cloud-upload"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Backup Data</span></a>
</li>
@endcan --}}
{{--@endcanany--}}


{{-- <li class="{{ Request::is('banners*') ? 'active' : '' }}">
    <a href="{!! route('banners.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Banners</span></a>
</li>

 --}}
{{--<li class="{{ Request::is('anggotas*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('anggotas.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Anggota</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('persils*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('persils.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Persils</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('petaPersils*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('petaPersils.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Peta Persils</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('karyawans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('karyawans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Karyawans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('penguruses*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('penguruses.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Penguruses</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('pks*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('pks.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Pks</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('mitras*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('mitras.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Mitras</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('asets*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('asets.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Asets</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('transports*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('transports.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Transports</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('drivers*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('drivers.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Drivers</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('kontraks*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('kontraks.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kontraks</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('barangs*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('barangs.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Barangs</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('pembelianBarangs*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('pembelianBarangs.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Pembelian Barangs</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('barangSaprodis*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('barangSaprodis.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Barang Saprodis</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('penjualanSaprodis*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('penjualanSaprodis.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Penjualan Saprodis</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('hargas*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('hargas.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Hargas</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('spbs*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('spbs.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Spbs</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('penjualanTbs*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('penjualanTbs.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Penjualan Tbs</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('gajiPetanis*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('gajiPetanis.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Gaji Petanis</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('gajiKaryawans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('gajiKaryawans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Gaji Karyawans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('neracaSimpanPinjams*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('neracaSimpanPinjams.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Neraca Simpan Pinjams</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('neracaKeuangans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('neracaKeuangans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Neraca Keuangans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('laporanPanens*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('laporanPanens.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Laporan Panens</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('konfliks*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('konfliks.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Konfliks</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('kelolaLingkungans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('kelolaLingkungans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kelola Lingkungans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('pemeliharaans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('pemeliharaans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Pemeliharaans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('pelatihans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('pelatihans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Pelatihans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('jenisBarangs*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('jenisBarangs.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Jenis Barangs</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('jenisBarangSaprodis*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('jenisBarangSaprodis.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Jenis Barang Saprodis</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('kategoriPekerjas*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('kategoriPekerjas.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kategori Pekerjas</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('kategoriBahanPemeliharaans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('kategoriBahanPemeliharaans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kategori Bahan Pemeliharaans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('kategoriPemeliharaans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('kategoriPemeliharaans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kategori Pemeliharaans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('bahanPemeliharaans*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('bahanPemeliharaans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Bahan Pemeliharaans</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('users*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('users.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Users</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('roles*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('roles.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Roles</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('permissions*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('permissions.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Permissions</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('koperasis*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('koperasis.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Koperasis</span></a>--}}
{{--</li>--}}
{{--<li class="{{ Request::is('desas*') ? 'active' : '' }}">--}}
{{--    <a href="{!! route('desas.index') !!}"><i class="fa fa-circle-o"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Desa</span></a>--}}
{{--</li>--}}
