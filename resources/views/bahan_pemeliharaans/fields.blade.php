<!-- Kategori Bahan Pemeliharaan Id Field -->
<div class="form-group">
    {!! Form::label('kategori_bahan_pemeliharaan_id', 'Kategori Bahan Pemeliharaan Id:') !!}
    <div class="position-relative">
        {!! Form::number('kategori_bahan_pemeliharaan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


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


<!-- Nama Bahan Field -->
<div class="form-group">
    {!! Form::label('nama_bahan', 'Nama Bahan:') !!}
    <div class="position-relative">
        {!! Form::text('nama_bahan', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('bahanPemeliharaans.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

