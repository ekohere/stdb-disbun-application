<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <div class="position-relative">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Unit Kph Field -->
<div class="form-group">
    {!! Form::label('unit_kph', 'Unit Kph:') !!}
    <div class="position-relative">
        {!! Form::text('unit_kph', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Polygon Id Field -->
<div class="form-group">
    {!! Form::label('polygon_id', 'Polygon Id:') !!}
    <div class="position-relative">
        {!! Form::number('polygon_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('kPHS.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

