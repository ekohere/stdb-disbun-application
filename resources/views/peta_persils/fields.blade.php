<!-- Kode Koperasi Field -->
<div class="form-group">
    {!! Form::label('kode_koperasi', 'Kode Koperasi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_koperasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Koperasi Id Field -->
<div class="form-group">
    {!! Form::label('koperasi_id', 'Koperasi Id:') !!}
    <div class="position-relative">
        {!! Form::number('koperasi_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Judul Field -->
<div class="form-group">
    {!! Form::label('judul', 'Judul:') !!}
    <div class="position-relative">
        {!! Form::text('judul', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- File Geojson Field -->
<div class="form-group">
    {!! Form::label('file_geojson', 'File Geojson:') !!}
    <div class="position-relative">
        {!! Form::text('file_geojson', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Aktif Field -->
<div class="form-group">
    {!! Form::label('aktif', 'Aktif:') !!}
    <div class="position-relative">
        {!! Form::text('aktif', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('petaPersils.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

