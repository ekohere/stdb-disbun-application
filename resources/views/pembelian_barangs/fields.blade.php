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


<!-- Jenis Barang Id Field -->
<div class="form-group">
    {!! Form::label('jenis_barang_id', 'Jenis Barang Id:') !!}
    <div class="position-relative">
        {!! Form::number('jenis_barang_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Tgl Order Field -->
<div class="form-group">
    {!! Form::label('tgl_order', 'Tgl Order:') !!}
    <div class="position-relative">
        {!! Form::date('tgl_order', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nomor Order Field -->
<div class="form-group">
    {!! Form::label('nomor_order', 'Nomor Order:') !!}
    <div class="position-relative">
        {!! Form::text('nomor_order', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nomor Invoice Field -->
<div class="form-group">
    {!! Form::label('nomor_invoice', 'Nomor Invoice:') !!}
    <div class="position-relative">
        {!! Form::text('nomor_invoice', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Mata Uang Field -->
<div class="form-group">
    {!! Form::label('mata_uang', 'Mata Uang:') !!}
    <div class="position-relative">
        {!! Form::text('mata_uang', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- File Invoice Field -->
<div class="form-group">
    {!! Form::label('file_invoice', 'File Invoice:') !!}
    <div class="position-relative">
        {!! Form::text('file_invoice', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Pemasok Field -->
<div class="form-group">
    {!! Form::label('pemasok', 'Pemasok:') !!}
    <div class="position-relative">
        {!! Form::number('pemasok', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('pembelianBarangs.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

