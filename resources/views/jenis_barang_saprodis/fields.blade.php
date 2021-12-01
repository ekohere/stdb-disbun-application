<!-- Kode Jenis Barang Saprodi Field -->
<div class="form-group">
    {!! Form::label('kode_jenis_barang_saprodi', 'Kode Jenis Barang Saprodi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_jenis_barang_saprodi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jenis Barang Saprodi Field -->
<div class="form-group">
    {!! Form::label('jenis_barang_saprodi', 'Jenis Barang Saprodi:') !!}
    <div class="position-relative">
        {!! Form::text('jenis_barang_saprodi', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('jenisBarangSaprodis.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

