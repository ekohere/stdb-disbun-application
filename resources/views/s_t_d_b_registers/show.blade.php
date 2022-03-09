@extends('layouts.app')
@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
{{--                <div class="col-md-12">--}}
{{--                    <div class="card overflow-hidden">--}}
{{--                        <div class="card-content">--}}
{{--                            <div class="media align-items-stretch">--}}
{{--                                <div class="bg-blue p-2 media-middle">--}}
{{--                                    <i class="fa fa-align-left font-large-2 text-white"></i>--}}
{{--                                </div>--}}
{{--                                <div class="media-body p-1">--}}
{{--                                    <span class="blue font-medium-5"> S T D B Register</span><br>--}}
{{--                                    <span style="margin-top: -5px">Detail S T D B Register</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <h4 class="form-section">
                                            <a href="{!! route('sTDBRegisters.index') !!}" class="btn btn-icon danger btn-lg pl-0 ml-0"><i class="ft-arrow-left"></i> Kembali</a>
                                        </h4>
                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('KPH'))
                                            @include('s_t_d_b_registers.show_fields_kph')
                                        @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('PPR'))
                                            @include('s_t_d_b_registers.show_fields_ppr')
                                        @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('BPN'))
                                            @include('s_t_d_b_registers.show_fields_bpn')
                                        @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('admin_disbun'))
                                            @include('s_t_d_b_registers.show_fields')
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
