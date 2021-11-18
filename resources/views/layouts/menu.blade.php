<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="{!! route('home') !!}"><i class="fa fa-home"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Home</span></a>
</li>
<li class="{{ Request::is('profil*') ? 'active' : '' }}">
    <a href="{!! route('profil') !!}"><i class="fa fa-user"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Profil</span></a>
</li>
{{--@canany(['superAdmin.index','userIndex.index','userAdm.index'])--}}
    <li class="navigation-header">
        <span data-i18n="nav.category.layouts">--Pengaturan</span>
        <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
    </li>
    <li class="nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Pengaturan User</span></a>
        <ul class="menu-content">
             {{--@canany(['superAdmin.index','userIndex.index','userAdm.index'])--}}
                <li class="{{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{!! route('users.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Akun Pengguna</span></a>
                </li>
            {{--@endcanany--}}
            {{--@can('superAdmin.index')--}}
                <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
                    <a href="{!! route('permissions.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Permissions</span></a>
                </li>
                <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                    <a href="{!! route('roles.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Roles</span></a>
                </li>
            {{--@endcan--}}
        </ul>
    </li>
{{--@endcanany--}}
<li class="{{ Request::is('wilayahs*') ? 'active' : '' }}">
    <a href="{!! route('wilayahs.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Wilayah</span></a>
</li>

<li class="{{ Request::is('pelayanans*')||Request::is('syaratPelayanans*') ? 'active' : '' }}">
    <a href="{!! route('pelayanans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Pelayanan</span></a>
</li>

<li class="{{ Request::is('wilayahPelayanans*') ? 'active' : '' }}">
    <a href="{!! route('wilayahPelayanans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Wilayah Pelayanan</span></a>
</li>

<li class="{{ Request::is('jenisPelayanans*') ? 'active' : '' }}">
    <a href="{!! route('jenisPelayanans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Jenis Pelayanan</span></a>
</li>

<li class="{{ Request::is('fileDownloads*') ? 'active' : '' }}">
    <a href="{!! route('fileDownloads.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">File Download</span></a>
</li>

<li class="{{ Request::is('tipeSyarats*') ? 'active' : '' }}">
    <a href="{!! route('tipeSyarats.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Tipe Syarat</span></a>
</li>

<li class="{{ Request::is('itemPilihans*') ? 'active' : '' }}">
    <a href="{!! route('itemPilihans.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Item Pilihan</span></a>
</li>

