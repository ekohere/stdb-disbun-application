<!-- Stdb Register Id Field -->
<div class="form-group">
    {!! Form::label('stdb_register_id', 'Stdb Register Id:') !!}
    <div class="position-relative">
        {!! Form::number('stdb_register_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Stdb Persil Id Field -->
<div class="form-group">
    {!! Form::label('stdb_persil_id', 'Stdb Persil Id:') !!}
    <div class="position-relative">
        {!! Form::number('stdb_persil_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Persil Id Field -->
<div class="form-group">
    {!! Form::label('persil_id', 'Persil Id:') !!}
    <div class="position-relative">
        {!! Form::number('persil_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('sTDBDetailRegisters.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

