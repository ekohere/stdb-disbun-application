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


<!-- Nama Pemilik Field -->
<div class="form-group">
    {!! Form::label('nama_pemilik', 'Nama Pemilik:') !!}
    <div class="position-relative">
        {!! Form::text('nama_pemilik', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Pemilik Field -->
<div class="form-group">
    {!! Form::label('alamat_pemilik', 'Alamat Pemilik:') !!}
    <div class="position-relative">
        {!! Form::textarea('alamat_pemilik', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kapasitas Field -->
<div class="form-group">
    {!! Form::label('kapasitas', 'Kapasitas:') !!}
    <div class="position-relative">
        {!! Form::text('kapasitas', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nomor Plat Field -->
<div class="form-group">
    {!! Form::label('nomor_plat', 'Nomor Plat:') !!}
    <div class="position-relative">
        {!! Form::text('nomor_plat', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Transport Field -->
<div class="form-group">
    {!! Form::label('kode_transport', 'Kode Transport:') !!}
    <div class="position-relative">
        {!! Form::text('kode_transport', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Lampiran Stnk Field -->
<div class="form-group">
    {!! Form::label('lampiran_stnk', 'Lampiran Stnk:') !!}
    <div class="position-relative">
        {!! Form::text('lampiran_stnk', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Lampiran Lainnya Field -->
<div class="form-group">
    {!! Form::label('lampiran_lainnya', 'Lampiran Lainnya:') !!}
    <div class="position-relative">
        {!! Form::text('lampiran_lainnya', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Ket Field -->
<div class="form-group">
    {!! Form::label('ket', 'Ket:') !!}
    <div class="position-relative">
        {!! Form::text('ket', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('transports.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

