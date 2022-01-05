@extends('layouts.app')
@section('content')
    <div class="card border-left-green border-left-6 card-content rounded-1 box-shadow-1 mt-3 p-2">
        {!! Form::open(['route' => 'sTDBRegisters.verified'], ['class' => 'form']) !!}
        <h3 class="font-weight-bold mb-1">Status Persil</h3>
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
            <h6>Persil {{$key+1}}: <span class="badge bg-blue bg-lighten-2 mb-0-1">Clean and Clear</span></h6>
            {{--            <h6>Persil 2: <span class="badge bg-warning bg-darken-2 mb-0-1">4% Masuk Kawasan Hutan (0.1 Ha)</span></h6>--}}
        @endforeach
        <!-- Message Field -->
        <div class="form-group">
            {!! Form::label('message', 'Catatan Sebelum verifikasi:') !!}
            <div class="position-relative">
                {!! Form::text('message', null, ['class' => 'form-control']) !!}
                {!! Form::hidden('stdb_register_id', $sTDBRegister->id, ['class' => 'form-control']) !!}
                {!! Form::hidden('stdb_status_id', 2, ['class' => 'form-control']) !!}
            </div>
        </div>
        {!! Form::submit("Verifikasi", ['class' => 'btn btn-green mr-1 <span><i class="fa fa-check"></i></span>']) !!}
        {!! Form::close() !!}
    </div>
@endsection
