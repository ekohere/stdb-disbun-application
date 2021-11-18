<!-- Wilayah Id Field -->
<div class="form-group">
    {!! Form::label('wilayah_id', 'Wilayah Id:') !!}
    <div class="position-relative">
        {!! Form::number('wilayah_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pelayanan Id Field -->
<div class="form-group">
    {!! Form::label('pelayanan_id', 'Pelayanan Id:') !!}
    <div class="position-relative">
        {!! Form::number('pelayanan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('wilayahPelayanans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

