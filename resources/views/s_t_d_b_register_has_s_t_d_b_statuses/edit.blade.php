@extends('layouts.app')

@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-indigo p-2 media-middle">
                                    <i class="fa fa-pencil-square font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-1">
                                    <span class="indigo font-medium-5">Perubahan S T D B Register Has S T D B Status</span><br>
                                    <span style="margin-top: -5px">Melakukan Perubahan S T D B Register Has S T D B Status </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                {!! Form::model($sTDBRegisterHasSTDBStatus, ['route' => ['sTDBRegisterStatuses.update', $sTDBRegisterHasSTDBStatus->id], 'method' => 'patch']) !!}
                                <div class="form-body">
                                    @include('s_t_d_b_register_has_s_t_d_b_statuses.fields')
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
