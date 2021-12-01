<!-- Kode Kec Field -->
<div class="form-group">
    {!! Form::label('kode_kec', 'Kode Kec:') !!}
    <div class="position-relative">
        {!! Form::text('kode_kec', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Koperasi Field -->
<div class="form-group">
    {!! Form::label('kode_koperasi', 'Kode Koperasi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_koperasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Koperasi Field -->
<div class="form-group">
    {!! Form::label('nama_koperasi', 'Nama Koperasi:') !!}
    <div class="position-relative">
        {!! Form::text('nama_koperasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <div class="position-relative">
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Telepon Field -->
<div class="form-group">
    {!! Form::label('telepon', 'Telepon:') !!}
    <div class="position-relative">
        {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('koperasis.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

