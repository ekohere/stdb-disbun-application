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


<!-- Jenis Barang Saprodi Id Field -->
<div class="form-group">
    {!! Form::label('jenis_barang_saprodi_id', 'Jenis Barang Saprodi Id:') !!}
    <div class="position-relative">
        {!! Form::number('jenis_barang_saprodi_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Jenis Barang Saprodi Field -->
<div class="form-group">
    {!! Form::label('kode_jenis_barang_saprodi', 'Kode Jenis Barang Saprodi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_jenis_barang_saprodi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Saprodi Field -->
<div class="form-group">
    {!! Form::label('nama_saprodi', 'Nama Saprodi:') !!}
    <div class="position-relative">
        {!! Form::text('nama_saprodi', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('barangSaprodis.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

