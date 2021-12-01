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


<!-- Jenis Barang Id Field -->
<div class="form-group">
    {!! Form::label('jenis_barang_id', 'Jenis Barang Id:') !!}
    <div class="position-relative">
        {!! Form::number('jenis_barang_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Barang Field -->
<div class="form-group">
    {!! Form::label('kode_barang', 'Kode Barang:') !!}
    <div class="position-relative">
        {!! Form::text('kode_barang', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Barang Field -->
<div class="form-group">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    <div class="position-relative">
        {!! Form::text('nama_barang', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Jenis Barang Field -->
<div class="form-group">
    {!! Form::label('kode_jenis_barang', 'Kode Jenis Barang:') !!}
    <div class="position-relative">
        {!! Form::text('kode_jenis_barang', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('satuan', 'Satuan:') !!}
    <div class="position-relative">
        {!! Form::text('satuan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('barangs.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

