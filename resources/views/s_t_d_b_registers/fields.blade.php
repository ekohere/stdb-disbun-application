<!-- Users Id Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Users Id:') !!}
    <div class="position-relative">
        {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Anggota Id Field -->
<div class="form-group">
    {!! Form::label('anggota_id', 'Anggota Id:') !!}
    <div class="position-relative">
        {!! Form::number('anggota_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('sTDBRegisters.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

