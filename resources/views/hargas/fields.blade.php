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


<!-- Bulan Field -->
<div class="form-group">
    {!! Form::label('bulan', 'Bulan:') !!}
    <div class="position-relative">
        {!! Form::number('bulan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tahun Field -->
<div class="form-group">
    {!! Form::label('tahun', 'Tahun:') !!}
    <div class="position-relative">
        {!! Form::date('tahun', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga3 Field -->
<div class="form-group">
    {!! Form::label('harga3', 'Harga3:') !!}
    <div class="position-relative">
        {!! Form::number('harga3', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga4 Field -->
<div class="form-group">
    {!! Form::label('harga4', 'Harga4:') !!}
    <div class="position-relative">
        {!! Form::number('harga4', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga5 Field -->
<div class="form-group">
    {!! Form::label('harga5', 'Harga5:') !!}
    <div class="position-relative">
        {!! Form::number('harga5', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga6 Field -->
<div class="form-group">
    {!! Form::label('harga6', 'Harga6:') !!}
    <div class="position-relative">
        {!! Form::number('harga6', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga7 Field -->
<div class="form-group">
    {!! Form::label('harga7', 'Harga7:') !!}
    <div class="position-relative">
        {!! Form::number('harga7', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga8 Field -->
<div class="form-group">
    {!! Form::label('harga8', 'Harga8:') !!}
    <div class="position-relative">
        {!! Form::number('harga8', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga9 Field -->
<div class="form-group">
    {!! Form::label('harga9', 'Harga9:') !!}
    <div class="position-relative">
        {!! Form::number('harga9', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Harga10 Field -->
<div class="form-group">
    {!! Form::label('harga10', 'Harga10:') !!}
    <div class="position-relative">
        {!! Form::number('harga10', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <div class="position-relative">
        {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nomor Sk Gub Field -->
<div class="form-group">
    {!! Form::label('nomor_sk_gub', 'Nomor Sk Gub:') !!}
    <div class="position-relative">
        {!! Form::text('nomor_sk_gub', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Sk Gub Field -->
<div class="form-group">
    {!! Form::label('tgl_sk_gub', 'Tgl Sk Gub:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_sk_gub', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- File Sk Gub Field -->
<div class="form-group">
    {!! Form::label('file_sk_gub', 'File Sk Gub:') !!}
    <div class="position-relative">
        {!! Form::text('file_sk_gub', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('hargas.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

