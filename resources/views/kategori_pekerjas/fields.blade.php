<!-- Kategori Pekerja Field -->
<div class="form-group">
    {!! Form::label('kategori_pekerja', 'Kategori Pekerja:') !!}
    <div class="position-relative">
        {!! Form::text('kategori_pekerja', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('kategoriPekerjas.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

