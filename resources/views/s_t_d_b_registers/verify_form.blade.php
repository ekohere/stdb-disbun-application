@extends('layouts.app')
@section('content')
    <div class="card border-left-green border-left-6 card-content rounded-1 box-shadow-1 mt-3 p-2">
        {!! Form::open(['route' => 'sTDBRegisters.verified','files'=>'true'], ['class' => 'form']) !!}
        <h3 class="font-weight-bold mb-1"><i class="fa fa-check-circle font-medium-4 green"></i> Verifikasi Pengajuan STDB</h3>
        <hr>
        <!-- Message Field -->
        <div class="form-group">
            {!! Form::label('message', 'Catatan Sebelum verifikasi',['class'=>' text-uppercase text-bold-700']) !!}
            <div class="position-relative">
                {!! Form::text('message', null, ['class' => 'form-control']) !!}
                {!! Form::hidden('stdb_register_id', $sTDBRegister->id, ['class' => 'form-control']) !!}
                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('KPH'))
                    {!! Form::hidden('stdb_status_id', 4, ['class' => 'form-control']) !!}
                    {!! Form::hidden('verified_by_kph', 1, ['class' => 'form-control']) !!}
                @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('PPR'))
                    {!! Form::hidden('stdb_status_id', 5, ['class' => 'form-control']) !!}
                    {!! Form::hidden('verified_by_ppr', 1, ['class' => 'form-control']) !!}
                @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                    {!! Form::hidden('stdb_status_id', 2, ['class' => 'form-control']) !!}
                @endif
            </div>
        </div>

        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
        <!-- Lampiran Peta Persil Field -->
            <div class="form-group">
                {!! Form::label('lampiran_peta_persil', 'Lampiran Peta Persil (pdf)',['class'=>' text-uppercase text-bold-700']) !!}
                <div class="position-relative">
                    @if(!isset($stdb_register))
                        <x-media-library-attachment name="lampiran_peta_persil" rules="mimes:pdf" required/>
                    @else
                        <x-media-library-collection :model="$stdb_register" name="lampiran_identitas" rules="mimes:pdf" collection="lampiran_peta_persil"/>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="card rounded bg-light-green bg-lighten-3 box-shadow-1">
                    <div class="card-body">
                        <div class="font-small-4 text-bold-500 brown darken-4">
                            <i class="fa fa-info-circle font-medium-4 white"></i>
                            Silahkan upload dokumen peta persil dalam <b>satu file berbentuk pdf</b>, baik itu satu persil ataupun lebih dari satu persil.
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {!! Form::submit("Verifikasi", ['class' => 'btn btn-green mr-1 <span><i class="fa fa-check"></i></span>']) !!}
        {!! Form::close() !!}
    </div>
@endsection
