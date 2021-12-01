<!-- Kode Jenis Barang Field -->
<div class="form-group">
    {!! Form::label('kode_jenis_barang', 'Kode Jenis Barang:') !!}
    <div class="position-relative">
        {!! Form::text('kode_jenis_barang', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jenis Barang Field -->
<div class="form-group">
    {!! Form::label('jenis_barang', 'Jenis Barang:') !!}
    <div class="position-relative">
        {!! Form::text('jenis_barang', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('jenisBarangs.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

