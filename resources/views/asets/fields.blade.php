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


<!-- Nomor Field -->
<div class="form-group">
    {!! Form::label('nomor', 'Nomor:') !!}
    <div class="position-relative">
        {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <div class="position-relative">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tahun Field -->
<div class="form-group">
    {!! Form::label('tahun', 'Tahun:') !!}
    <div class="position-relative">
        {!! Form::text('tahun', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nilai Awal Field -->
<div class="form-group">
    {!! Form::label('nilai_awal', 'Nilai Awal:') !!}
    <div class="position-relative">
        {!! Form::number('nilai_awal', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nilai Akhir Field -->
<div class="form-group">
    {!! Form::label('nilai_akhir', 'Nilai Akhir:') !!}
    <div class="position-relative">
        {!! Form::number('nilai_akhir', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kondisi Field -->
<div class="form-group">
    {!! Form::label('kondisi', 'Kondisi:') !!}
    <div class="position-relative">
        {!! Form::text('kondisi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    <div class="position-relative">
        {!! Form::text('foto', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pemakai Field -->
<div class="form-group">
    {!! Form::label('pemakai', 'Pemakai:') !!}
    <div class="position-relative">
        {!! Form::text('pemakai', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <div class="position-relative">
        {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('asets.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

