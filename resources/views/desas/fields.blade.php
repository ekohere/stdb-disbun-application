<!-- Kode Kec Field -->
<div class="form-group">
    {!! Form::label('kode_kec', 'Kode Kec:') !!}
    <div class="position-relative">
        {!! Form::text('kode_kec', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Desa Field -->
<div class="form-group">
    {!! Form::label('kode_desa', 'Kode Desa:') !!}
    <div class="position-relative">
        {!! Form::text('kode_desa', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Desa Field -->
<div class="form-group">
    {!! Form::label('nama_desa', 'Nama Desa:') !!}
    <div class="position-relative">
        {!! Form::text('nama_desa', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('desas.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

