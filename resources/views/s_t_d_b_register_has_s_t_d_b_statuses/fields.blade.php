<!-- Stdb Status Id Field -->
<div class="form-group">
    {!! Form::label('stdb_status_id', 'Stdb Status Id:') !!}
    <div class="position-relative">
        {!! Form::number('stdb_status_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <div class="position-relative">
        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('sTDBRegisterHasSTDBStatuses.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

