<!-- Koperasi Id Field -->
<div class="form-group">
    {!! Form::label('koperasi_id', 'Koperasi Id:') !!}
    <div class="position-relative">
        {!! Form::number('koperasi_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Koperasi Field -->
<div class="form-group">
    {!! Form::label('kode_koperasi', 'Kode Koperasi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_koperasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Persil Id Field -->
<div class="form-group">
    {!! Form::label('persil_id', 'Persil Id:') !!}
    <div class="position-relative">
        {!! Form::number('persil_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Petak Id Field -->
<div class="form-group">
    {!! Form::label('petak_id', 'Petak Id:') !!}
    <div class="position-relative">
        {!! Form::number('petak_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Pekebun Field -->
<div class="form-group">
    {!! Form::label('nama_pekebun', 'Nama Pekebun:') !!}
    <div class="position-relative">
        {!! Form::text('nama_pekebun', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Kelola Field -->
<div class="form-group">
    {!! Form::label('tgl_kelola', 'Tgl Kelola:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_kelola', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kegiatan Field -->
<div class="form-group">
    {!! Form::label('kegiatan', 'Kegiatan:') !!}
    <div class="position-relative">
        {!! Form::textarea('kegiatan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Org Terlibat Field -->
<div class="form-group">
    {!! Form::label('org_terlibat', 'Org Terlibat:') !!}
    <div class="position-relative">
        {!! Form::text('org_terlibat', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('kelolaLingkungans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

