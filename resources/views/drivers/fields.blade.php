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


<!-- Kode Sopir Field -->
<div class="form-group">
    {!! Form::label('kode_sopir', 'Kode Sopir:') !!}
    <div class="position-relative">
        {!! Form::text('kode_sopir', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Driver Field -->
<div class="form-group">
    {!! Form::label('nama_driver', 'Nama Driver:') !!}
    <div class="position-relative">
        {!! Form::text('nama_driver', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Lampiran Sim Field -->
<div class="form-group">
    {!! Form::label('lampiran_sim', 'Lampiran Sim:') !!}
    <div class="position-relative">
        {!! Form::text('lampiran_sim', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Hp Field -->
<div class="form-group">
    {!! Form::label('hp', 'Hp:') !!}
    <div class="position-relative">
        {!! Form::text('hp', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <div class="position-relative">
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('drivers.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

