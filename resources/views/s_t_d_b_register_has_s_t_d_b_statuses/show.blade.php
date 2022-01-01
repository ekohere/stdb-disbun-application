@extends('layouts.app')
@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-blue p-2 media-middle">
                                    <i class="fa fa-align-left font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-1">
                                    <span class="blue font-medium-5"> S T D B Register Has S T D B Status</span><br>
                                    <span style="margin-top: -5px">Detail S T D B Register Has S T D B Status</span>
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
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <h4 class="form-section">
                                            <a href="{!! route('sTDBRegisterHasSTDBStatuses.index') !!}" class="btn btn-icon danger btn-lg pl-0 ml-0"><i class="ft-arrow-left"></i> Kembali</a>
                                        </h4>
                                        @include('s_t_d_b_register_has_s_t_d_b_statuses.show_fields')
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
