@extends('layouts.app')
@section('content')
<div id="user">
    @include('flash::message')
{{--    @canany(['profilAdm.index','superAdmin.index','profilIndex.index'])--}}
        <div class="content-body">
            <div class="row">
                <div class="col-4">
                    <div class="card box-shadow-1 rounded-1">
                        <div class="card-body text-center">
                            @if(empty(Auth::user()->avatar))
                                <img src="{{ asset('master/app-assets/images/gallery/user_profil.png') }}" class="img-fluid rounded">
                            @else
                                <img src="{{ asset(Auth::user()->avatar) }}" class="rounded-circle img-fluid ">
                            @endif
                            <div class="font-medium-2 text-bold-700 black mt-2">{{ Auth::user()['name'] }}</div>
                            <div class="font-medium-1 black">{{ Auth::user()->email }}</div>
                            <a data-target="#editProfil" data-toggle="modal" href="javascript:void(0)"  class="btn btn-primary btn-sm mt-2">Ubah Profil</a>
                            @include('users.modal.edit_profile')
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card box-shadow-1 rounded-1">
                        <div class="card-body pt-0">
                            <table class="table black mb-0 font-small-4">
                                <tr>
                                    <td colspan="3" class="p-1 border-top-0">
                                        <div class="font-large-1 text-bold-800 black">{{ Auth::user()['name'] }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="p-1 border-top-0">
                                        <div class="font-medium-1 text-bold-800 black">Data Akun</div>
                                    </td>
                                </tr>
                                @if(Auth::user()['koperasi_id']!=0)
                                    <tr>
                                        <td class="p-1">Koperasi</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ Auth::user()['koperasi']['nama_koperasi'] }}</td>
                                    </tr>
                                @endif
                                @if(!empty(Auth::user()->getRoleNames()))
                                    <tr>
                                        <td class="p-1">Role Akun</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">
                                            @foreach(Auth::user()->getRoleNames() as $item)
                                                <p class="m-0"><i class="fa fa-check-circle font-small-1"></i> {{$item}}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="p-1">No.Telephone/HP</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ Auth::user()['kontak'] }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Email</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ Auth::user()['email'] }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Alamat</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ Auth::user()['alamat'] }}</td>
                                </tr>
                                @if(!empty(Auth::user()['desa_id']))
                                    <tr>
                                        <td class="p-1">Desa/Kelurahan</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ Auth::user()['desa']['nama_desa'] }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="p-1">Bergabung</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ Auth::user()->created_at->format('d F Y') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/user.js') }}"></script>
    <script src="{{asset('master/app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
@endsection

