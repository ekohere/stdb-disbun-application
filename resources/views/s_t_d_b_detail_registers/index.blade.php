@extends('layouts.app')
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                @include('flash::message')
                <div class="clearfix"></div>
                <div class="card">
                    <div class="border-left-pink border-left-6 box-shadow-1 rounded">
                        <div class="card-content ">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-10 media-body mb-2">
                                        <div class="content-header-left breadcrumb-new">
                                            <span class="content-header-title mb-0 d-inline-block font-medium-4"><b>S T D B Detail Registers</b></span>
                                            <div class="breadcrumbs-top d-inline-block">
                                                <div class="breadcrumb-wrapper">
                                                    @include('layouts.breadcrumb')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 text-right">
                                        <a href="{!! route('sTDBDetailRegisters.create') !!}" class="btn btn-sm btn-green">Tambah Data</a>
                                    </div>
                                </div>
                                @include('s_t_d_b_detail_registers.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('master/app-assets/js/britech/table-settings-britech.js')}}"></script>
@endsection