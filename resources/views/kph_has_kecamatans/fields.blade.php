<!-- Kecamatan Id Field -->
<div class="form-group">
    {!! Form::label('kecamatan_id', 'Kecamatan Id:') !!}
    <div class="position-relative">
        {!! Form::number('kecamatan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('kphHasKecamatans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

